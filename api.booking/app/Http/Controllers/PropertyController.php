<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PropertyController extends Controller {

    public function searchProperty($id)
    {
        $results= DB::select("select id,gid,UPPER(title) as title,currency,rateperday,
        description,wirelessinternet,airconditioning,wheelchair,elevator,reservationfee,depositfee,
        case when image1 is null or image1='' then '0' else image1 end as image1,
        case when image2 is null or image2='' then '0' else image2 end as image2,
        case when image3 is null or image3='' then '0' else image3 end as image3,
        case when image4 is null or image4='' then '0' else image4 end as image4,
        concat('loc:',lat,'+',lng) as mapaddress from property where status='A' and posted='Y'");

        for($x=0;$x<count($results);$x++){
            $results[$x]->rateperday=number_format($this->convertAmount($results[$x]->currency,$id,$results[$x]->rateperday),2) ;

        }

        return $results;

//return $this->convertAmount('USD','PHP',1);
    }

    

    public function filterPropertyAvailablity()
    {
        $results="";
        
        $from=date('Y-m-d', strtotime(Input::get('from'))); 
        $to=date('Y-m-d', strtotime(Input::get('to'))); 
  
  
        

            

        $results= DB::select("select id,gid,UPPER(title) as title,currency,rateperday,
        description,wirelessinternet,airconditioning,wheelchair,elevator,reservationfee,depositfee,
        case when image1 is null or image1='' then '0' else image1 end as image1,
        case when image2 is null or image2='' then '0' else image2 end as image2,
        case when image3 is null or image3='' then '0' else image3 end as image3,
        case when image4 is null or image4='' then '0' else image4 end as image4,
        concat('loc:',lat,'+',lng) as mapaddress from property where status='A' and posted='Y' and id not in 
        (select 	propertyid from bookedproperty 
        where (:from between checkin and checkout or :to between checkin and checkout) and status in ('B','N')) ",
        ['from'=>$from,'to'=>$to]);

        for($x=0;$x<count($results);$x++){
            $results[$x]->rateperday=number_format($this->convertAmount($results[$x]->currency,Input::get('currency'),$results[$x]->rateperday),2) ;

        }

        return $results;

    }
    public function filterProperty()
    {



        $where="";
        if(Input::get('airconditioning')=="Y"){
            $where=$where."airconditioning='Y' and ";
        }
        if(Input::get('balcony')=="Y"){
            $where=$where."balcony='Y' and ";
        }
        if(Input::get('climbingframe')=="Y"){
            $where=$where."climbingframe='Y' and ";
        }
        if(Input::get('elevator')=="Y"){
            $where=$where."elevator='Y' and ";
        }
        if(Input::get('fridge')=="Y"){
            $where=$where."fridge='Y' and ";
        }
        if(Input::get('internet')=="Y"){
            $where=$where."internet='Y' and ";
        }
        if(Input::get('kettle')=="Y"){
            $where=$where."kettle='Y' and ";
        }
        if(Input::get('linen')=="Y"){
            $where=$where."linen='Y' and ";
        }
        if(Input::get('microwave')=="Y"){
            $where=$where."microwave='Y' and ";
        }
        if(Input::get('airconditioning')=="Y"){
            $where=$where."airconditioning='Y' and ";
        }
        if(Input::get('patio')=="Y"){
            $where=$where."patio='Y' and ";
        }
        if(Input::get('pool')=="Y"){
            $where=$where."pool='Y' and ";
        }
        if(Input::get('satelitetv')=="Y"){
            $where=$where."satelitetv='Y' and ";
        }
        if(Input::get('stove')=="Y"){
            $where=$where."stove='Y' and ";
        }
        if(Input::get('washingmachine')=="Y"){
            $where=$where."washingmachine='Y' and ";
        }
        if(Input::get('wheelchair')=="Y"){
            $where=$where."wheelchair='Y' and ";
        }
        if(Input::get('wirelessinternet')=="Y"){
            $where=$where."wirelessinternet='Y' and ";
        }

        if(Input::get('city')!=""){
            $city=Input::get('city');
            $where=$where."city='$city' and ";
        }
       
        if(Input::get('from')!="" && Input::get('to')!=""){
            $from=date('Y-m-d', strtotime(Input::get('from'))); 
            $to=date('Y-m-d', strtotime(Input::get('to'))); 

            $where=$where." id not in 
            (select propertyid from bookedproperty 
            where ('$from' between checkin and checkout or '$to' between checkin and checkout) and status in ('B','N')) and ";
        }

        if($where!=""){
            $where=" and ".substr($where,0,strlen($where)-4);
        }
        if(Input::get('sort')!=""){
            $where=$where." order by rateperday ".Input::get('sort');
        }

       
        $results= DB::select("select id,gid,UPPER(title) as title,currency,rateperday,
        description,wirelessinternet,airconditioning,wheelchair,elevator,reservationfee,depositfee,
        case when image1 is null or image1='' then '0' else image1 end as image1,
        case when image2 is null or image2='' then '0' else image2 end as image2,
        case when image3 is null or image3='' then '0' else image3 end as image3,
        case when image4 is null or image4='' then '0' else image4 end as image4,
        concat('loc:',lat,'+',lng) as mapaddress from property where status='A' and posted='Y' ".$where);

        for($x=0;$x<count($results);$x++){
            $results[$x]->rateperday=number_format($this->convertAmount($results[$x]->currency,Input::get('currency'),$results[$x]->rateperday),2) ;

        }

        return $results;

    }


    public function convertAmount($from,$to,$amount){
        if($to=="USD"){
            $price = round($amount *  0.01951299, 2);
        }else if($to=="PHP"){
            $price = round($amount * 1, 2);
        }else if($to=="SAR"){
            $price = round($amount * 0.07317154, 2);
        }
        return $price;
       /* try{
        $req_url = 'https://v3.exchangerate-api.com/bulk/55851e1b5083f0dc713a5d22/'.$from;
       
        $response_json = file_get_contents($req_url);
        // Continuing if we got a result
        if(false !== $response_json) {
        
            // Try/catch for json_decode operation
            try {
        
                // Decoding
                $response_object = json_decode($response_json);
        
                // Checking for errors
                if('success' === $response_object->result) {
                    $price=0;
                    if($to=="USD"){
                        $price = round(($amount * $response_object->rates->USD), 2);
                    }else if($to=="PHP"){
                        $price = round(($amount * $response_object->rates->PHP), 2);
                    }else if($to=="SAR"){
                        $price = round(($amount * $response_object->rates->SAR), 2);
                    }
                    return $price;
        
                } else {
        
                    // Handling different error conditions
                    switch($response_object->error) {
                        case 'unknown-code':
                            // Handle error...
                            break;
                        case 'invalid-key':
                            // Handle error...
                            break;
                        case 'malformed-request':
                            // Handle error...
                            break;
                        case 'quota-reached':
                            // Handle error...
                            break;
                    }
        
                }
        
            }
            catch(Exception $e) {
            }
        }
    }
    catch(\Exception $e) {
        $price=0;
        if($to=="USD"){
            $price = round($amount *  0.01951299, 2);
        }else if($to=="PHP"){
            $price = round($amount * 1, 2);
        }else if($to=="SAR"){
            $price = round($amount * 0.07317154, 2);
        }
        return $price;
    }*/
    }
    
    

    public function getCurrencies()
    {
        $results= DB::select("select sign,name from currencies order by sign asc");
        
        return $results;
    }   
    


  public function getPropertyAvailability($id)
    {
        $results= DB::select("select date,type as classname from propertyavailability where propertyid=:id order by date asc",['id'=>$id]);
        
        return $results;
    }   
    
    public function getBooking()
    {
        $results= DB::select("
        select bookedproperty.id,
        property.id as propertyid,
        property.gid as propertygid,
        bookedproperty.currency,
        bookedproperty.discount,
        property.title,
        case when bookedproperty.status='B' then 'Booked' else 'Canceled' end as status,
              case when confirm='N' then 'Not Confirm' else 'Confirm' end as confirm,rate,guest,totalprice,
              date_format(checkin,'%e-%b-%Y') as checkin,
              date_format(checkout,'%e-%b-%Y') as checkout,
              date_format(datebooked,'%e-%b-%Y') as datebooked,
              date_format(bookedproperty.datecanceled,'%e-%b-%Y') as datecanceled,
              bookedproperty.status as statusid,
              case when confirm='Y' then date_format(dateconfirm,'%e-%b-%Y') else '' end as dateconfirm,
              concat(datediff(checkout,checkin)+1,' day(s)') as noofdays from bookedproperty
              inner join property on property.id=bookedproperty.propertyid
              WHERE bookedproperty.status in ('B','C') and email=:email",['email'=>Input::get('emailaddress')]);
        
        return $results;
    }  

    
  public function cancelBooking()
  {

        DB::table('bookedproperty')
        ->where('id', Input::get('id'))
        ->update(['status' => 'C',
    'datecanceled' => date("Y-m-d H:m:s")]);

    DB::table('propertyavailability')
    ->where('bookedid', Input::get('id'))
    ->update(['type' => 'canceled']);

      $email=Input::get('emailaddress');
      $name=Input::get('name');
      Mail::send('emails.sendCustomerCancelation', ['name' => $name], function ($message) use($email)
      {
      
      $message->subject('Booking Cancelation Confirmation');
      
      $message->from('noreply@payrollclub.co', 'UniSerb');
      
      $message->to($email);
      
      });
      

         return "";
  }


  public function saveBooking()
  {

      $results="";
      
      $from=date('Y-m-d', strtotime(Input::get('from'))); 
      $to=date('Y-m-d', strtotime(Input::get('to'))); 


      $res= DB::select("select id from bookedproperty 
      where (:from between checkin and checkout or :to between checkin and checkout) and propertyid=:propertyid and status in ('B','N')",
      ['from'=>$from,'to'=>$to,'propertyid'=>Input::get('id')]);

      if (count($res)>0) {
             $results="The date(s) are not available for check-in. Please check property availablity";
             return $results;
      }else{


      $gid=md5(uniqid(rand(), true));
    

         $id=DB::table('bookedproperty')->insertGetId([
              'gid'=>$gid,
              'email' => Input::get('clientemail'),
              'propertyid' => Input::get('id'),
              'name' => Input::get('clientfullname'),
              'rate' => Input::get('rate'),
              'guest' => Input::get('guest'),
              'currency' => Input::get('currency'),
              'discount' => Input::get('discount'),
              'reservationfeetotal' => Input::get('reservationfeetotal'),
              'remainingdueamount' => Input::get('remainingdueamount'),
              'depositfee' => Input::get('depositfee'),
              'totalamountcheckin' => Input::get('totalamountcheckin'),
              'discountpercentage' => Input::get('discountpercentage'),
              'totalprice' => Input::get('totalprice'),
              'checkin' => $from,
              'checkout' => $to,
              'confirm' =>'N',
              'status' =>'P',
              'datebooked' => date("Y-m-d H:m:s")]);
         }

        
         
         while (strtotime($from) <= strtotime($to)) {
            DB::table('propertyavailability')->insert([
                'bookedid' => $id,
                'propertyid' => Input::get('id'),
                'date' =>date('Y-m-d', strtotime($from)) ,
                'type' => 'booked',
                'email' => Input::get('clientemail')]);
            $from = date ("Y-m-d", strtotime("+1 days", strtotime($from)));
        }


          $email=Input::get('clientemail');
          $name=Input::get('clientfullname');
          $owneremail=Input::get('emailaddress');
          $property=Input::get('title');
          Mail::send('emails.sendBookingConfirmation', ['name' => $name,'property'=>$property,'owneremail'=>$owneremail], function ($message) use($email)
          {
          
          $message->subject('Booking Confirmation');
          
          $message->from('noreply@payrollclub.co', 'UniSerb');
          
          $message->to($email);
          
          });
          


       


         return $id;
  }

  
  
  public function saveFeedback(){
    DB::table('feedback')->insert([
        'propertyid' => Input::get('id'),
        'name' => Input::get('clientname'),
        'feedback' => Input::get('feedback'),
        'rate' => Input::get('rate'),
        'clientemail' => Input::get('clientemail'),
        'datesubmitted' => date("Y-m-d H:m:s")]);
        return "";
  }

  
  public function getFeedback($id){
    $results= DB::select("Select name,feedback,(rate*1)  as rate , date_format(datesubmitted,'%e-%b-%Y %h:%i %p') as datesubmitted  from feedback order by datesubmitted asc");
    

     return  $results;
 }

  public function getBookingDetails($id){
    
       
        
        $results= DB::select("
        Select
        bookedproperty.id,
        property.title,
        date_format(bookedproperty.datebooked,'%e-%b-%Y') as datebooked,
        date_format(bookedproperty.checkin,'%e-%b-%Y') as checkin,
        date_format(bookedproperty.checkout,'%e-%b-%Y') as checkout,
        format(bookedproperty.totalprice,2) as totalprice,
        bookedproperty.currency,
        clients.fullname,
        clients.emailaddress,
        clients.mobileno,
        format(bookedproperty.discount,2) as discount,
        bookedproperty.discountpercentage,
        format(bookedproperty.reservationfeetotal,2) as reservationfeetotal,
        format(bookedproperty.remainingdueamount,2) as remainingdueamount,
        format(bookedproperty.depositfee,2) as depositfee,
        format(bookedproperty.totalamountcheckin,2) as totalamountcheckin,
        propertyowner.firstname,
        propertyowner.lastname,
        DATEDIFF(bookedproperty.checkout,bookedproperty.checkin) as noofdays,
        format(bookedproperty.rate,2) as rate,
        bookedproperty.guest,
        case when bookedproperty.status ='B' then 'Booked' else 'Canceled' end as status,
        case when bookedproperty.confirm ='Y' then 'Confirmed' else 'Not Confirm' end as confirm
      From
        bookedproperty Inner Join
        property
          On bookedproperty.propertyid = property.id Inner Join
        propertyowner
          On property.owner = propertyowner.id
          inner join clients on clients.emailaddress=bookedproperty.email where bookedproperty.id=:id
          ",['id'=>$id]);
        
    
         return  $results;
     }
  
  public function clientLogin(){

    $data=array(
        'emailaddress' =>  '',
        'name' =>  '',
        'message'>='',
        );

    $emailaddress=Input::get('emailaddress');
    $password=Input::get('password');
    

    $response="";
    
    $results= DB::select("select password,fullname from clients where emailaddress=:emailaddress and active='A' ",['emailaddress'=>$emailaddress]);
     if($results){
            $db_password=$results[0]->password;
            if ($password== $db_password) {
               $data["emailaddress"]=$emailaddress;
               $data["name"]=$results[0]->fullname;
               $data["message"]='';
            }else{
                $data["message"]="Invalid email address or wrong password";
            }

     }else{
        $data["message"]="Invalid email address or wrong password";
     }

     return  $data;
 }
    
  

  public function saveSignUp(){
    
    $results="";
    
    $query = DB::table('clients')
    ->where('emailaddress',Input::get('emailaddress'))
    ->where('active','A')
    ->count();

    if ($query>0) {
        $results="Email address already exist";
        return $results;
    }

        $password=Input::get('password');
       DB::table('clients')->insert([
            'fullname' => Input::get('fullname'),
            'emailaddress' => Input::get('emailaddress'),
            'mobileno' => Input::get('mobileno'),
            'active' => 'A',
            'password' =>$password,
            'datecreated' => date("Y-m-d H:m:s")]);

            $email=Input::get('emailaddress');
            $name=Input::get('fullname');
            Mail::send('emails.sendCustomerRegistration', ['name' => $name], function ($message) use($email)
            {
            
            $message->subject('Account Registration');
            
            $message->from('noreply@payrollclub.co', 'UniSerb');
            
            $message->to($email);
            
            });

       return $results;
    }
    

    public function savePropertyCalendar(){
    
        $data=array(
        'propertyid' =>  '',
        'date' =>  ''
        );
      
       $results =Input::all();
        if(count($results)>0){
            $data=$results[0];

            $whereArr = array('propertyid' => $data['propertyid']);
            DB::table('propertyavailability')->where($whereArr)->delete();
       


           for($x=0;$x<count($results);$x++){
                $data=$results[$x];

                DB::table('propertyavailability')->insert([
                'propertyid'=>$data['propertyid'],
                'date'=>$data['date']]);

           }
       }
    }
    
    public function completeBooking($id){
        DB::table('bookedproperty')
        ->where('id', $id)
        ->update(['status' => 'B']);
    
             return "";
    }
    public function getPropertyDetails($id,$gid,$currency)
    {
        $results= DB::select("Select
        property.id,
        property.gid,
        case when property.image1 is null or property.image1='' then '0' else property.image1 end as image1,
        case when property.image2 is null or property.image2='' then '0' else property.image2 end as image2,
        case when property.image3 is null or property.image3='' then '0' else property.image3 end as image3,
        case when property.image4 is null or property.image4='' then '0' else property.image4 end as image4,
        rentaltype.rentaltype,
        occupancy,
        bathroom,
        property.reservationfee,
        '0.00' as reservationamount,
        '0' as remainingdueamount,
        format(property.depositfee,2) as depositfeeshow,
        property.depositfee,
        description,
        '0' as reservationfeetotal,
        '0' as totalamountcheckin,
        property.street,
        property.unitno,
        property.paypalemail,
        cities.city,
        countries.country as country,
        property.lng,
        property.lat,
        property.thirtydays,
        property.sixtydays,
        property.ninetydays,
        concat(100*property.thirtydays,' %') as thirtydaysshow,
        concat(100*property.sixtydays,' %') as sixtydaysshow,
        concat(100*property.ninetydays,' %') as ninetydaysshow,
        '0' as discount,
        '0.00' as discountshow,
        '0' as discountpercentage,
        property.currency,
        property.bedrooms,
        property.title,
        concat(property.minimumstay,' day(s)') as minimumstay,
        rateperday as rate,
        property.rateperday,
        '0.00' as totalprice ,
        property.airconditioning,
        property.linen,property.washingmachine,property.internet,property.wirelessinternet,
        property.pool,property.elevator,property.wheelchair,property.fridge,property.kettle,
        property.microwave,property.stove,property.satelitetv,property.balcony,property.climbingframe,
        property.patio,
        concat(propertyowner.firstname,' ',propertyowner.lastname) as ownername,
        propertyowner.emailaddress,
        propertyowner.mobileno
      From
        property
        inner JOIN
        propertyowner on propertyowner.id=property.owner
        inner join countries on countries.id=property.country
        INNER join cities on cities.id = property.city
        Inner Join
        rentaltype
        On property.rentaltype = rentaltype.id
        where property.id=:id and property.gid=:gid",['id'=>$id,'gid'=>$gid]);

            $results[0]->rateperday=$currency." ".number_format($this->convertAmount($results[0]->currency,$currency,$results[0]->rateperday),2) ;
            $results[0]->rate=$this->convertAmount($results[0]->currency,$currency,$results[0]->rate) ;


        return $results;
    }
    


	
}

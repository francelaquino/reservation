<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use Response;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    
  public function savePropertyOwner()
  {

      $results="";
      
      $query = DB::table('propertyowner')
      ->where('emailaddress',Input::get('emailaddress'))
      ->where('active','A')
      ->count();

      if ($query>0) {
          $results="Email address already exist";
          return $results;
      }

       



      $gid=md5(uniqid(rand(), true));
      $birthdate=date('Y-m-d', strtotime(Input::get('birthdate'))); 

         $id=DB::table('propertyowner')->insertGetId([
              'gid'=>$gid,
              'firstname' => Input::get('firstname'),
              'middlename' => Input::get('middlename'),
              'lastname' => Input::get('lastname'),
              'nationality' => Input::get('nationality'),
              'gender' => Input::get('gender'),
              'birthdate' => $birthdate,
              'mobileno' => Input::get('mobileno'),
              'telephoneno' => Input::get('telephoneno'),
              'emailaddress' => Input::get('emailaddress'),
              'address' => Input::get('address'),
              'active' => 'A',
              'status' => 'A',
              'createdby' =>'user',
              'password' =>Input::get('password'),
              'datecreated' => date("Y-m-d H:m:s"),
              'datemodified' => date("Y-m-d H:m:s"),
              'modifiedby' => 'user']);

              $email=Input::get('emailaddress');
              $name=Input::get('firstname')." ".Input::get('lastname');
              Mail::send('emails.sendOwnerRegistration', ['name' => $name], function ($message) use($email)
              {
              
              $message->subject('Account Registration');
              
              $message->from('noreply@payrollclub.co', 'UniSerb');
              
              $message->to($email);
              
              });



         return $results;
  }
  
  public function removeProperyImage()
  {
    if( Input::get('image')=="1"){
      DB::table('property')
      ->where('id', Input::get('id'))
      ->where('gid', Input::get('gid'))
      ->update(['image1' => '']);
    }else if( Input::get('image')=="2"){
      DB::table('property')
      ->where('id', Input::get('id'))
      ->where('gid', Input::get('gid'))
      ->update(['image2' => '']);
    }else if( Input::get('image')=="3"){
      DB::table('property')
      ->where('id', Input::get('id'))
      ->where('gid', Input::get('gid'))
      ->update(['image3' => '']);
    } else if( Input::get('image')=="4"){
      DB::table('property')
      ->where('id', Input::get('id'))
      ->where('gid', Input::get('gid'))
      ->update(['image4' => '']);
    }
   

  }
  public function updateProperty()
  {

      $results="";
      


                DB::table('property')
                ->where('id', Input::get('id'))
                ->where('gid', Input::get('gid'))
                ->update(['rentaltype' => Input::get('rentaltype'),
              'bathroom' => Input::get('bathroom'),
              'occupancy' => Input::get('occupancy'),
              'bedrooms' => Input::get('bedrooms'),
              'title' => Input::get('title'),
              'description' => Input::get('description'),
              'country' => Input::get('country'),
              'street' => Input::get('street'),
              'unitno' => Input::get('unitno'),
              'paymentmethod' => Input::get('paymentmethod'),
              'paypalemail' => Input::get('paypalemail'),
              'termsandconditions' => Input::get('termsandconditions'),
              'lat' => Input::get('lat'),
              'thirtydays' => Input::get('thirtydays'),
              'ninetydays' => Input::get('ninetydays'),
              'sixtydays' => Input::get('sixtydays'),
              'reservationfee' => Input::get('reservationfee'),
              'depositfee' => Input::get('depositfee'),
              'lng' => Input::get('lng'),
              'maplocation' => Input::get('maplocation'),
              'city' => Input::get('city'),
              'currency' => Input::get('currency'),
              'minimumstay' => Input::get('minimumstay'),
              'rateperday' => Input::get('rateperday'),
              'airconditioning' => Input::get('airconditioning'),
              'linen' => Input::get('linen'),
              'washingmachine' => Input::get('washingmachine'),
              'internet' => Input::get('internet'),
              'wirelessinternet' => Input::get('wirelessinternet'),
              'pool' => Input::get('pool'),
              'elevator' => Input::get('elevator'),
              'wheelchair' => Input::get('wheelchair'),
              'fridge' => Input::get('fridge'),
              'kettle' => Input::get('kettle'),
              'microwave' => Input::get('microwave'),
              'stove' => Input::get('stove'),
              'satelitetv' => Input::get('satelitetv'),
              'balcony' => Input::get('balcony'),
              'climbingframe' => Input::get('climbingframe'),
              'patio' => Input::get('patio'),
              'datemodified' => date("Y-m-d H:m:s"),
              'modifiedby' => 'owner']);

         
         return $results;
  }

  public function saveProperty()
  {

      $results="";
      

      $gid=md5(uniqid(rand(), true));

         $id=DB::table('property')->insertGetId([
              'gid'=>$gid,
              'rentaltype' => Input::get('rentaltype'),
              'occupancy' => Input::get('occupancy'),
              'owner' => Input::get('owner'),
              'bathroom' => Input::get('bathroom'),
              'bedrooms' => Input::get('bedrooms'),
              'title' => Input::get('title'),
              'description' => Input::get('description'),
              'country' => Input::get('country'),
              'street' => Input::get('street'),
              'termsandconditions' => Input::get('termsandconditions'),
              'unitno' => Input::get('unitno'),
              'currency' => Input::get('currency'),
              'maplocation' => Input::get('maplocation'),
              'lat' => Input::get('lat'),
              'paymentmethod' => Input::get('paymentmethod'),
              'paypalemail' => Input::get('paypalemail'),
              'thirtydays' => Input::get('thirtydays'),
              'sixtydays' => Input::get('sixtydays'),
              'ninetydays' => Input::get('ninetydays'),
              'reservationfee' => Input::get('reservationfee'),
              'depositfee' => Input::get('depositfee'),
              'lng' => Input::get('lng'),
              'minimumstay' => Input::get('minimumstay'),
              'rateperday' => Input::get('rateperday'),
              'city' => Input::get('city'),
              'airconditioning' => Input::get('airconditioning'),
              'linen' => Input::get('linen'),
              'washingmachine' => Input::get('washingmachine'),
              'internet' => Input::get('internet'),
              'wirelessinternet' => Input::get('wirelessinternet'),
              'pool' => Input::get('pool'),
              'elevator' => Input::get('elevator'),
              'wheelchair' => Input::get('wheelchair'),
              'fridge' => Input::get('fridge'),
              'kettle' => Input::get('kettle'),
              'microwave' => Input::get('microwave'),
              'stove' => Input::get('stove'),
              'satelitetv' => Input::get('satelitetv'),
              'balcony' => Input::get('balcony'),
              'climbingframe' => Input::get('climbingframe'),
              'patio' => Input::get('patio'),
              'status' => 'F',
              'posted' => 'N',
              'createdby' => 'owner',
              'datemodified' => date("Y-m-d H:m:s"),
              'datecreated' => date("Y-m-d H:m:s"),
              'modifiedby' => 'owner']);
          if($id!=""){
            $results=$id;
          }

          $res= DB::select("select emailaddress,firstname,lastname from propertyowner where id=:id",['id'=>Input::get('owner')]);
          if($res){
            $email=$res[0]->emailaddress;
            $name=$res[0]->firstname." ".$res[0]->lastname;
            Mail::send('emails.sendOwnerPropertyRegistration', ['name' => $name,'property'=>Input::get('title')], function ($message) use($email)
            {
            
            $message->subject('Property Registration');
            
            $message->from('noreply@payrollclub.co', 'UniSerb');
            
            $message->to($email);
            
            });
            
         }
         
         return $results;
  }

  public function approveProperty()
  {
    $results="";
    DB::table('property')
    ->where('id',Input::get('id'))
    ->update(['status' =>'A',
      'dateapproved' => date("Y-m-d H:m:s"),
      'approvedby' =>Input::get('username')]);
      return $results;
  }

  public function disapproveProperty()
  {
    $results="";
    DB::table('property')
    ->where('id',Input::get('id'))
    ->update(['status' =>'D',
      'datedisapproved' => date("Y-m-d H:m:s"),
      'disapprovedby' =>Input::get('username')]);
      return $results;
  }


  public function setInactiveProperty()
  {
    $results="";
    DB::table('property')
    ->where('id',Input::get('id'))
    ->update(['status' =>'I',
      'datedisapproved' => date("Y-m-d H:m:s"),
      'disapprovedby' =>Input::get('username')]);
      return $results;
  }

  
  

  public function approvePropertyOwner()
  {
    $results="";
    DB::table('propertyowner')
    ->where('id',Input::get('id'))
    ->update(['active' =>'A',
      'status' =>'A',
      'dateapproved' => date("Y-m-d H:m:s"),
      'approvedby' =>Input::get('username')]);
      return $results;
  }
  
  public function owerchecklogin()
  {
    $password=Input::get('password');
    $results= DB::select("select id,password,emailaddress,firstname,lastname from propertyowner where emailaddress=:emailaddress",['emailaddress'=>Input::get('username')]);
    if($results){
      $db_password=$results[0]->password;
      if ($password== $db_password) {
         $data["emailaddress"]=$results[0]->emailaddress;
         $data["firstname"]=$results[0]->firstname;
         $data["lastname"]=$results[0]->lastname;
         $data["id"]=$results[0]->id;
         $data["message"]='';
      }else{
          $data["message"]="Invalid email address or wrong password";
      }

}else{
  $data["message"]="Invalid email address or wrong password";
}

      return  $data;
  }

  public function adminchecklogin()
  {
    $results="";
    $password=Input::get('password');
    $username=Input::get('username');
    if($password=="Admin101" && $username=="admin"){

    }else{
      $results="Invalid username or wrong password";
    }

      return  $results;
  }

  public function disapprovePropertyOwner()
  {
    $results="";
    DB::table('propertyowner')
    ->where('id',Input::get('id'))
    ->update(['active' =>'I',
      'status' =>'D',
      'datedisapproved' => date("Y-m-d H:m:s"),
      'disapprovedby' =>Input::get('username')]);
      return $results;
  }
  public function getOwnerForApproval()
  {
      $results= DB::select("select propertyowner.id,date_format(datecreated,'%e-%b-%Y') as datecreated,firstname,middlename,lastname,
      nationality.nationality,gender,date_format(birthdate,'%e-%b-%Y') as birthdate,mobileno,telephoneno,emailaddress,address from propertyowner
      inner join nationality on nationality.id = propertyowner.nationality
      where status='F'");
      return $results;
  }

  public function postProperty($id)
  {
    $results="";
    DB::table('property')
    ->where('id',$id)
    ->update(['posted' =>'Y',
      'dateposted' => date("Y-m-d H:m:s")]);
      return $results;
  }

  public function confirmBooking($id)
  {
    $results="";
    DB::table('bookedproperty')
    ->where('id',$id)
    ->update(['confirm' =>'Y',
      'dateconfirm' => date("Y-m-d H:m:s")]);
      return $results;
  }
  public function unconfirmBooking($id)
  {
    $results="";
    DB::table('bookedproperty')
    ->where('id',$id)
    ->update(['confirm' =>'N',
      'dateunconfirm' => date("Y-m-d H:m:s")]);
      return $results;
  }


  public function unpostProperty($id)
  {
    $results="";
    DB::table('property')
    ->where('id',$id)
    ->update(['posted' =>'N',
      'dateunpost' => date("Y-m-d H:m:s")]);
      return $results;
  }


  

  public function getPropertyOwners()
  {
      $results= DB::select("select propertyowner.id,date_format(datecreated,'%e-%b-%Y') as datecreated,firstname,middlename,lastname,
      nationality.nationality,gender,date_format(birthdate,'%e-%b-%Y') as birthdate,mobileno,telephoneno,emailaddress,address,
      (select count(id) from property where property.owner=propertyowner.id and property.status='A') as propertycount from propertyowner
      inner join nationality on nationality.id = propertyowner.nationality
      where status='A'");
      return $results;
  }
  
  
  public function getApprovedProperties()
  {
      $results= DB::select("Select
      property.id,
      property.gid,
      date_format(property.datecreated,'%e-%b-%Y') as datecreated,
      rentaltype.rentaltype,
      bathroom,
      occupancy,
      property.bedrooms,
      property.title,
      status.status,
      property.status as statusid,
      propertyowner.firstname,
      propertyowner.lastname,
      case when property.posted='N' then 'Not Posted' else 'Posted' end as posted
    From
      property Inner Join
      propertyowner
        On property.owner = propertyowner.id Inner Join
      rentaltype
        On property.rentaltype = rentaltype.id Inner Join
      status
        On property.status = status.id
        where property.status in ('A','I')");
      return $results;
  }


  public function getPropertiesForApproval()
  {
      $results= DB::select("Select
      property.id,
      property.gid,
      date_format(property.datecreated,'%e-%b-%Y') as datecreated,
      rentaltype.rentaltype,
      bathroom,
      occupancy,
      property.bedrooms,
      property.title,
      status.status,
      propertyowner.firstname,
      propertyowner.lastname,
      case when property.posted='N' then 'Not Posted' else 'Posted' end as posted
    From
      property Inner Join
      propertyowner
        On property.owner = propertyowner.id Inner Join
      rentaltype
        On property.rentaltype = rentaltype.id Inner Join
      status
        On property.status = status.id
        where property.status='F'");
      return $results;
  }

  
  public function getConfirmedProperties($from,$to)
  {
    $results="";
    if($from=="0" || $to=="0"){
      $results= DB::select("select bookedproperty.id,email,property.title,
      property.id as propertyid,
      property.gid as propertygid,
      name,rate,guest,format(totalprice,2) as totalprice,
      date_format(checkin,'%e-%b-%Y') as checkin,
      date_format(dateconfirm,'%e-%b-%Y') as dateconfirm,
      date_format(checkout,'%e-%b-%Y') as checkout,
      date_format(datebooked,'%e-%b-%Y') as datebooked,
      clients.emailaddress,
      clients.mobileno,
      clients.fullname,
      date_format(bookedproperty.datecanceled,'%e-%b-%Y') as datecanceled,
      concat(datediff(checkout,checkin)+1,' day(s)') as noofdays from bookedproperty
      inner join property on property.id=bookedproperty.propertyid
      inner join clients on clients.emailaddress=bookedproperty.email
      WHERE bookedproperty.confirm ='Y' and bookedproperty.status='C' ORDER BY dateconfirm asc");
    }else{

    $from=date('Y-m-d', strtotime($from)); 
    $to=date('Y-m-d', strtotime($to)); 


      $results= DB::select("select bookedproperty.id,email,property.title,
      property.id as propertyid,
      property.gid as propertygid,
      name,rate,guest,format(totalprice,2) as totalprice,
      date_format(checkin,'%e-%b-%Y') as checkin,
      date_format(dateconfirm,'%e-%b-%Y') as dateconfirm,
      date_format(checkout,'%e-%b-%Y') as checkout,
      date_format(datebooked,'%e-%b-%Y') as datebooked,
      clients.emailaddress,
      clients.mobileno,
      clients.fullname,
      date_format(bookedproperty.datecanceled,'%e-%b-%Y') as datecanceled,
      concat(datediff(checkout,checkin)+1,' day(s)') as noofdays from bookedproperty
      inner join property on property.id=bookedproperty.propertyid
      inner join clients on clients.emailaddress=bookedproperty.email
      WHERE bookedproperty.confirm ='Y' and bookedproperty.status='C'
      and dateconfirm>=:from and dateconfirm<=:to",['from'=>$from,'to'=>$to]);
    }
      return $results;
  }

  public function getCanceledProperties($from,$to)
  {
    $results="";
    if($from=="0" || $to=="0"){
      $results= DB::select("select bookedproperty.id,email,property.title,
      property.id as propertyid,
      property.gid as propertygid,
      name,rate,guest,format(totalprice,2) as totalprice,
      date_format(checkin,'%e-%b-%Y') as checkin,
      date_format(datecanceled,'%e-%b-%Y') as datecanceled,
      date_format(checkout,'%e-%b-%Y') as checkout,
      date_format(datebooked,'%e-%b-%Y') as datebooked,
      clients.emailaddress,
      clients.mobileno,
      clients.fullname,
      date_format(bookedproperty.datecanceled,'%e-%b-%Y') as datecanceled,
      concat(datediff(checkout,checkin)+1,' day(s)') as noofdays from bookedproperty
      inner join property on property.id=bookedproperty.propertyid
      inner join clients on clients.emailaddress=bookedproperty.email
      WHERE bookedproperty.status ='C' order by datecanceled asc ");
    }else{

    $from=date('Y-m-d', strtotime($from)); 
    $to=date('Y-m-d', strtotime($to)); 


      $results= DB::select("select bookedproperty.id,email,property.title,
      property.id as propertyid,
      property.gid as propertygid,
      name,rate,guest,format(totalprice,2) as totalprice,
      date_format(checkin,'%e-%b-%Y') as checkin,
      date_format(datecanceled,'%e-%b-%Y') as datecanceled,
      date_format(checkout,'%e-%b-%Y') as checkout,
      date_format(datebooked,'%e-%b-%Y') as datebooked,
      clients.emailaddress,
      clients.mobileno,
      clients.fullname,
      date_format(bookedproperty.datecanceled,'%e-%b-%Y') as datecanceled,
      concat(datediff(checkout,checkin)+1,' day(s)') as noofdays from bookedproperty
      inner join property on property.id=bookedproperty.propertyid
      inner join clients on clients.emailaddress=bookedproperty.email
      WHERE bookedproperty.status ='C'
      and datecanceled>=:from and datecanceled<=:to",['from'=>$from,'to'=>$to]);
    }
      return $results;
  }


  public function getBookedProperties()
  {
      $results= DB::select("select bookedproperty.id,email,property.title,
      property.id as propertyid,
      property.gid as propertygid,
      case when confirm='N' then 'Not Confirm' else 'Confirm' end as confirm,name,rate,guest,totalprice,
      date_format(checkin,'%e-%b-%Y') as checkin,
      date_format(checkout,'%e-%b-%Y') as checkout,
      date_format(datebooked,'%e-%b-%Y') as datebooked,
      date_format(bookedproperty.datecanceled,'%e-%b-%Y') as datecanceled,
      case when bookedproperty.status = 'B' then 'Booked' else 'Canceled' end as status,
      bookedproperty.status as statusid,
      case when confirm='Y' then date_format(dateconfirm,'%e-%b-%Y') else '' end as dateconfirm,
      concat(datediff(checkout,checkin)+1,' day(s)') as noofdays from bookedproperty
      inner join property on property.id=bookedproperty.propertyid
      WHERE bookedproperty.status in ('B','C')");
      return $results;
  }

  public function getProperties()
  {
      $results= DB::select("Select
      property.id,
      property.gid,
      date_format(property.datecreated,'%e-%b-%Y') as datecreated,
      rentaltype.rentaltype,
      occupancy,
      bathroom,
      property.bedrooms,
      property.title,
      property.status as statusid,
      status.status,
      case when property.posted='N' then 'Not Posted' else 'Posted' end as posted
    From
      property Inner Join
      propertyowner
        On property.owner = propertyowner.id Inner Join
      rentaltype
        On property.rentaltype = rentaltype.id Inner Join
      status
        On property.status = status.id");
      return $results;
  }

  public function getPropertyInfo($id,$gid)
  {
      $results= DB::select("Select
      property.id,
      property.gid,
      property.owner,
      property.rentaltype,
      property.bathroom,
      property.occupancy,
      property.bedrooms,
      property.title,
      property.description,
      property.country,
      property.street,
      property.unitno,
      property.airconditioning,
      property.linen,
      property.washingmachine,
      property.internet,
      property.wirelessinternet,
      property.paymentmethod,
      property.paypalemail,
      property.pool,
      property.elevator,
      property.wheelchair,
      property.fridge,
      property.kettle,
      property.microwave,
      property.stove,
      property.satelitetv,
      property.balcony,
      property.climbingframe,
      property.patio,
      property.children,
      property.pets,
      property.smoking,
      property.datemodified,
      property.modifiedby,
      property.status,
      property.posted,
      property.datecreated,
      property.createdby,
      property.dateapproved,
      property.approvedby,
      property.datedisapproved,
      property.disapprovedby,
      property.dateposted,
      property.dateunpost,
      property.image1,
      property.image2,
      property.image3,
      property.image4,
      property.currency,
      property.minimumstay,
      property.rateperday,
      property.lat,
      property.lng,
      property.thirtydays,
      property.sixtydays,
      property.ninetydays,
      property.maplocation,
      property.reservationfee,
      property.depositfee,
      property.termsandconditions,
      property.city,
      cities.city as cityname
    From
    property  left Join
    cities
        On property.city = cities.id where property.id=:id and property.gid=:gid",["id"=>$id,"gid"=>$gid]);
      return $results;
  }
  
  public function uploadProperty(){

    $id=Input::get('id');

    $destinationPath = 'property'; 

    $file = array('image' => Input::file('file'));
    
         $rules = array('image' => 'required'); 
    
         $validator = Validator::make($file, $rules);
         if ($validator->fails()) {
             return "validation failed";
         }else {
          if (Input::file('file')->isValid()) {
            $extension = Input::file('file')->getClientOriginalExtension(); 
            $fname=$id.'_'.Input::get('field').'.'.$extension;
        
            if($extension=='png' || $extension=='jpg' || $extension=='jpeg' || $extension=='bmp' ){
                            
              if( Input::file('file')->getSize()<=4194304){
                Input::file('file')->move(storage_path().'/'.$destinationPath, $fname); 

                $whereArr = array('id' => $id);
                if(Input::get('field')=="1"){
                  DB::table('property')
                  ->where($whereArr)
                  ->update(['image1' => $fname]);
                }else if(Input::get('field')=="2"){
                  DB::table('property')
                  ->where($whereArr)
                  ->update(['image2' => $fname]);
                }else if(Input::get('field')=="3"){
                    DB::table('property')
                    ->where($whereArr)
                    ->update(['image3' => $fname]);
                }else if(Input::get('field')=="4"){
                  DB::table('property')
                  ->where($whereArr)
                  ->update(['image4' => $fname]);
                }
              }
            }
      } 
    }

    
    return "";
  }


public function getPropertyImage($filename){
  
 $destinationPath = 'property'; 


 $path = storage_path().'/'.$destinationPath.'/'.$filename;

 if(file_exists($path)){
 $response = Response::make(File::get($path));
 $response->header('Content-Type', 'image/png');
 ob_end_clean();
     return $response;
 }else{
  ob_end_clean();
  $path = storage_path().'/'.$destinationPath.'/not-available.png';
  $response = Response::make(File::get($path));
  $response->header('Content-Type', 'image/png');
  return $response;
 }
}

}
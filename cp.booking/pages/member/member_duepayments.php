 <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Loan Type</th>
                        <th>Due Date</th>
                        <th>Principal Amount</th>
                        <th>Interest</th>
                        <th>Amount Due</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="due in dues" >
                        <td>{{ due.id }}</td>
                        <td>{{ due.loantype }}</td>
                        <td>{{ due.duedate }}</td>
                        <td class="text-right">{{ due.principal }}</td>
                        <td class="text-right">{{ due.interest }}</td>
                        <td class="text-right">{{ due.amountdue }}</td>
                        
                        
                    </td>
                </tr>
                
                
            </tbody>
</table>
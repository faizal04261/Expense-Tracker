<div>
    <div class="d-flex justify-content-between">
        <div class="p-2">
            <h3>Exam Report</h3>
        </div>
    </div>
    <hr style="margin: 1px !important;">
    <div class="row">

        <div class="col my-3">

            <label for="examID">Exams:</label>
            <select class="form-control "  wire:model ="examID" name="examID"  >
            <?php $__currentLoopData = $examlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($exam->id); ?>"><?php echo e($exam->examName); ?> </option>                           
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="col my-3">
            
            <button   wire:click="getUserExamData"  
                type="button" 
                class="btn btn-lg btn-primary mt-4"
                
            >LOAD</button>
           
        </div>
    </div>
    <button   wire:click="extractSummary"  
                type="button" 
                class="btn btn-lg btn-primary mt-3"
            >Extract</button>
    <div class="table-responsive">
        <table id="report_table" class="table table-hover table-bordered mt-4">
        <thead class="thead-dark">
            <tr>    
                
                <th>Vertical</th>                            
                <th>LOB</th> 
                <th>ExamName</th>   
                <th>Count of passed</th>   
                <th>Count of failed</th>  
                <th>Action</th>  
             
            </tr>
        </thead>
        <tbody>
        <?php ($index = 0); ?>
           <?php $__currentLoopData = $examSummaryList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $summarydata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
               
                    <td><?php echo e($summarydata['Account']['vertical']); ?></td>
                    <td><?php echo e($summarydata['Account']['acct_lob']); ?></td>
                    <td><?php echo e($summarydata['examname']); ?></td>
                    <td><?php echo e($summarydata['pass']); ?></td>
                    <td><?php echo e($summarydata['fail']); ?></td>
                 

                  
                    <td><button  
                         wire:click="getexamlist(<?php echo e($index); ?>)"     
                         data-toggle="modal" 
                        data-target="#examlistmodal"                   
                        type="button" class="btn btn-primary edit-department">View
                    </button></td>
                </tr>
                <?php ($index = $index + 1); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
                
        </tbody> 
        </table>
    </div>



<!-- Modal -->
<div  wire:ignore.self class="modal fade" id="examlistmodal" role="dialog">
        <div class="modal-dialog  modal-xl">
            <div class="modal-content">

            

                <!-- Modal content-->
                <div class="modal-header">
                    

                    <h3 class="modal-title">Exam Summary</h3>                 
                
                    
                   
                    
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body-->     

                <div class="modal-body">
            
                    <p class="modal-title">Vertical: <?php echo e($tmpvername); ?></p>
                    <p class="modal-title">LOB: <?php echo e($tmplob); ?></p>
                    <p class="modal-title">Exam Type: <?php echo e($examtype); ?></p>
                    <p class="modal-title">Exam name: <?php echo e($tmpename); ?></p>
                    <p class="modal-title">Number of passed: <?php echo e($tmppcount); ?></p>
                    <p class="modal-title">Number of failed: <?php echo e($tmpfcount); ?></p>
                    <button   wire:click="extractexamlistdata"  
                        type="button" 
                        class="btn btn-lg btn-primary mt-3"
                    >Extract</button>
                    
                    <div class="table-responsive" style="padding: 10px;">
                        <table id="cqaccount_table" class="table table-hover table-bordered mt-4">
                            <thead class="thead-dark">
                                <tr>     
                                    <th>Exam Type</th>  
                                    <th>Username</th>   
                                    <th>ExamName</th>  
                                    <th>Exam Total Items</th> 
                                    <th>Exam Total Points</th> 
                                    <th>Exam Total Duration</th>   
                                    <th>Exam Passing %</th>  
                                    <th>Actual total Points</th>       
                                    <th>Actual Total Duration</th> 
                                    <th>Actual %</th> 
                                  
                                    <th>taken date</th> 
                                    <th>Exam status</th> 
                                   
                                </tr>
                            </thead>
                            <tbody>
                    
                          
                                <?php $__currentLoopData = $examresultlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $examdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                           
                                            <?php if($examdata['examdata']['type'] == 1): ?>
                                                <td>Regular</td>
                                            <?php else: ?>
                                                <td>New Hire</td>
                                            <?php endif; ?>

                                              
                                            <td><?php echo e($examdata['examdata']['username']); ?></td>
                                            <td><?php echo e($examdata['examdata']['examName']); ?></td>
                                            <td><?php echo e($examdata['emxaitem']); ?></td>
                                    
                                         
                                            <td><?php echo e($examdata['exampoints']); ?></td>
                                            <td><?php echo e($examdata['examduration']); ?></td>
                                            <td><?php echo e($examdata['exampercent']); ?></td>

                                            <td><?php echo e($examdata['userpoints']); ?></td>
                                            <td><?php echo e($examdata['userduration']); ?></td>
                                            <td><?php echo e($examdata['userpercet']); ?> (<?php echo e($examdata['examstatus']); ?> ) </td>
                                          
                                            <td><?php echo e($examdata['examdata']['takendate']); ?></td>
                                            <td><?php echo e($examdata['examdata']['status']); ?></td>
                                          

                                        
                                        </tr>
                                    
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 
                            </tbody> 
                        </table>
                    </div>
                </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                     <button   type="button" class="btn btn-lg btn-primary"  data-dismiss="modal">Close</button>
           
                </div>

                
            </div>
        </div>
    </div>



</div>
<?php /**PATH C:\laragon\www\MandatoryComplianceTraining\resources\views/livewire/lw-report.blade.php ENDPATH**/ ?>
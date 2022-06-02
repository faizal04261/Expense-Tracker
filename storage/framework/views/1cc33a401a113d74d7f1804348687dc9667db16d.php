<div>
    <div class="d-flex justify-content-between">
        <div class="p-2">
            <h3>Exam and Result</h3>
        </div>
    </div>
    <hr style="margin: 1px !important;">
    <div class="row">

        <div class="col my-3">

            <label for="examID">Available Exams:</label>
            <select class="form-control "  wire:model ="examID" name="examID"  >
            <?php $__currentLoopData = $examlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($exam->id); ?>"><?php echo e($exam->examName); ?> </option>                           
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <?php if(count($this->AvailUserExamList)): ?>
            <div class="col my-3">
            
            <button   wire:click="getExam"  
                    type="button" 
                    class="btn btn-lg btn-primary mt-3"
                    data-toggle="modal" 
                    data-target="#questionModel">PROCEED</button>
            </div>
        <?php endif; ?>    

    </div>


     <div class="row">

        <div class="col mb-3">

            <label for="examID">Exam result:</label>
            <select class="form-control "  wire:model ="allexamID" name="allexamID"  >
            <?php $__currentLoopData = $allexamlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $examdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($examdata->id); ?>"><?php echo e($examdata->examName); ?> </option>                           
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
       

    </div>
    




    
    <div class="table-responsive">
        <table id="cqaccount_table" class="table table-hover table-bordered mt-3">
        <thead class="thead-dark">
            <tr>    
                <th>Username</th>   
                <th>ExamName</th>                            
                <th>Exam Total Points</th> 
                <th>Exam Total Duration</th>   
                <th>Exam Passing score</th>  
                <th>Actual total Points</th>       
                <th>Actual Total Duration</th> 
                <th>Actual Score</th> 
                <th>taken date</th> 
                <?php if(Auth::user()->user_level == 1): ?>
                    <th>Exam Status</th>
                <?php endif; ?>
                <th>Action</th>
                <th>Certificate</th>
            </tr>
        </thead>
        <tbody>
        <?php ($index = 0); ?>
           <?php $__currentLoopData = $userExamList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $examdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
               
                    <td><?php echo e($examdata['examdata']['username']); ?></td>
                    <td><?php echo e($examdata['examdata']['examName']); ?></td>
                    <td><?php echo e($examdata['exampoints']); ?></td>
                    <td><?php echo e($examdata['examduration']); ?></td>
                    <td><?php echo e($examdata['exampercent']); ?></td>

                    <td><?php echo e($examdata['userpoints']); ?></td>
                    <td><?php echo e($examdata['userduration']); ?></td>
                    <td><?php echo e($examdata['userpercet']); ?></td>
                    <td><?php echo e($examdata['examdata']['takendate']); ?></td>
                    <td><?php echo e($examdata['examdata']['status']); ?></td>

                    <?php if(Auth::user()->user_level == 1): ?>
                        <td><button  
                            wire:click="getUserExamData(<?php echo e($index); ?>,<?php echo e($examdata['examdata']['id']); ?>)"     
                            data-toggle="modal" 
                            data-target="#examdataModal"                   
                            type="button" class="btn btn-primary edit-department">View
                        </button></td>
                    
                        <?php if($examdata['ispass']): ?>
                            <td><button  
                            
                                wire:click="getCert(<?php echo e($index); ?>,<?php echo e($examdata['examdata']['id']); ?>)"     
                            
                                type="button" class="btn btn-primary edit-department">Download
                            </button></td>
                        <?php endif; ?>
                    <?php endif; ?>
                </tr>
                <?php ($index = $index + 1); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
                
        </tbody> 
        </table>
    </div>


      <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="questionModel" role="dialog"  data-backdrop="static" data-keyboard="false" >
        <div class="modal-dialog  modal-xl">
            <div class="modal-content">

                <!-- Modal content-->
                <div class="modal-header">
                    <?php if($started): ?>
                        <h3 class="modal-title"><?php echo e($examName); ?></h3>
                        <h3 wire:poll.1000ms="updatetimer" class="modal-title"><?php echo e($tmptimer); ?> </h3>
                        <h3 class="modal-title"><?php echo e($currentItem); ?> / <?php echo e($items); ?></h3>
                    <?php else: ?>
                        <h3 class="modal-title"><?php echo e($examName); ?></h3>
                    <?php endif; ?>
                    
                    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                </div>

                <!-- Modal body-->      
                <div class="modal-body">
                    
            
                        <?php if($started): ?>
                            <p><?php echo e($questionDataList[$currentItem - 1]['qstring']); ?></p>

                        

                                <?php for($a = 1; $a <= count($questionDataList[$currentItem - 1]['qchoice']); $a++ ): ?>
                                    <?php if($questionDataList[$currentItem - 1]['qtype'] == 1): ?>
                                        <br>
                                            <input wire:model="singleAns"  type="radio" value=<?php echo e($a); ?> /> <?php echo e($questionDataList[$currentItem - 1]['qchoice'][$a]); ?>

                                        <br>
                                    <?php else: ?>
                                        <br>
                                            <input  wire:model="multiAns.<?php echo e($a); ?>"  type="checkbox" value=<?php echo e($a); ?> /> <?php echo e($questionDataList[$currentItem - 1]['qchoice'][$a]); ?>

                                        <br>
                                    <?php endif; ?>
                                <?php endfor; ?>
                        
                            <button type="button" wire:click="nextQ(<?php echo e($questionDataList[$currentItem - 1]['qtype']); ?>,<?php echo e($questionDataList[$currentItem - 1]['qid']); ?>)"   class="btn btn-primary">next</button>
                        <?php else: ?>

                            <?php if($isEnded): ?>
                                <p class="m-1">Exam Completed!!</p><br>
                                <p class="m-1">You can now close this form.</p><br>
                                
                                <button type="button" wire:click="resetData"  class="btn btn-danger" data-dismiss="modal">Close</button>
                            <?php elseif($timeUP): ?>
                                <p class="m-1">Times up!!</p><br>
                                <p class="m-1">You can now close this form.</p><br>
                                
                                <button type="button" wire:click="resetData" class="btn btn-danger" data-dismiss="modal">Close</button>
                                
                            <?php else: ?>
                                <p class="m-1">This Exam is for <?php echo e($examtype); ?> only.</p><br>
                                <p class="m-1">Your exam time limit is <?php echo e($tmpduration); ?> minutes and <?php echo e($items); ?> items.</p><br>
                                <p class="m-1">After you click the start button your timer will start.</p><br>
                                <p class="m-1">Make sure that your internet connection is strong and stable.</p><br>
                                <p class="m-1">God bless</p><br>
                                <button type="button" class="btn btn-primary" wire:click="startExam"  >Start</button>
                                <button type="button" class="btn btn-danger" wire:click="resetData"  data-dismiss="modal">Cancel</button>

                            <?php endif; ?>
                            
                        
                        <?php endif; ?>

                    

                    
                    

                    <!-- Modal footer -->
                    <!-- <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div> -->
                
                </div>
            </div>
        </div>

    </div>









    
    <!-- Modal -->
    <div  wire:ignore.self class="modal fade" id="examdataModal" role="dialog">
        <div class="modal-dialog  modal-xl">
            <div class="modal-content">

            

                <!-- Modal content-->
                <div class="modal-header">
                    

                    <h3 class="modal-title">Exam Data</h3>                 
                
                    
                   
                    
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body-->     

                <div class="modal-body">
                    <p class="modal-title">Exam name: <?php echo e($userexamname); ?></p>
                    <p class="modal-title">Username: <?php echo e($username); ?></p>

                    <div class="table-responsive" style="padding: 10px;">
                        <table id="cqaccount_table" class="table table-hover table-bordered mt-4">
                            <thead class="thead-dark">
                                <tr>     
                                    <th>Question id</th>                                 
                                    <th>Question</th>                             
                                    <th>Question Point/s</th> 
                                    <th>Question Duration/s</th> 
                                    <th>isCorrect</th>  
                                </tr>
                            </thead>
                            <tbody>
                    
                                <?php $__currentLoopData = $questionlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $questiondata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr >                                 
                        
                                        <td><?php echo e($questiondata['qdata']['id']); ?></td>
                                        <td><?php echo e($questiondata['qdata']['questionString']); ?></td>
                                        <td><?php echo e($questiondata['qdata']['questionpoints']); ?></td>
                                        <td><?php echo e($questiondata['qdata']['questionduration']); ?></td>
                                        <?php if($questiondata['isCorrect'] == "true"): ?>
                                            <td>Yes</td>
                                        <?php else: ?>
                                            <td>No</td>
                                        <?php endif; ?>
                                    

                                    
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




      <!-- Modify Modal -->
      <div  wire:ignore.self class="modal fade" id="certmodal" role="dialog">
      <!-- <div class="modal fade" id="certmodal" role="dialog"> -->
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal header-->
                            <div class="modal-header">
                            <h4 class="modal-title">Terms and Agreement</h4>
                            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                            </div>
                            <!-- Modal body-->
                            <form action="#">
                            <div class="modal-body">
                        

                        <embed src="<?php echo e(asset('storage/files/cert.pdf')); ?>" alt="Cinque Terre" width="480" height="400">

                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                        <label for="vehicle1"> I Agree</label><br>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Continue</button>
                               
                            </div>
                            </form>  
                        </div>    
                        </div>
                    </div>













  

</div>
<?php /**PATH C:\laragon\www\expenseTracker\resources\views/livewire/lw-exam-result.blade.php ENDPATH**/ ?>
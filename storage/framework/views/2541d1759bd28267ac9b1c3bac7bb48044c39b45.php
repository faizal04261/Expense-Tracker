<div>
    <div class="d-flex justify-content-between">
        <div class="p-2">
            <h3>Exam Repository</h3>
        </div>
    </div>
    <div class="mb-3 p-3 class border border-dark rounded">
        <form wire:submit.prevent ="saveExam" id="addcate"  style="display:block" name="addform">

                    
                    

            <div class="row mb-2">
               
                <div class="col mb-2">
                    <label for="aqpoints">Exam Name:</label>
                    <input class="form-control" type="text"  required wire:model ="aExamName">
                
                </div>
                <div class="col mb-2">
                    <label for="aqpoints">Exam Description:</label>
                    <input class="form-control" type="text"  required wire:model ="aExamDesc" >
                
                </div>

               
            </div>
            <div class="row mb-2">

                <div class="col mb-2">
                    <label for="uqstatus">Exam Type:</label>
                    <select class="form-control mb-2" wire:model ="aexantype" >
                        <option value=1>Regular</option>
                        <option value=2>New Hire</option>
                    </select>                
                </div>


                <div class="col mb-2">
                    <label for="aqpoints">Exam Passing %:</label>
                    <input class="form-control" type="number" number required  wire:model ="aExamPass" defer>
                
                </div>

                <div class="col mb-2">
                    <label for="aqpoints">Number of attempt:</label>
                    <input class="form-control" type="number" number  required  wire:model ="aAttempt" defer>
                
                </div>
                <div class="col mb-2">
                    <label for="aqpoints">Number of Hour's:</label>
                    <input class="form-control" type="number" number required  wire:model ="aHour" defer>
                
                </div>
                <div class="col mb-2">
                    <label for="aqpoints">Deadline:</label>
                    <input class="form-control" type="date" required  wire:model ="aDeadline">
                
                </div>

                <div class="col mb-2">
                    <label for="uqstatus">Status:</label>
                    <select class="form-control mb-2" wire:model ="aExamStatus" >
                        <option value=1>Active</option>
                        <option value=2>Inactive</option>
                    </select>
                
                </div>

            </div>

            <div class="mb-3 p-3 class border border-dark rounded">
                <div class="row mb-2">
                
                    <div class="col mb-2">
                        <label for="aQuestionCategory">Category:</label>
                        <select class="form-control "  wire:model ="aQuestionCategory" name="aQuestionCategory"  >
                            <?php $__currentLoopData = $categorylist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>                           
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col mb-2">
                        <label for="aqpoints">Category count:</label>
                        <input class="form-control"   type="number" number wire:model ="aQuestionCategoryCount" defer>
                    
                    </div>

                    <div class="col mb-2 text-center">
                        <label for="aqpoints">Shuffle Question:</label>
                        <input class="form-control" wire:model ="aQuestionCategoryShuffleSeg"  type="checkbox"  >
                    
                    </div>
                    <div class="col mb-2 text-center">
                        <label for="aqpoints">Shuffle Choices:</label>
                        <input class="form-control" wire:model ="aQuestionCategoryShuffleChoice" type="checkbox"  >
                    
                    </div>
                    <div class="col mb-2 text-center">
                        <label for="aqpoints">Randomize Question:</label>
                        <input class="form-control"  wire:model ="aQuestionCategoryRandomize"  type="checkbox"  >
                    
                    </div>
                
                    
                </div>
                <div class="row mb-1">
                    <button   type="button"    wire:click="addCateconfig()"  class="btn btn-lg btn-primary">Add Category</button>
                </div>


                <div class="table-responsive">
                    <table id="cqaccount_table" class="table table-hover table-bordered mt-4">
                        <thead class="thead-dark">
                            <tr>      
                                
                                <th>Category</th>
                                <th>Count</th>
                                <th>Shuffle Question</th> 
                                <th>Shuffle Choices</th> 
                                <th>Randomize Question/s</th>   
                                <th>Status</th>   
                                <th>Action</th>       
                                <th>Questions</th>    
                           
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $cateconfiglist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cateconfigdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               
                                    <tr >
                                     
                                        <td><?php echo e($cateconfigdata['catename']); ?></td>
                                        <td><?php echo e($cateconfigdata['count']); ?></td>
                                        <?php if( $cateconfigdata['shuffleSeq'] == 1): ?>
                                            <td>Yes</td>
                                        <?php else: ?>
                                            <td>No</td>
                                        <?php endif; ?>
                                        <?php if($cateconfigdata['shufflechoice'] == 1): ?>
                                             <td>Yes</td>
                                        <?php else: ?>
                                            <td>No</td>
                                        <?php endif; ?>
                                        <?php if($cateconfigdata['randomize'] == 1): ?>
                                            <td>Yes</td>
                                        <?php else: ?>
                                            <td>No</td>
                                        <?php endif; ?>
                                      
                                        <?php if($cateconfigdata['status'] =='1'): ?> 
                                            <td>Active</td>
                                        <?php else: ?>
                                            <td>Inactive</td>        
                                        <?php endif; ?>
                                        <td><button  
                                            wire:click="showCateConfig(<?php echo e($cateconfigdata['cateid']); ?>)"                                           
                                            type="button" 
                                            class="btn btn-primary edit-department"
                                             data-toggle="modal" 
                                            data-target="#cateconfigmodal">Modify
                                        </button></td>
                                        <td><button  
                                             wire:click="showquestiondata(<?php echo e($cateconfigdata['cateid']); ?>)"                                             
                                            type="button" 
                                            class="btn btn-primary edit-department"
                                             data-toggle="modal" 
                                            data-target="#questionModal">
                                            View
                                        </button></td>

                                    </tr>
                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                        </tbody> 
                    </table>
                </div>

            </div>
            <button   type="submit" class="btn btn-lg btn-primary">SAVE</button>
            <button   type="button"    wire:click="resetData()"   class="btn btn-lg btn-primary">CANCEL</button>
        </form>
    </div>

    <div class="col-xs-2 float-right">
        <input class="form-control" type="text" placeholder="Search Exam..." wire:model="searchExam">
    </div>

    <div class="table-responsive">
        <table id="cqaccount_table" class="table table-hover table-bordered mt-3">
        <thead class="thead-dark">
            <tr>      
                <th>ID</th>
                <th>Exam Type</th>
                <th>Exam</th>
                <th>Description</th> 
                <th>Passing percentage</th> 
                <th>Question count</th>   
                <th>Total Points</th>       
                <th>Total Duration</th>    
                <th>Updated By</th>     
                <th>Date Updated</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
                <?php $__currentLoopData = $examlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $examdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        
                        <td><?php echo e($examdata->id); ?></td>
                        
                        <?php if($examdata->type == 1): ?> 
                            <td>Regular</td>
                        <?php else: ?>
                            <td>New Hire</td>        
                        <?php endif; ?>
                        <td><?php echo e($examdata->examName); ?></td>
                        <td><?php echo e($examdata->examDescription); ?></td>
                        <td><?php echo e($examdata->passingprecentage); ?></td>
                        <td><?php echo e($examdata->totalcount); ?></td>
                        <td><?php echo e($examdata->totalpoints); ?></td>
                        <td><?php echo e($examdata->totalduration); ?></td>
                        <td><?php echo e($examdata->username); ?></td>
                        <td><?php echo e($examdata->updated_at); ?></td>
                        <?php if($examdata->statusID =='1'): ?> 
                            <td>Active</td>
                        <?php else: ?>
                            <td>Inactive</td>        
                        <?php endif; ?>
                        <td><button  
                             wire:click="showExam(<?php echo e($examdata->id); ?>)" 
                            id="<?php echo e($examdata->id . $examdata->examName); ?>" 
                            type="button" class="btn btn-primary edit-department">Modify
                        </button></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </tbody> 
        </table>
        <?php echo e($examlist->links('vendor.livewire.bootstrap')); ?>

    </div>



    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="cateconfigmodal" role="dialog">
        <div class="modal-dialog" style="max-width: 80% !important;">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Modify</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
              
                    <div class="modal-body">
                    
                            <div class="row mb-4">
                                
                                <div class="col mb-3">
                                    <label for="uQuestionCategory">Category:</label>
                                    <select class="form-control "  wire:model ="uQuestionCategory" name="uQuestionCategory"  >
                                        <?php $__currentLoopData = $categorylist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>                           
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col mb-3">
                                    <label for="uQuestionCategoryCount">Category count:</label>
                                    <input class="form-control" wire:model ="uQuestionCategoryCount" type="number"  >
                                
                                </div>

                                <div class="col mb-3 text-center">
                                    <label for="uQuestionCategoryShuffleSeg">Shuffle Question:</label>
                                    <input class="form-control" wire:model ="uQuestionCategoryShuffleSeg"  type="checkbox"  >
                                
                                </div>
                                <div class="col mb-3 text-center">
                                    <label for="uQuestionCategoryShuffleChoice">Shuffle Choices:</label>
                                    <input class="form-control" wire:model ="uQuestionCategoryShuffleChoice" type="checkbox"  >
                                
                                </div>
                                <div class="col mb-3 text-center">
                                    <label for="uQuestionCategoryRandomize">Randomize Question:</label>
                                    <input class="form-control"  wire:model ="uQuestionCategoryRandomize"  type="checkbox"  >
                                
                                </div>
                                <div class="col mb-3">
                                    <label for="uQuestionCategoryStatus">Status:</label>
                                    <select class="form-control mb-2" wire:model ="uQuestionCategoryStatus" >
                                        <option value=1>Active</option>
                                        <option value=2>Inactive</option>
                                    </select>
                                
                                </div>
                            
                                
                            </div>
                        
                    </div>

                        <div class="modal-footer">
                            <button type="button"  wire:click="updatecate" class="btn btn-primary" data-dismiss="modal" >Save</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                
            </div>
        
        </div>
    </div>  












    
    <!-- Modal -->
    <div  wire:ignore.self class="modal fade" id="questionModal" role="dialog">
        <div class="modal-dialog" style="max-width: 80% !important;">
            <div class="modal-content">

                <!-- Modal content-->
                <div class="modal-header">
                    <h4 class="modal-title">Question/s</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body-->      

                

                <div class="table-responsive" style="padding: 10px;">
                    <table id="cqaccount_table" class="table table-hover table-bordered mt-4">
                        <thead class="thead-dark">
                            <tr>     
                                <th>Question ID</th>                                 
                                <th>Question</th> 
                                <th>Question Type</th> 
                                <th>Question Point/s</th> 
                                <th>Question Duration/s</th> 
                            </tr>
                        </thead>
                        <tbody>
                
                            <?php $__currentLoopData = $questionlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $questiondata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr >  
                                    <td><input type="checkbox"  
                                    value="<?php echo e($questiondata->id); ?>"
                                    
                                     wire:model="qlist.<?php echo e($questiondata->id); ?>"                                    
                                     wire:click="addQuestiontolist(<?php echo e($questiondata->id); ?>,<?php echo e($questiondata->questioncategoryID); ?>)" 
                                     ></td>
                                    <td><?php echo e($questiondata->questionString); ?></td>
                                    <td><?php echo e($questiondata->type); ?></td>
                                    <td><?php echo e($questiondata->questionpoints); ?></td>
                                    <td><?php echo e($questiondata->questionduration); ?></td>
                                </tr>
                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody> 
                    </table>
                </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                     <button   type="button" class="btn btn-lg btn-primary"  wire:click="addQuestiontolist1" data-dismiss="modal">Close</button>
           
                </div>

                
            </div>
        </div>
    </div>
  




  

</div>
<?php /**PATH C:\laragon\www\expenseTracker\resources\views/livewire/lw-exam-repo.blade.php ENDPATH**/ ?>
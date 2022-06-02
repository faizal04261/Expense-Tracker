<div>    
    <div class="d-flex justify-content-between mt-3">
        <div class="p-2">
            <h1>Question Repository</h1>
        </div>
    </div>

    <form wire:submit.prevent ="saveQuestion" id="addcate"  style="display:block" name="addform">

                 <?php if(session()->has('message1')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(session('message1')); ?>

                    </div>
                <?php endif; ?>
            
                <?php if(session()->has('message')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('message')); ?>

                    </div>
                <?php endif; ?>
                

        <div class="row mb-3">

            <div class="col mb-3">
                <label for="aCategory">Question Category:</label>
                <select class="form-control "  wire:model ="aCategory" name="aCategory"  >
                <?php $__currentLoopData = $categorylist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>                           
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="col mb-3">
                <label for="aqtype">Question Type:</label>
                <select class="form-control "  wire:model ="aqtype" name="aqtype" wire:change="change">
                <?php $__currentLoopData = $qTypelist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($type->id); ?>"><?php echo e($type->name); ?></option>                           
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

          

        </div>

        <div class="row mb-3">
            <div class="col mb-3">
                <label for="aquestion">Question:</label>
                <textarea class="form-control" type="text" wire:model ="aquestion" required name="faizal" id="aquestion"></textarea>
            </div>
        </div>
        <div class="border">
            <?php for($i = 1; $i <= $aqcount; $i++): ?>
            
              
                <?php ($tmpname = 'Choice' .$i); ?>
            

                        <div class="row mb-1">
                            <div class="col mb-1">
                            <label for="<?php echo e($tmpname); ?>"> Choice  <?php echo e($i); ?></label>
                            <input class="form-control"   wire:change="addchoicedata($event.target.value,<?php echo e($i); ?>)"  type="input"  required ></input>
                            </div>
                        </div>
         
            <?php endfor; ?>
            <div class="row mb-1">
                    <div class="col mb-1">
                        <button   wire:click="addChoice"type="button" class="btn btn-lg btn-primary">Add Choices</button>
                    </div>
                    <div class="col mb-1">
                        <button   wire:click="removeChoice"type="button" class="btn btn-lg btn-primary">Remove Choices</button>
                    </div>
            </div>
        </div>
        <div class="row mb-1">

                <?php if($aqtype == 1): ?>
                    <div class="col mb-3">
                        <label for="asAnswer">Answer:</label>
                        <select class="form-control " name="asAnswer" wire:model ="asAnswer">       
                            <?php for($a = 1; $a <= $aqcount; $a++): ?>         
                                <option value="<?php echo e($a); ?>"><?php echo e($a); ?></option>    
                            <?php endfor; ?>       
                        </select>
                    </div>
                <?php else: ?>

                    <div class="col mb-3">
                        <label for="amAnswer">Answer:</label>
                        <select class="form-control answers"   name="amAnswer[]"  multiple="multiple" wire:model ="amAnswer">                
                            <?php for($a = 1; $a <= $aqcount; $a++): ?>         
                                <option value="<?php echo e($a); ?>"><?php echo e($a); ?></option>    
                            <?php endfor; ?>      
                        </select>
                    </div>

                <?php endif; ?>
                <div class="col mb-3">
                    <label for="aqpoints">Question Point/s:</label>
                    <input class="form-control" type="number" wire:model ="aqpoints" required name="aqpoints" id="aqpoints">
                </div>

                <div class="col mb-3">
                    <label for="aqduration">Question Duration/s(Mins):</label>
                    <input class="form-control" type="number" wire:model ="aqduration" required name="aqduration" id="aqduration">
                </div>
                <!-- <div class="col mb-3">
                    <label for="AddImage">Add image/s:</label>
                    <div class="pt-3">
                        <input class="custom-file-input" type="file"  wire:model ="aqimage"  id="imahe" name="imahe[]" data-show-caption="true" multiple>
                        <label class="custom-file-label" for="customFile" style="top:31px">Choose image file</label>
                    </div>
                </div> -->

           
        </div>

        <div class="row mb-1">
             <div class="col mb-3">
                 <button   type="submit" class="btn btn-lg btn-primary">SAVE</button>
        
            </div>
        </div>
       
    </form>


    <div class="table-responsive">
        <table id="cqaccount_table" class="table table-hover table-bordered mt-4">
        <thead class="thead-dark">
            <tr>               

                <th>Question ID</th>
                <th>Question Category</th>
                <th>Question Type</th> 
                <th>Question</th> 
                <th>Question Point/s</th>   
                <th>Question Duration/s</th>       
                <th>Added| Modified By</th>    
                <th>Date Modified</th>     
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
                <?php $__currentLoopData = $questionlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr id=<?php echo e($question->id); ?>>
                        
                        <td><?php echo e($question->id); ?></td>
                        <td><?php echo e($question->catename); ?></td>
                        <td><?php echo e($question->type); ?></td>
                        <td><?php echo e($question->questionString); ?></td>
                        <td><?php echo e($question->questionpoints); ?></td>
                        <td><?php echo e($question->questionduration); ?></td>
                        <td><?php echo e($question->username); ?></td>
                        <td><?php echo e($question->updated_at); ?></td>
                        <?php if($question->statusID =='1'): ?> 
                            <td>Active</td>
                        <?php else: ?>
                            <td>Inactive</td>        
                        <?php endif; ?>
                        <td><button  
                             wire:click="showquestiondata(<?php echo e($question->id); ?>)" 
                            id="<?php echo e($question->id); ?>" 
                            type="button" class="btn btn-primary edit-department" data-toggle="modal" 
                            data-target="#questionModal">Modify
                        </button></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </tbody> 
        </table>
    </div>





    
    <!-- Modal -->
  <div  wire:ignore.self class="modal fade show" id="questionModal" role="dialog">
    <div class="modal-dialog modal-lg" style="width: 80% !important; height: 80%">
      <div class="modal-content">

        <!-- Modal header-->
        <div class="modal-header">
          <h4 class="modal-title">Modify</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body-->  
        <div class="modal-body">    
            <form wire:submit.prevent ="updatequestion"   style="display:block">

                <?php if(session()->has('message1')): ?>
                <div class="alert alert-danger">
                    <?php echo e(session('message1')); ?>

                </div>
                <?php endif; ?>

                <?php if(session()->has('message')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('message')); ?>

                    </div>
                <?php endif; ?>
                        

                <div class="row mb-3">

                    <div class="col mb-3">
                        <label for="uCategory">Question Category:</label>
                        <select class="form-control "  wire:model ="uCategory" name="uCategory"  >
                            <?php $__currentLoopData = $categorylist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>                           
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="col mb-3">
                        <label for="uqtype">Question Type:</label>
                        <select class="form-control "  wire:model ="uqtype" name="uqtype" wire:change="uqtype">
                            <?php $__currentLoopData = $qTypelist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($type->id); ?>"><?php echo e($type->name); ?></option>                           
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col mb-3">
                        <label for="uqstatus">Status:</label>
                        <select class="form-control mb-2" wire:model ="uqstatus" >
                            <option value=1>Active</option>
                            <option value=2>Inactive</option>
                        </select>
                    </div>

                

                </div>

                <div class="row mb-3">
                    <div class="col mb-3">
                        <label for="uquestion">Question:</label>
                        <textarea class="form-control" type="text" wire:model ="uquestion" required  id="uquestion"></textarea>
                    </div>
                </div>
                <div class="border"> 
                   
                   

                    <?php $__currentLoopData = $uchoicelist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $choice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php ($tmpname = 'achoice'); ?>
                      <?php ($tmpname = $tmpname .$choice['index']); ?>
                        <div class="row mb-1">
                            <div class="col mb-1">                           

                                <label for="<?php echo e($tmpname); ?>"> Choice  <?php echo e($choice['index']); ?></label>
                                <input class="form-control" type="input"  wire:change="upchoicedata($event.target.value,<?php echo e($i); ?>)"  name="<?php echo e($tmpname); ?>" id="<?php echo e($tmpname); ?>"  value = "<?php echo e($choice['paramdata']); ?>" required></input>
                            </div>
                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                
                

               
                   
                    <div class="row mb-1">
                            <div class="col mb-1">
                                <button   wire:click="uddChoice"type="button" class="btn btn-lg btn-primary">Add Choices</button>
                            </div>
                            <div class="col mb-1">
                                <button   wire:click="uremoveChoice"type="button" class="btn btn-lg btn-primary">Remove Choices</button>
                            </div>
                    </div>
                </div>
                <div class="row mb-1">
                 

                        <?php if($uqtype == 1): ?>
                            <div class="col mb-3">
                                <label for="usAnswer">Answer:</label>
                                <select class="form-control " name="usAnswer" wire:model ="usAnswer">       
                                    <?php for($a = 1; $a <= $uqcount; $a++): ?>         
                                        <option value="<?php echo e($a); ?>"><?php echo e($a); ?></option>    
                                    <?php endfor; ?>       
                                </select>
                            </div>
                        <?php else: ?>

                            <div class="col mb-3">
                                <label for="umAnswer">Answer:</label>
                                <select class="form-control answers"   name="umAnswer[]"  multiple="multiple" wire:model ="umAnswer">                
                                    <?php for($a = 1; $a <= $uqcount; $a++): ?>         
                                        <option value="<?php echo e($a); ?>"><?php echo e($a); ?></option>    
                                    <?php endfor; ?>      
                                </select>
                            </div>

                        <?php endif; ?>
                        <div class="col mb-3">
                            <label for="uqpoints">Question Point/s:</label>
                            <input class="form-control" type="number" wire:model ="uqpoints" required name="uqpoints" id="uqpoints">
                        </div>

                        <div class="col mb-3">
                            <label for="uqduration">Question Duration/s:</label>
                            <input class="form-control" type="number" wire:model ="uqduration" required name="uqduration" id="uqduration">
                        </div>
                        <!-- <div class="col mb-3">
                            <label for="uqimage">Add image/s:</label>
                            <div class="pt-3">
                                <input class="custom-file-input" type="file"  wire:model ="uqimage"  id="uqimage" name="uqimage[]" data-show-caption="true" multiple>
                                <label class="custom-file-label" for="customFile" style="top:31px">Choose image file</label>
                            </div>
                        </div> -->

                
                </div>

                <div class="row mb-1">
                    <div class="col mb-3">
                        <button  type="submit" class="btn btn-lg btn-primary">SAVE</button>
                
                    </div>
                </div>
            
             </form>
            </div>

      </div>
    </div>
  </div>
    
 
</div>
<?php /**PATH C:\laragon\www\MandatoryComplianceTraining\resources\views/livewire/lw-qeustion-repo.blade.php ENDPATH**/ ?>
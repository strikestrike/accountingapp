<?php include 'sidebar1.php'; ?>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="list">
                        <div class="tab-content project-list-group" id="ListViewTabLink">

                            <div class="tab-pane fade" id="navpills-1">
                                <div class="project-main2">
                                    <span class="arrow-up-back"></span>
                                    <span class="arrow-up"></span>
                                    <div class="d-flex justify-content-between align-items-center">
                                        income tab
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade active show" id="navpills-2">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="project-main2">
                                            <span class="arrow-up-back"></span>
                                            <span class="arrow-up"></span>

                                            <div class="d-flex justify-content-between align-items-center">
                                                <a class="btn btn-primary text-nowrap" href="javascript:void(0)"> Annual Exchange Rate</a>
                                                <div>
                                                    <a class="btn btn-primary text-nowrap" href="javascript:void(0)"> view</a>
                                                    <a class="btn btn-primary text-nowrap" href="javascript:void(0)"> Edit</a>  
                                                    <button class="btn btn-danger text-nowrap" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#Annual_Exchange_Rate">+ Add</button>
                                                    
                                                </div>
                                            </div>
                                          <div class="table-responsive">
                                                <table class="table table-responsive-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>Value</th>  
                                                            <th>Year</th>
                                                    
                                                        </tr>
                                                    </thead> 
                                                    <tbody>
                                                         
                                                         <?php $i = 1; 
                                                                foreach($annual_exchange_rate as $list)
                                                                {    
                                                                   
                                                                ?>  
                                                        <tr>
                                                            <td> <?= $list['value']; ?></td>
                                                            <td> <?= $list['year'];  ?> </td>
                                                           
                                                        </tr>
                                                      
                                                          <?php  } ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a class="btn btn-primary text-nowrap" href="javascript:void(0)"> Minimum wage</a>
                                                <div>
                                                    <a class="btn btn-primary text-nowrap" href="javascript:void(0)"> view</a>
                                                    <a class="btn btn-primary text-nowrap" href="javascript:void(0)"> Edit</a>

                                            <a class="btn btn-danger text-nowrap" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#Minimum_wage">+ Add</a>
                                                </div>
                                            </div>
                                             <table class="table table-responsive-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>Value</th>  
                                                            <th>Year</th>
                                                    
                                                        </tr>
                                                    </thead> 
                                                      <tbody>
                                                         
                                                         <?php $i = 1; 
                                                                foreach($minimum_wage as $list)
                                                                {    
                                                                   
                                                                ?>  
                                                        <tr>
                                                            <td> <?= $list['value']; ?></td>
                                                            <td> <?= $list['year'];  ?> </td>
                                                           
                                                        </tr>
                                                      
                                                          <?php  } ?>

                                                    </tbody>
                                              </table>

                                            <div class="d-flex justify-content-between align-items-center">
                                                <a class="btn btn-primary text-nowrap" href="javascript:void(0)"> BNR Exchange rate</a>
                                                <div>
                                                    <a class="btn btn-primary text-nowrap" href="javascript:void(0)"> view</a>
                                                    <a class="btn btn-primary text-nowrap" href="javascript:void(0)"> Edit</a>
                                                 <a class="btn btn-danger text-nowrap" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#BNR_Exchange_rate">+ Add</a>
                                                </div>
                                            </div>
                                             <table class="table table-responsive-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>file</th>  
                                                            <th>Year</th>
                                                    
                                                        </tr>
                                                    </thead> 
                                                    <tbody>  
                                                         <?php $i = 1; 
                                                                foreach($BNR_xchange_rate as $list)
                                                                {    
                                                                   
                                                                ?>  
                                                        <tr>
                                                            <td> <?= $list['file']; ?></td>
                                                            <td> <?= $list['year'];  ?> </td>
                                                           
                                                        </tr>
                                                      
                                                          <?php  } ?>

                                                    </tbody>
                                                </table>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="navpills-3">
                                <div class="project-main2">
                                    <span class="arrow-up-back"></span>
                                    <span class="arrow-up"></span>
                                    <div class="d-flex justify-content-between align-items-center">
                                        information tab
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="navpills-4">
                                <div class="project-main2">
                                    <span class="arrow-up-back"></span>
                                    <span class="arrow-up"></span>
                                    <div class="d-flex justify-content-between align-items-center">
                                        doc release tab
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

           
    <!-- Annual Exchange Rate -->
 <div class="modal fade" id="Annual_Exchange_Rate">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Annual Exchange Rate</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>

                <div class="modal-body">
                    <form action="<?=base_url('home/system_configration')?>" method="POST">
                         <input type="hidden" name="type" value="annual_exchange_rate">

                        <div class="form-group">
                            <label class="text-black font-w500">Value <span style="color:red; font-size: 12px"> *</span></label>
                            <input type="text" name="value" class="form-control" required>
                               <span style="color:red; font-size: 12px"> <?php echo form_error('value'); ?></span>

                        </div>
                        <div class="form-group">
                            <label class="text-black font-w500">Year <span style="color:red; font-size: 12px"> *</span></label>
                             <input type="text" name="year" class="form-control" required>
                           <span style="color:red; font-size: 12px"> <?php echo form_error('year'); ?></span>
                        </div>
                        
                        <div class="form-group">
                            <button type="button" class=" btn btn-secondary pull-left" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">CREATE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 

      <!-- Edit Annual Exchange Rate -->
 <div class="modal fade" id="Edit_AnnualExchange_Rate">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Annual Exchange Rate</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>

                <div class="modal-body">
                    <form action="<?=base_url('home/system_configration')?>" method="POST">
                         <input type="hidden" name="type" value="Edit_AnnualExchange_Rateid">

                        <div class="form-group">
                            <label class="text-black font-w500">Value <span style="color:red; font-size: 12px"> *</span></label>
                            <input type="text" name="value" id="edit_value" class="form-control" required>
                               <span style="color:red; font-size: 12px"> <?php echo form_error('value'); ?></span>

                        </div>
                        <div class="form-group">
                            <label class="text-black font-w500">Year <span style="color:red; font-size: 12px"> *</span></label>
                             <input type="text" name="year" id="edit_year" class="form-control" required>
                           <span style="color:red; font-size: 12px"> <?php echo form_error('year'); ?></span>
                        </div>
                        
                        <div class="form-group">
                            <button type="button" class=" btn btn-secondary pull-left" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">CREATE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
 



    
    <!-- Minimum wage -->
     <div class="modal fade" id="Minimum_wage">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Minimum wage</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

                </div>
                <div class="modal-body">
                    <form action="<?=base_url('home/system_configration')?>" method="POST">
                         <input type="hidden" name="type" value="minimum_wage">
                        <div class="form-group">
                            <label class="text-black font-w500">Value<span style="color:red; font-size: 12px"> *</span></label>
                            <input type="text"  name="value" class="form-control" required>
                             <span style="color:red; font-size: 12px"> <?php echo form_error('value'); ?></span>

                        </div>
                        <div class="form-group">
                            <label class="text-black font-w500">Year<span style="color:red; font-size: 12px"> *</span></label>
                             <input type="text" name="year" class="form-control" required>
                              <span style="color:red; font-size: 12px"> <?php echo form_error('year'); ?></span>

                        </div>
                        
                        <div class="form-group">
                            <button type="button" class=" btn btn-secondary pull-left" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">CREATE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- BNR Exchange rate -->
     <div class="modal fade" id="BNR_Exchange_rate">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> BNR Exchange rate</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="<?=base_url('home/system_configration')?>" method="POST">
                        <input type="hidden"     name="type" value="BNR_xchange_rate">
                        <div class="form-group">
                            <label class="text-black font-w500">Value</label>
                            <input type="text" name="value" class="form-control" required>
                         </div>
                        <div class="form-group">
                            <label class="text-black font-w500">Load a xlsx file</label>
                             <input type="file" name="xlsx" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <button type="button" class=" btn btn-secondary pull-left" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">CREATE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
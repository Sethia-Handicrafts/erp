<?php 
$query=$leads->get_lead_one($_GET['id']);
?>
<table class=" table-bordered" width="100%">
									<tr>
										<th>Compnay</th>
										<td><?php echo $query[0]['company'];?></td>
									
										<th>Type</th>
										<td><?php echo $query[0]['company_type'];?></td>
									</tr>
									<tr>
										<th>Source</th>
										<td><?php $group=$leads->get_group_one($query[0]['group_id']);  echo $group[0]['gname']; ?></td>
									
										<th>Alloted To :</th>
										<td><?php $uname=$admin->getone_user($query[0]['handledby']); echo $uname[0]['uname']; ?></td>
									</tr>

									<tr>
										<th>Targetted Date:</th>
										<td><?php echo date('d-m-Y', strtotime($query[0]['targetted_date'])); ?></td>
									
										<th>Requirment</th>
										<td>
											<!-- <textarea class="form-control"></textarea> -->
										</td>
									</tr>
								</table>

<table class="table-bordered" cell-padding="10" width="100%;">
                                                <thead>
                                                <tr>
													<th>#</th>
													<th>Title</th>
													<th>Sub Title</th>
													<th>Category</th>
                                                    <th>Sub Category</th>
												</tr>
                                                </thead>				
												<?php
												$counter=1;
												$company_details_leads=$leads->get_leads_company_details($_GET['id']);
                                                if(!$company_details_leads)
                                                {
                                                    echo "<tr><td colspan='4'><div class='alert alert-info'>No Data Found</div></td></tr>";
                                                }
                                                else{
												foreach($company_details_leads as $r =>$v)
												{   
                                                    if(is_string($value2))
                                                    {$value2=$company_details_leads[$r]['value2'];}
                                                    else
                                                    {$value21=unserialize($company_details_leads[$r]['value2']);
                                                        foreach($value21 as $o)
                                                        {
                                                            $value2.=$o."<br>";
                                                        }
                                                    } 
                                                    
                                                    

													echo "<tr>";
														echo "<th>".$counter++."</th>";
														echo "<td>".$company_details_leads[$r]['details']."</td>";
														echo "<td>".$company_details_leads[$r]['value1']."</td>";
														echo "<td>".$value2."</td>";
                                                        echo "<td>";

                                                        $value3=$company_details_leads[$r]['value3'];
                                                        if(is_array($value3))
                                                        {
                                                            print_r($value3);
                                                        }
                                                        echo "</td>";
													echo "</tr>";
												}}
												?>
											</table>
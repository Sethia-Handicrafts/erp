<section class="content">
			<hr>
			<!--- form -->
			<div class="box">
                
						<div class="box-header with-border">
                            <h4>Company Research Info</h4>
                        </div>    


                        <table class="table table-bordered">
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
                                                    $value12=array();
                                                    if(!unserialize($company_details_leads[$r]['value2']) == true)
                                                    {$value2=$company_details_leads[$r]['value2'];}
                                                    else
                                                    {                                                        
                                                        $value21=unserialize($company_details_leads[$r]['value2']);
                                                        foreach($value21 as $o => $v)
                                                        {
                                                        $value12[]=$v."<br>"; 
                                                        }
                                                        $value2 = implode("<br>",$value12);
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

                    </div>
                </div>
                                           
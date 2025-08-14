<?php 
require_once ("DBController.php");

class Inventory {

private $db_handle;
   
    function __construct() {
        $this->db_handle = new DBController();
    }

    function successResponse($res)
    {
        $succResp = new stdClass();
        $succResp->success = true;
        $succResp->error = false;
        $succResp->response = $res;
        return $succResp;
    }

    function errorResponse($res)
    {
        $errorResp = new stdClass();
        $errorResp->success = false;
        $errorResp->error = true;
        $errorResp->response = $res;
        return $errorResp;
    }

    function add_group($group_name,$group_code,$desc)
    {
        $query = "insert into products_group (group_name,group_code,descs)VALUES(?,?,?)";
        $paramType = "sss";
        $paramValue = array($group_name,$group_code,$desc);
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }
    function tempsave($sku,$file,$name,$cat)
    {
        $query = "insert into products(sku,productname,cat)VALUES(?,?,?)";
        $paramType = "sss";
        $paramValue = array($sku,$name,$cat);
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);

        //-- get maxid and return
        $sql = "SELECT MAX(id) AS maxid FROM products";
        $result = $this->db_handle->runBaseQuery($sql);
        $maxid=$result[0]['maxid'];

        //-- create gallery row 
        $insert0 = "insert into products_gallery(pid,pic)Values('$maxid','$file')";
        $insert =$this->db_handle->update($insert0);

        return $maxid;
    }

    function getall_temp()
	{
		$sql = "SELECT * FROM temp_products ORDER BY id ASC";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
	}
	function save($group_name,$productname,$sku,$design_nu,$cat,$wcm,$dcm,$hcm,$winch,$dinch,$hinch,$logistics,$cbm,$desc,$material_all,$finish_all,$usd,$tags)
    {

        $usd = number_format((float)$usd, 2, '.', '');
        $query = "INSERT INTO products(group_name,productname,sku,design_nu,cat,wcm,dcm,hcm,winch,dinch,hinch,logistics,cbm,descs,material_all,finish_all,usd,tags)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $paramType = "ssssssssssssssssss";
        $paramValue = array($group_name,$productname,$sku,$design_nu,$cat,$wcm,$dcm,$hcm,$winch,$dinch,$hinch,$logistics,$cbm,$desc,$material_all,$finish_all,$usd,$tags);
        
        $this->db_handle->insert($query, $paramType, $paramValue);

        

        //-- get maxid and return
        $sql = "SELECT MAX(id) AS maxid FROM products";
        $result = $this->db_handle->runBaseQuery($sql);
        $maxid=$result[0]['maxid'];

        //-- create gallery row 
        $insert0 = "insert into products_gallery(pid)Values($maxid)";
        $insert =$this->db_handle->update($insert0);

        return $maxid;
    }

    function update($group_name,$productname,$sku,$design_nu,$cat,$wcm,$dcm,$hcm,$winch,$dinch,$hinch,$logistics,$cbm,$desc,$material_all,$finish_all,$usd,$tags,$pid)
    {
        $usd = number_format((float)$usd, 2, '.', '');
        $query = "update products SET group_name='$group_name',productname='$productname',sku='$sku',design_nu='$design_nu',cat='$cat',wcm='$wcm',dcm='$dcm',hcm='$hcm',winch='$winch',dinch='$dinch',hinch='$hinch',logistics='$logistics',cbm='$cbm',descs='$desc',material_all='$material_all',finish_all='$finish_all',usd='$usd',tags='$tags' where id='$pid' ";
        $insert =$this->db_handle->update($query);
        return $insert;
    }

    function save_gallery($id,$pic,$gallery_img)
    {
        $select="select * from products_gallery where pid='$id'";
        $select =$this->db_handle->runBaseQuery($select);
        if($select)
        {
            echo $update = "update products_gallery SET pic='$pic',gallery_img='$gallery_img' where pid='$id'";
            $update =$this->db_handle->update($update);
        }    
        else
        {
            echo $update = "insert into products_gallery (pic,gallery_img,pid)Values('$pic','$gallery_img','$id') ";
            $update =$this->db_handle->update($update);
        }

        return $insert;
    }
	
	function getall()
	{
		$sql = "SELECT * FROM products ORDER BY id ASC";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
	}

    function getall_group()
    {
        $sql = "SELECT * FROM products_group ORDER BY id ASC";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
	
	function delete($id)
	{
		$sql = "delete FROM products where id = $id ";
        
        $result = $this->db_handle->runSingleQuery($sql);
        return $result;
	}
	
	function getone($id)
	{
		$sql = "select *  FROM products where id = $id ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
	}

    function getone_gallery($id)
    {
         $sql = "select *  FROM products_gallery where pid = '$id' ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function getone_temp($id)
	{
		$sql = "select *  FROM temp_products where id = $id ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
	}
	
	function getone_product_accessories($id)
	{
		 $sql = "select * FROM product_accessories where pid = '$id' ";
        $result = $this->db_handle->runBaseQuery($sql);
        
        return $result;
	}

    function getone_product_details($id)
	{
		$sql = "select * FROM product_details where pid = '$id' ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
	}

    function getone_product_details_bymaterial($id,$material)
    {
        $sql = "select * FROM product_details where pid = '$id' AND material LIKE '%$material%'";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function getone_product_details_nomaterial($id)
    {
        $sql = "select * FROM product_details where pid = '$id' AND material NOT LIKE '%cartoon%' AND material NOT LIKE '%wood%' AND material NOT LIKE '%iron%' ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function getone_product_details_material($id,$material)
	{
		$sql = "select * FROM product_details where pid = '$id' AND material='$material' ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
	}

    function get_product_history($id)
    {
        $sql = "SELECT * FROM product_history ORDER BY id DESC ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function add_details($pid,$material,$clength,$cwidth,$cheight,$cbm,$weight_cartoon,$weight_plastic,$weight_wood,$weight_iron,$net_weight,$gross_weight)
    {
        $query = "INSERT INTO product_details(pid,material,clength,cwidth,cheight,cbm,weight_cartoon,weight_plastic,weight_wood,weight_iron,net_weight,gross_weight)VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
        $paramType = "isssssssssss";
        $paramValue = array($pid,$material,$clength,$cwidth,$cheight,$cbm,$weight_cartoon,$weight_plastic,$weight_wood,$weight_iron,$net_weight,$gross_weight);
        
        $this->db_handle->insert($query, $paramType, $paramValue);
    }
	
	
    
    function add_product_details($pid,$acce0,$qty0,$remark0)
    {
        $query = "INSERT INTO product_accessories(pid,acce,qty,remark)VALUES (?,?,?,?)";
        $paramType = "iiis";
        $paramValue = array($pid,$acce0,$qty0,$remark0);
        $this->db_handle->insert($query, $paramType, $paramValue);
    }

    function delete_accesories($id)
    {
        $query = "DELETE FROM product_accessories WHERE id = $id";
        $this->db_handle->update($query);
    }

    function delete_details($id)
    {
        $query = "DELETE FROM product_details WHERE id = $id";
        $this->db_handle->update($query);
    }

    function delete_product($id)
    {
        $query = "DELETE FROM products WHERE id = $id";
        $this->db_handle->update($query);
        
        $query0 = "DELETE FROM product_details WHERE pid = $id";
        $this->db_handle->update($query0);

        $query0 = "DELETE FROM product_accesories WHERE pid = $id";
        $this->db_handle->update($query0);

    }

    function update_cbm($pid)
    {
        $sum="select SUM(cbm) AS cbm_f from product_details where pid = '$pid' ";
        $sum=$this->db_handle->runBaseQuery($sum);
        $cbm_f=$sum[0]['cbm_f'];
        //-- update sum
        $update="update products SET gross_cbm='$cbm_f' where id='$pid' ";
        $update = $this->db_handle->update($update);
    	return $update;
    }

    //-- cat and subcatregory
    function get_products_cat()
    {
        $sql = "SELECT * FROM product_category ORDER BY cat ASC ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function get_category_one($id)
    {
         $sql = "SELECT * FROM product_category where id='$id' ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function get_category_all()
    {
        $sql = "SELECT DISTINCT(cat),id FROM product_category where cat NOT REGEXP '^[0-9]+$' ORDER BY cat ASC ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function get_subcategory_all($cat)
    {
        $sql = "SELECT * FROM product_category where cat='$cat' ORDER BY subcat ASC ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    

    function get_finish()
    {
        $sql = "SELECT * FROM products_finish ORDER BY id ASC ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function get_logistics()
    {
        $sql = "SELECT * FROM products_logistics ORDER BY id ASC ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }


    function get_packing()
    {
        $sql = "SELECT * FROM products_packing ORDER BY id ASC ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }


    function get_material_byid($id)
    {
        $sql = "SELECT * FROM products_material where id='$id' ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function get_material_bycapability($capability)
    {
        //-- get capability details
        $cap=$this->get_capability_byid($capability);
        $table_name = $cap[0]['table_name'];
        $query='';
        if($table_name=='products_material')
        {
            $col='id AS col1,material_name AS col2';
            $query="where capabilities='$capability' AND mid='0'";
        }
        if($table_name=='products_packing')
        {
            $col='id AS col1,packing_name AS col2';
        }
        if($table_name=='products_finish')
        {
            $col='id AS col1,finish_name AS col2';
        }
        if($table_name=='products_logistics')
        {
            $col='id AS col1,logistics_name AS col2';
        }
        if($table_name=='store_item')
        {
            $col='id AS col1,product_name AS col2';
        }

        $sql = "SELECT $col FROM $table_name  $query ORDER BY id ASC";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;

        // $sql = "SELECT * FROM products_material where capabilities='$capability' AND mid='0' ";
        // $result = $this->db_handle->runBaseQuery($sql);
        // return $result;
    }
    
    function get_material_bycapability_child($capability,$mid)
    {
        $sql = "SELECT * FROM products_material where capabilities='$capability' AND mid='$mid' ORDER BY id ASC";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result; 
        
    }
    function get_material_byname($name)
    {
        $sql = "SELECT * FROM products_material where material_name='$name' ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function get_material_bytype($type)
    {
        echo $sql = "SELECT * FROM products_material where material_type='$type' ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function get_finish_type($type)
    {
         $sql = "SELECT * FROM products_finish where finish_material='$type' ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function get_finish_byid($id)
    {
        $sql = "SELECT * FROM products_finish where id='$id' ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function get_partlist($pid)
    {
        $sql = "SELECT * FROM product_cuttinglist_items where pid='$pid' ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }


    //=============material master
    function add_material($mname,$mid,$mtype,$pic,$labuour_inr,$uom,$capability,$hsn)
    {
        $query = "INSERT INTO products_material(material_name,mid,material_type,pic,labour_inr,uom,capabilities,hsn)VALUES (?,?,?,?,?,?,?,?)";
        $paramType = "ssssssss";
        $paramValue = array($mname,$mid,$mtype,$pic,$labuour_inr,$uom,$capability,$hsn);
        $this->db_handle->insert($query, $paramType, $paramValue);
    }

    function add_finish($finish_name,$coating_system,$finish_material,$distressing,$inhouse,$labour_inr,$pic,$lead_free,$low_voc)
    {
        $query = "INSERT INTO products_finish(finish_name,coating_system,finish_material,distressing,inhouse,labour_inr,image,lead_free,low_voc)VALUES (?,?,?,?,?,?,?,?,?)";
        $paramType = "sssssssss";
        $paramValue = array($finish_name,$coating_system,$finish_material,$distressing,$inhouse,$labour_inr,$pic,$lead_free,$low_voc);
        $this->db_handle->insert($query, $paramType, $paramValue);
    }

    function add_logistics($logistics_name,$assembly_req,$no_of_case,$no_of_item)
    {
        $query = "INSERT INTO products_logistics(logistics_name,assembly_req,no_of_case,no_of_item)VALUES (?,?,?,?)";
        $paramType = "ssss";
        $paramValue = array($logistics_name,$assembly_req,$no_of_case,$no_of_item);
        $this->db_handle->insert($query, $paramType, $paramValue);
    }

    function add_packing($packing_name,$weight_category,$remark,$pic,$labour_inr,$uom)
    {
        $query = "INSERT INTO products_packing(packing_name,weight_category,remark,image,labour_inr,uom)VALUES (?,?,?,?,?,?)";
        $paramType = "ssssss";
        $paramValue = array($packing_name,$weight_category,$remark,$pic,$labour_inr,$uom);
        $this->db_handle->insert($query, $paramType, $paramValue);
    }

    function add_category($cat_name,$cat_code,$desc,$room)
    {
        $query = "INSERT INTO product_category(cat,cat_code,remark,room)VALUES (?,?,?,?)";
        $paramType = "ssss";
        $paramValue = array($cat_name,$cat_code,$desc,$room);
        $this->db_handle->insert($query, $paramType, $paramValue);
    }
    function get_material()
    {
        $sql = "SELECT * FROM products_material  ORDER BY material_name ASC ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function get_parent_material()
    {
        $sql = "SELECT * FROM products_material  where mid='0' ORDER BY material_name ASC ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function get_child_material($mid)
    {
        $sql = "SELECT * FROM products_material  where mid='$mid' ORDER BY material_name ASC ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }


    function get_material_sub($mid)
    {
        $sql = "SELECT * FROM products_material where mid = '$mid'";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function get_material_unique()
    {
        $sql = "SELECT DISTINCT(material_type) FROM products_material  ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    //--catalogue
    function get_catalogue($tags)
    {
        $sql = "SELECT * FROM products where tags LIKE '%$tags%'";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result; 
        
    }

    //-- capability
    function get_capability()
    {
        $sql = "SELECT * FROM products_capability ORDER BY id ASC";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result; 
        
    }

    
    function get_capability_byid($id)
    {
        $sql = "SELECT * FROM products_capability where id='$id' ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result; 
        
    }


    //---------------- api
    function wordpress_product_taglist()
    {
        $data=array();
        $data2=array();
        $query="select DISTINCT(tags) from products where tags != '' ";
        $result = $this->db_handle->runBaseQuery($query);
            if($result)
            {
                    foreach($result as $k=>$v)                
                    {
                        $returnObj = new stdClass();
                        $product_id = explode(",",$result[$k]['tags']);
                        foreach($product_id as $k1)
                        {
                            array_push($data, $k1);              
                        }                        
                    }
                    //-- grab the unique value from the array
                    $final_taglist = array_unique($data);
                    //-- add into the array of unique value
                    foreach($final_taglist as $k=>$v)
                    {
                        $returnObj = new stdClass();
                        $returnObj->tags = $v;   
                        array_push($data2, $returnObj);
                    }

                    $result1 = $this->successResponse($data2);
                    echo json_encode($result1);
            }     
            else
            {
                $returnObj = new stdClass();
                $returnObj->msg = "No Product Tags Found";   
                $result1 = $this->errorResponse($returnObj);
                echo json_encode($result1);
            }
    }
    function wordpress_product($key)
    {
        $data=array();
        $query="select * from products where tags LIKE '%$key%'";
        $result = $this->db_handle->runBaseQuery($query);
        if($result)
                        {
                            
                            foreach($result as $k=>$v)
                            {
                                $cat = $this->get_category_one($result[$k]['cat']);
                                $cat = $cat[0]['cat'];

                                $returnObj = new stdClass();
                                $returnObj->product_id = $result[$k]['id'];
                                $returnObj->product_name = $result[$k]['productname'];
                                $returnObj->description = $result[$k]['descs'];
                                $returnObj->sku = $result[$k]['sku'];
                                $returnObj->height_cm = $result[$k]['hcm'];
                                $returnObj->width_cm = $result[$k]['wcm'];
                                $returnObj->depth_cm = $result[$k]['dcm'];
                                $returnObj->height_inch = $result[$k]['hinch'];
                                $returnObj->width_inch = $result[$k]['winch'];
                                $returnObj->depth_inch = $result[$k]['dinch'];
                                $returnObj->tags = $result[$k]['tags'];
                                $returnObj->cat = $cat;

                                
                                //-- material
                                $material=$this->get_material_byid($result[$k]['material_all']);
                                $returnObj->material = $material[0]['material_name'];
                                //-finish
                                $finish=$this->get_finish_byid($result[$k]['finish_all']);
                                $returnObj->finish = $material[0]['finish_name'];
                                //-logistics
                                $returnObj->logistics = $material[0]['logistics'];

                                $gallery=$this->getone_gallery($result[$k]['id']);
                                //-- add url
                                $gallery_img0 = array();
                                $gallery_img = explode(",",$gallery[0]['gallery_img']);
                                //print_r($gallery_img);
                                if(!empty($gallery[0]['gallery_img']))
                                {
                                    foreach($gallery_img as $g=>$v)
                                    {
                                        $gallery_img0[] = 'https://sethiahandicrafts.in/images/'.$gallery_img[$g];
                                    }
                                    $gallery_img2=implode(",",$gallery_img0);
                                }
                                else
                                {$gallery_img2="";}
                                
                                
                                if(!empty($gallery[0]['pic']))
                                {$gallery_img1='https://sethiahandicrafts.in/images/'.$gallery[0]['pic'];} 
                                else 
                                {$gallery_img1="";}
                                

                                $returnObj->featured_image = $gallery_img1;
                                $returnObj->gallery_img = $gallery_img2;

                                array_push($data, $returnObj);
                                
                            }
                                $result1 = $this->successResponse($data);
                                echo json_encode($result1);
                                
                        }  
                        else
                        {
                            $returnObj = new stdClass();
                            $returnObj->msg = "No Product Found";   
                            $result1 = $this->errorResponse($returnObj);
                            echo json_encode($result1);
        
                        }
    }
    //------ wordpress api ends

    function get_nearby_pillar($cft_current,$mid)
    {
        $query="SELECT * FROM products_material2 where mid='$mid' ORDER BY ABS(cft - $cft_current) ASC LIMIT 1";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function get_pillar_one($id)
    {
        $query="SELECT * FROM products_material2 where id='$id' ";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function get_cft($l,$w,$h)
    {   
        //-- all are in mm so change this into inches and divide by 1728
        $l = $l/25.4;
        $w = $w/25.4;
        $h = $h/25.4;
        $all = $l*$w*$h;
        $item_cft = $all/1728;

        $item_cft = number_format((float)$item_cft, 2, '.', '');
        return $item_cft;
    }

    function get_cft2($l,$w,$h)
    {
        $one= ($l/25.4*$w/25.4)*2/144;
        $two= ($l/25.4*$h/25.4)*2/144;
        $three=($w/25.4*$h/25.4)*2/144;
        $all = $one+$two+$three;
        return $all;
    }

    //------ yield 
    function get_wood_yield($wood,$type,$value)
    {
        
        //.-- get wood name from products_material
        $mtype=$this->get_material_byid($wood);
        $mid=$mtype[0]['mid'];
        if($mid!='0')
        {
            //-- get parent mtype
            $pmtype=$this->get_material_byid($mid);
            $wood_main = $pmtype[0]['material_name'];
        }
        else
        {   $wood_main = $mtype[0]['material_name'];}

        // $number = $value;
        // $array  = array_map('intval', str_split($number));
                
        $number = $value;
        $formatted = sprintf('%04d', $number);
        //$wood_main = $wood_main.'%'.$value.'%';

    //    $query="SELECT *,
    //             (CASE WHEN SUBSTRING(wood_name, -4, 1) = '$array[0]' THEN 1 ELSE 0 END) +
    //             (CASE WHEN SUBSTRING(wood_name, -3, 1) = '$array[1]' THEN 1 ELSE 0 END) +
    //             (CASE WHEN SUBSTRING(wood_name, -2, 1) = '$array[2]' THEN 1 ELSE 0 END) +
    //             (CASE WHEN SUBSTRING(wood_name, -1, 1) = '$array[3]' THEN 1 ELSE 0 END) AS match_score
    //             FROM products_material_yield
    //             WHERE wood_name LIKE '$wood_main%' AND type = '$type'
    //             ORDER BY match_score DESC
    //             LIMIT 1";  

   
    //$query="select * from products_material_yield where wood_type = '$wood_main' AND type = '$type' AND  min_mm = $value OR max_mm < $value) LIMIT 1";
         $query="select * from products_material_yield where wood_type LIke '%$wood_main%' AND type = '$type' AND $value BETWEEN min_mm AND max_mm LIMIT 1";
//        $query="select * from products_material_yield where wood_name LIKE '$wood_main%'  AND type = '$type' ORDER BY ABS(min_mm - '$value') LIMIT 1";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function get_rm_group($woodid,$l,$w,$h)
    { 
        //-- get wood name from mis
        $mtype=$this->get_material_byid($woodid);
        $mname=$mtype[0]['material_name'];

        //-- get group
        $query="select * from products_material_group where specied='$mname' AND lft='$l' AND wmm='$w' AND hmm='$h' ";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function get_rm_rate($mname,$rate_group)
    {
        
        //-- get group price
        $query0="select * from products_material_group_rate where wood='$mname' AND rate_grp='$rate_group'";
        $result0 = $this->db_handle->runBaseQuery($query0);
        $rate_cft=floatval($result0[0]['rate_cft']);
        $extra=floatval($result0[0]['extra']);

        //-- calc
        if($rate_addon != '' OR $rate_addon != 'N')
        {
            $final_cft = $rate_cft+$extra;
        }
        else
        {
            $final_cft=$rate_cft;
        }

        return $final_cft;
    }

    function get_yield($material_name,$length,$width,$height,$cft,$qty)
    {
        $yield=$length*$width*$height*$qty;
        $yield=$yield/1000000000;
        $yield=$yield*35.314;
        
        if ($cft == 0.00) {
        return 0; // Or handle the scenario appropriately based on application logic
        }
        $yield=$yield/$cft;
        $yield=$yield*100;
        $yield=number_format((float)$yield, 2, '.', '').' %';
        return $yield;
    }

    function get_unit_kg_wood($woodname,$pillar_size_converted)
    {
        $stock_unit = $woodname.' '.$pillar_size_converted;
        $query="SELECT * FROM `products_material_group` WHERE stock_unit = '$stock_unit' "; 
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }
    
}
?>


<?php
    
################################################################################

## +---------------------------------------------------------------------------+
## | 1. Creating & Calling:                                                    | 

## +---------------------------------------------------------------------------+
##  *** define a relative (virtual) path to datagrid.class.php file and "pear" 
##  *** directory (relatively to the current file)
##  *** RELATIVE PATH ONLY ***
   define ("DATAGRID_DIR", "datagrid/");                    

  require_once(DATAGRID_DIR."datagrid.class.php");
    
##  *** creating variables that we need for database connection 
   $DB_USER="username";            

  $DB_PASS="password";            
  $DB_HOST="localhost";           

  $DB_NAME="database_name";       
 
  ob_start();
##  *** put a primary key on the first place 

   $sql = "SELECT
            demo_products.id,
            demo_products.name,

            demo_products.short_description,
            demo_products.long_description,
            demo_products.image_thumb,

            demo_products.image_big,
            demo_products.price,
            demo_products.available_from,

            demo_products.statistics,
            demo_suppliers.name as supplier_name
        FROM demo_products

            LEFT OUTER JOIN demo_suppliers ON demo_products.supplier_id = demo_suppliers.id ";
 
##  *** set needed options and create a new class instance 
   $debug_mode = false;        /* display SQL statements while processing */    

  $messaging = true;          /* display system messages on a screen */ 
  $unique_prefix = "prd_";    /* prevent overlays - must be started with a letter */

  $dgrid = new DataGrid($debug_mode, $messaging, $unique_prefix);

##  *** set encoding and collation (default: utf8/utf8_unicode
_ci)
   $dg_encoding = "utf8";
  $dg_collation = "utf8_unicode
_ci";

  $dgrid->SetEncoding($dg_encoding, $dg_collation);
##  *** set data source with needed options
  $default_order = array("demo_products.name"=>"ASC");

  $dgrid->DataSource("PDO", "mysql", $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS, $sql, $default_order);             

 
## +---------------------------------------------------------------------------+
## | 2. General Settings:                                                      | 

## +---------------------------------------------------------------------------+
##  *** allow multirow operations
   $multirow_option = true;
  $dgrid->AllowMultirowOperations($multirow_option);

  $multirow_operations = array(
        "delete"  => array("view"=>true),

        "details" => array("view"=>true),
  );

  $dgrid->SetMultirowOperations($multirow_operations);  
##  *** set CSS class for datagrid
##  *** "default" or "blue" or "gray" or "green" or "pink" or your own css file 

##  *** set DataGrid caption
   $dg_caption = "List of Mobile Phones";
  $dgrid->SetCaption($dg_caption);

 
## +---------------------------------------------------------------------------+
## | 3. Printing & Exporting Settings:                                         | 
## +---------------------------------------------------------------------------+
##  *** set printing option: true(default) or false 
   $printing_option = false;
  $dgrid->AllowPrinting($printing_option);

 
## +---------------------------------------------------------------------------+
## | 4. Sorting & Paging Settings:                                             | 

## +---------------------------------------------------------------------------+
##  *** set paging option: true(default) or false 
   $paging_option = true;
  $rows_numeration = false;

  $numeration_sign = "N #";       
  $dgrid->AllowPaging($paging_option, $rows_numeration, $numeration_sign);

##  *** set paging settings
   $bottom_paging = array("results"=>true, "results_align"=>"left", "pages"=>true, "pages_align"=>"center", "page_size"=>true, "page_size_align"=>"right");

  $top_paging = array();
  $pages_array = array("10"=>"10", "25"=>"25", "50"=>"50", "100"=>"100", "250"=>"250", "500"=>"500", "1000"=>"1000");

  $default_page_size = 10;
  $dgrid->SetPagingSettings($bottom_paging, $top_paging, $pages_array, $default_page_size);

 
## +---------------------------------------------------------------------------+
## | 5. Filter Settings:                                                       | 

## +---------------------------------------------------------------------------+
##  *** set filtering option: true or false(default)
   $filtering_option = true;
  $show_search_type = true;

  $dgrid->AllowFiltering($filtering_option, $show_search_type);
##  *** set additional filtering settings
##  *** tips: use "," (comma) if you want to make search by some words, for ex.: hello, bye, hi

   $filtering_fields = array(
    "Supplier"  => array("type"=>"enum", "order"=>"ASC", "table"=>"demo_suppliers", "field"=>"name", "source"=>"self", "show"=>"", "condition"=>"", "show_operator"=>"false", "default_operator"=>"=", "case_sensitive"=>"false", "comparison_type"=>"string", "width"=>"", "multiple"=>"false", "multiple_size"=>"4", "on_js_event"=>""),

    "From"      =>array("type"=>"calendar", "table"=>"demo_products", "field"=>"available_from", "field_type"=>"from", "show_operator"=>"false", "default_operator"=>">=", "case_sensitive"=>"false", "comparison_type"=>"string", "width"=>"", "on_js_event"=>""),

    "To"        =>array("type"=>"calendar", "table"=>"demo_products", "field"=>"available_from", "field_type"=>"to", "show_operator"=>"false", "default_operator"=>"<=", "case_sensitive"=>"false", "comparison_type"=>"string", "width"=>"", "on_js_event"=>""),

  );
  $dgrid->SetFieldsFiltering($filtering_fields);
 
## +---------------------------------------------------------------------------+
## | 6. View Mode Settings:                                                    | 

## +---------------------------------------------------------------------------+
##  *** set view mode table properties
   $vm_table_properties = array("width"=>"95%");

  $dgrid->SetViewModeTableProperties($vm_table_properties);  
##  *** set columns in view mode
##  *** Ex.: "on_js_event"=>"onclick="alert(\"Yes!!!\");""

##  ***      "barchart" : number format in SELECT SQL must be equal with number format in max_value
   $vm_colimns = array(
    "name"              => array("header"=>"Name", "type"=>"linktoedit",      "align"=>"left", "width"=>"", "wrap"=>"nowrap", "text_length"=>"-1", "tooltip"=>"false", "tooltip_type"=>"floating|simple", "case"=>"normal", "summarize"=>"false", "sort_type"=>"string", "sort_by"=>"", "visible"=>"true", "on_js_event"=>""),

    "image_thumb"       => array("header"=>"Image", "type"=>"image",  "align"=>"center", "width"=>"58x", "wrap"=>"nowrap", "text_length"=>"-1", "tooltip"=>"false", "tooltip_type"=>"floating|simple", "case"=>"normal|upper|lower|camel", "summarize"=>"false", "sort_type"=>"string|numeric", "sort_by"=>"", "visible"=>"true", "on_js_event"=>"", "target_path"=>"uploads/", "default"=>"default_image.ext", "image_width"=>"50px", "image_height"=>"30px", "magnify"=>"true", "magnify_type"=>"magnifier", "magnify_power"=>"3"),

    "supplier_name"     => array("header"=>"Supplier", "type"=>"linktoview",      "align"=>"center", "width"=>"", "wrap"=>"nowrap", "text_length"=>"-1", "tooltip"=>"false", "tooltip_type"=>"floating|simple", "case"=>"normal", "summarize"=>"false", "sort_type"=>"string", "sort_by"=>"", "visible"=>"true", "on_js_event"=>""),

    "short_description" => array("header"=>"Short Description", "type"=>"label",      "align"=>"left", "width"=>"120px", "wrap"=>"nowrap", "text_length"=>"12", "tooltip"=>"true", "tooltip_type"=>"simple", "case"=>"normal", "summarize"=>"false", "sort_type"=>"string", "sort_by"=>"", "visible"=>"true", "on_js_event"=>""),

    "price"             => array("header"=>"Price", "type"=>"money",      "align"=>"right", "width"=>"", "wrap"=>"nowrap", "text_length"=>"-1", "tooltip"=>"false", "tooltip_type"=>"floating|simple", "case"=>"normal|upper|lower|camel", "summarize"=>"true", "sort_type"=>"string|numeric", "sort_by"=>"", "visible"=>"true", "on_js_event"=>"", "sign"=>"$", "decimal_places"=>"2", "dec_separator"=>".", "thousands_separator"=>","),

    "available_from"    => array("header"=>"Available From", "type"=>"label",      "align"=>"center", "width"=>"", "wrap"=>"nowrap", "text_length"=>"-1", "tooltip"=>"false", "tooltip_type"=>"floating|simple", "case"=>"normal|upper|lower|camel", "summarize"=>"false", "sort_type"=>"string|numeric", "sort_by"=>"", "visible"=>"true", "on_js_event"=>"", "on_item_created"=>"my_format_date"),

    "statistics"        => array("header"=>"Sales %", "type"=>"barchart",   "align"=>"left", "width"=>"", "wrap"=>"nowrap", "text_length"=>"-1", "tooltip"=>"false", "tooltip_type"=>"floating|simple", "case"=>"normal|upper|lower|camel", "summarize"=>"false", "sort_type"=>"string|numeric", "sort_by"=>"", "visible"=>"true", "on_js_event"=>"", "field"=>"statistics", "maximum_value"=>"100"),

  );
  $dgrid->SetColumnsInViewMode($vm_colimns);
 
## +---------------------------------------------------------------------------+
## | 7. Add/Edit/Details Mode Settings:                                        | 

## +---------------------------------------------------------------------------+
##  *** set add/edit mode table properties
   $em_table_properties = array("width"=>"70%");

  $dgrid->SetEditModeTableProperties($em_table_properties);
##  *** set details mode table properties
   $dm_table_properties = array("width"=>"70%");

  $dgrid->SetDetailsModeTableProperties($dm_table_properties);
##  ***  set settings for add/edit/details modes
   $table_name  = "demo_products";

  $primary_key = "id";
  $condition   = "";
  $dgrid->SetTableEdit($table_name, $primary_key, $condition);

 
  $fill_from_array_sales = array();
  for($i=1; $i<100; $i++){

    $fill_from_array_sales[$i] = $i;
  }
 
  $fill_from_array_chargers = array("linear_regulator"=>"Linear Regulator", "switch_mode"=>"Switch Mode", "shunt_regulators"=>"Shunt Regulators", "pulsed_charging"=>"Pulsed Charging");

  $em_columns = array(
    "delimiter_0"   =>array("inner_html"=>"&lt;div style='padding:5px;'&gt;Textbox and dropdown list fields: They are basic fields for each DataGrid. Supplier is an example of Foreign Key with possibility to select value from dropdown list.&lt;/div&gt;"),

    "name"          =>array("header"=>"Product Name", "type"=>"textbox",    "req_type"=>"rt", "width"=>"210px", "title"=>"", "readonly"=>"false", "maxlength"=>"-1", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>""),

    "supplier_id"   =>array("header"=>"Supplier", "type"=>"foreign_key","req_type"=>"ri", "width"=>"210px", "title"=>"", "readonly"=>"false", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true"),

    "charger_types" =>array("header"=>"Charger Types", "type"=>"enum",  "req_type"=>"st", "width"=>"210px", "title"=>"", "readonly"=>false, "maxlength"=>"-1", "default"=>"", "unique"=>false, "unique_condition"=>"", "visible"=>"true", "on_js_event"=>"", "source"=>$fill_from_array_chargers, "view_type"=>"checkbox", "elements_alignment"=>"horizontal|vertical", "multiple"=>true, "multiple_size"=>"5"),

    
    "delimiter_1"   =>array("inner_html"=>"&lt;div style='padding:5px;'&gt;Image fields: These are image fields. You can click on each picture to enlarge. Uploading or deleting of images is blocked in Demo version.&lt;/div&gt;"),

    "image_thumb"   =>array("header"=>"Thumbnail", "type"=>"image",      "req_type"=>"st", "width"=>"220px", "title"=>"", "readonly"=>"false", "maxlength"=>"-1", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>"", "target_path"=>"uploads/", "max_file_size"=>"200K", "image_width"=>"120px", "image_height"=>"90px", "magnify"=>"true", "magnify_type"=>"lightbox", "file_name"=>"img_".((isset($_GET["prd_mode"]) && ($_GET["prd_mode"] == "add")) ? $dgrid->GetRandomString("10") : $dgrid->GetCurrentId()), "host"=>"local", "pre_addition"=>"Click on image to enlarge...&lt;br&gt;"),

    "image_big"     =>array("header"=>"Big Image", "type"=>"image",      "req_type"=>"st", "width"=>"220px", "title"=>"", "readonly"=>"false", "maxlength"=>"-1", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>"", "target_path"=>"uploads/", "max_file_size"=>"500K", "image_width"=>"240px", "image_height"=>"180px", "magnify"=>"true", "magnify_type"=>"lightbox", "file_name"=>"img_".((isset($_GET["prd_mode"]) && ($_GET["prd_mode"] == "add")) ? $dgrid->GetRandomString("10") : $dgrid->GetCurrentId()), "host"=>"local", "pre_addition"=>"Click on image to enlarge...&lt;br&gt;"),

    
    "delimiter_2"   =>array("inner_html"=>"&lt;div style='padding:5px;'&gt;Teaxtarea fields: There are 2 types of textarea fields. First is a "simple", with draggable bar at the bottom to resizing. Second - is a WYSIWYG Editor. In WYSIWYG Editor you can easy edit and format the text. WYSIWYG implies a user interface that allows the user to view something very similar to the end result while the document is being created.&lt;/div&gt;"),

    "short_description"  =>array("header"=>"Short Description", "type"=>"textarea",   "req_type"=>"rt", "width"=>"500px", "title"=>"", "readonly"=>"false", "maxlength"=>"255", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>"", "edit_type"=>"simple", "resizable"=>"true", "rows"=>"5", "cols"=>"50"),

    "long_description"   =>array("header"=>"Long Description", "type"=>"textarea",   "req_type"=>"rt", "width"=>"500px", "title"=>"", "readonly"=>"false", "maxlength"=>"1024", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>"", "edit_type"=>"wysiwyg", "resizable"=>"false", "rows"=>"7", "cols"=>"50"),

 
    "delimiter_3"   =>array("inner_html"=>"&lt;div style='padding:5px;'&gt;Date/Time fields: There are 2 types of date/time fields: floating calendar and dropdown list calendar.&lt;/div&gt;"),
    "available_from"  =>array("header"=>"Available From", "type"=>"datetime",   "req_type"=>"st", "width"=>"187px", "title"=>"", "readonly"=>"false", "maxlength"=>"-1", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>"", "calendar_type"=>"dropdownlist"),

    "date_added"    =>array("header"=>"Date Added", "type"=>"label",      "req_type"=>"rt", "width"=>"210px", "title"=>"", "readonly"=>"false", "maxlength"=>"-1", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>""),

    "last_updated"  =>array("header"=>"Last Updated", "type"=>"datetime",   "req_type"=>"st", "width"=>"187px", "title"=>"", "readonly"=>"false", "maxlength"=>"-1", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>"", "calendar_type"=>"floating"),

    
    "delimiter_4"   =>array("inner_html"=>"&lt;div style='padding:5px;'&gt;Other fields: Money, checkbox, predefined dropdown list (enum) and radio buttons.&lt;/div&gt;"),

    "price"         =>array("header"=>"Price", "type"=>"textbox",    "req_type"=>"rf", "width"=>"90px", "title"=>"", "readonly"=>"false", "maxlength"=>"12", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>"", "pre_addition"=>"$"),

    "statistics"    =>array("header"=>"Sales in %", "type"=>"enum",       "req_type"=>"rf", "width"=>"210px", "title"=>"", "readonly"=>"false", "maxlength"=>"-1", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>"", "source"=>$fill_from_array_sales, "view_type"=>"dropdownlist", "elements_alignment"=>"horizontal|vertical", "multiple"=>"false", "multiple_size"=>"4"),

    "subscribe"     =>array("header"=>"Subscribe for news?", "type"=>"checkbox",   "req_type"=>"st", "width"=>"210px", "title"=>"", "readonly"=>"false", "maxlength"=>"-1", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>"", "true_value"=>1, "false_value"=>0),

    "is_featured"   =>array("header"=>"Is Featured", "type"=>"enum",       "req_type"=>"st", "width"=>"210px", "title"=>"", "readonly"=>"false", "maxlength"=>"-1", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>"", "source"=>"self", "view_type"=>"radiobutton", "elements_alignment"=>"horizontal", "multiple"=>"false", "multiple_size"=>"4"),

  );
  $dgrid->SetColumnsInEditMode($em_columns);
##  *** set auto-generated columns in edit mode
   $auto_column_in_edit_mode = false;

  $dgrid->SetAutoColumnsInEditMode($auto_column_in_edit_mode);
##  *** set foreign keys for add/edit/details modes (if there are linked tables)
   $foreign_keys = array(

    "supplier_id"=>array("table"=>"demo_suppliers", "field_key"=>"id", "field_name"=>"name", "view_type"=>"dropdownlist", "elements_alignment"=>"horizontal|vertical", "condition"=>"", "order_by_field"=>"name", "order_type"=>"ASC", "on_js_event"=>""),

  ); 
  $dgrid->SetForeignKeysEdit($foreign_keys);
 
## +---------------------------------------------------------------------------+
## | 8. Bind the DataGrid:                                                     | 

## +---------------------------------------------------------------------------+
##  *** bind the DataGrid and draw it on the screen
   $dgrid->Bind();        
  ob_end_flush();

 
################################################################################   
 
function my_format_date($last_login_time){
    $last_login = @mktime(substr($last_login_time, 11, 2), substr($last_login_time, 14, 2),

                        substr($last_login_time, 17, 2), substr($last_login_time, 5, 2),

                        substr($last_login_time, 8, 2), substr($last_login_time, 0, 4));

    if($last_login_time != ""){
        return @date("M d, Y g:i A", $last_login);

    }else return "";
}
 
?>
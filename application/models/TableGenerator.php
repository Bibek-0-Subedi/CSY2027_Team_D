<?php
    //table generator class definition
    class TableGenerator extends CI_Model{
        public $tableHead= [];
        public $dataRow = [];
        public function setHeadings($tableHeading){
            $this->tableHead = $tableHeading; 
        }
        public function addRow($row){
            $this->dataRow[] = $row;  
        }

        public function getHTML(){
            $table = '<table class="table table-sm table-bordered table-hover"><thead>';
            foreach($this->tableHead as $tableHeading){ 
                $table .= '<th>' . $tableHeading . '</th>';
            }
            $table .= '</thead>';
            foreach($this->dataRow as $row){
                $table .= '<tr>';
                foreach($row as $key=>$value){
                    if(is_string($key)){
                        $table .= '<td>' . $value.'</td>';
                    }
                }
                $table .= '</tr>'; 
            }
            $table .= '</table>';
            return $table;
        }
    }

?>
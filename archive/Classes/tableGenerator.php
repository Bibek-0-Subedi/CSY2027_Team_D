<?php
    //table generator class definition
    class TableGenerator{
        public $tableHead= [];
        public $dataRow = [];
        public function SetHeadings($tableHeading){
            $this->tableHead = $tableHeading; 
        }
        public function addRow($row){
            $this->dataRow[] = $row;  
        }

        public function getHTML(){
            $table = '<table class="table table-sm table-bordered table-hover"><tr>';
            foreach($this->tableHead as $tableHeading){ 
                $table .= '<th>' . $tableHeading . '</th>';
            }
            $table .= '</tr>';
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


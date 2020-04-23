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

        public function edit($id) {
        return '</td><td><a href="edit/'.$id.'">Edit</a><br>

        <a href="delete/'.$id.'">Delete</a>';
        }

        public function getHTML(){
            $table = '<table class="table table-sm table-hover"><thead class="thead-light">';
            foreach($this->tableHead as $tableHeading){ 
                $table .= '<th>' . $tableHeading . '</th>';
            }
            $table .= '</thead>';
            foreach($this->dataRow as $row){
                $table .= '<tr>';
                foreach($row as $key=>$value){
                    if(($key == 'assigned_id') && empty($value)){
                        $value = '<a href="casefile/'.$row["admission_id"].'">Create Id</a>';
                    }

                    
                   if(($key == 'grade') && empty($value) || ($value == 'Not Graded') || ($value == 'A') || ($value == 'B') ||($value == 'C')){
                            $value = $value . '<br><a href="grade/'.$row["assignment_id"].'">Grade</a>';
                        }

                    if($this->router->fetch_class() == 'assignment' && $this->router->fetch_method() == 'index' || $key == 'created_date'){
                    
                            $value .= $this->edit($row['assignment_id']); 
                    }
                    
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
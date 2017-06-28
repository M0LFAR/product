<?php
namespace  view\widget;

class Table
{
    private $head=[];
    private $rows=[];
    private $fields=[];



    public function __construct(array $fields){
        $this->fields = $fields;
    }

    public function field(array $params){


        if (isset($params['label']))
            array_push($this->head, $params['label']);
        else
            throw new \Exception('Не коректно передані дані для віджета');


        $params=is_array($params['key'])?$params['key']:$params;
        foreach ($this->fields as $id=>$field) {
            $this->rows[$id][] = $this->inRow($params, $id);
        }
    }


    private function inRow($arrayPars,$idFields){
        if(is_array($arrayPars[0])) { //якщо дочірні елементи є масивами
            $value='';
                foreach ($arrayPars as $parsRowArray)
                    $value.= $this->inRow($parsRowArray,$idFields);
        }else{
                $value = $this->fields[$idFields][$arrayPars['key']];

                if (isset($arrayPars['value'])) {

                    $value = preg_replace('/{{key}}/', $value, $arrayPars['value']);
                }
        }
        return $value;
    }

    public function echo(){
        $head = '';
        $elementsRow ='';

        foreach ($this->head as $str)
        {
            $head.= "<th>$str</th>";
        }

        foreach ($this->rows as $row) {
            $valueRow = "";

            foreach ($row as $str) {
                $valueRow .= "<td>".$str."</td>";

            }
            $elementsRow.="<tr>".$valueRow."</tr>";
            unset($valueRow);
        }

        echo  '<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                              <thead>
                       <tr>'
                            .$head.'
                        </tr>
                     </thead>
                                <tbody>
                                <tr class="odd gradeX">
                                '.$elementsRow.'
                                </tr>
                                </tbody>
                            </table>';

        unset($this);
    }

}

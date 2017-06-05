<?php
namespace  view\widget;

class Table
{
    private $head=[];
    private $row=[];
    private $typeField=['title', 'button', 'href'];

    public function field(array $params){

        $params['head'];
        $params['type'];
        $params['icon'];

        if (isset($params['label']))
            array_push($this->head, $params['label']);
        else
            throw new \Exception('Не коректно передані дані для віджета');

       // var_dump($params['value'], $params['label']);

        if(in_array($params['type'], $this->typeField) && isset($params['value'])){

            $i=0;
            foreach ( $params['value'] as $val) {

                array_push($this->row[$i], [[$params['type'] =>$val]]);
                $i++;
            }

        }
        else{
            array_push($this->row, ['title' => $params['value']]);
        }
    }


    public function echo(){
        $head='';
        $element ='';

        foreach ($this->head as $str)
        {
            $head.= "<th>$str</th>";
        }

        foreach ($this->row as $id=>$field)
        {
            foreach ($field as $type=>$values){

                switch ($type){
                    case 'title':{
                        foreach ($values as $val){
                            $element.= '<td class="center">'. $val.' </td>';
                            }
                        break;
                    }
                    case 'href':{
                        $element.= '<a href=""><i class="'.$val['icon'].'" aria-hidden="true"></i>'.$val['value'].'</a>';
                        break;
                    }
                }
            }
        }


        echo  '<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                              <thead>
                       <tr>'
                            .$head.'
                        </tr>
                     </thead>
                                <tbody>
                                <tr class="odd gradeX">
                                '.$element.'
                                </tr>
                                </tbody>
                            </table>';

        unset($this);
    }

}
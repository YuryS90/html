<?php

namespace TexLab\Html;

class Table extends AbstractTag
{
    protected $tableData;
    protected $headers;

    public function setHeaders(array $headers)
    {
        $str = "<tr>\n";

        foreach ($headers as $value) {
            $str .= "\t<th>$value</th>\n";
        }

        $this->headers = $str . "</tr>\n";

        return $this;
    }

    public function data(array $data)
    {
        $str = "";

        foreach ($data as $row) {
            $str .= "<tr>\n";
            foreach ($row as $cell) {
                $str .= "\t<td>$cell</td>\n";
            }
            $str .= "</tr>\n";
        }

        $this->tableData = $str;
        return $this;
    }

    public function html()
    {
        return "<table$this->style$this->class>\n$this->headers$this->tableData</table>\n";
    }
}

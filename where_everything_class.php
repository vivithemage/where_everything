<?php
    // This class takes a search string, breaks it apart and searches every single word. It's an extension to the where to you can tack it on
    // e.g. $query = "select * from small_table where ".$obj->where_extension." limit 1";
    // author: rs@mage.me.uk

    class where_everywhere {
        var $search_value;
        var $search_fields;
        var $where_extension;

        function build_single_where($term_array, $field) {
            $clause_seg = $field.' in (';
            foreach($term_array as $term) {
                $clause_seg .= "'$term', ";
            }
            $clause_seg = rtrim($clause_seg, ', ');
            $clause_seg .= ') ';
            return $clause_seg;
        }

        function where_clause() {
            $term_array = explode(' ', $this->search_value);
            $field_array = explode(' ', $this->search_fields);
            $this->where_extension = '';

            $last_field = end($field_array);
            foreach ($field_array as $field) {
                $this->where_extension .= $this->build_single_where($term_array, $field);

                if ($field != $last_field) {
                    $this->where_extension .= ' or ';
                }
            }
        }
    }

?>

<?php

    class persona extends CI_Model{
        public function agregar($persona){
            $this->db->insert('persona',$persona);
        }

        public function seleccionar_todo()  {
            $this->db->select('*');
            $this->db->from('persona');
            return $this->db->get()->result();
        }

        public function eliminar($ci_persona) {
            $this->db->where('ci',$ci_persona);
            $this->db->delete('persona');
        }

        public function actualizar($persona, $ci_persona) {
            $this->db->where('ci',$ci_persona);
            $this->db->update('persona',$persona);
        }
    }



?>
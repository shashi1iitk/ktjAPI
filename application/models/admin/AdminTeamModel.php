<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AdminTeamModel extends CI_Model
{
    public function get($eventid)
    {
        $q = "SELECT captain, member1, member2, member3, member4, member5, teamid
                FROM event_team
                WHERE event_team.eventid = $eventid";
        $query = $this->db->query($q);
        $res = [];
        foreach ($query->result_array() as $key => $value) {
            $members = array(
                $this->UserModel->getmemid($value['captain']),
                $this->UserModel->getmemid($value['member1']),
                $this->UserModel->getmemid($value['member2']),
                $this->UserModel->getmemid($value['member3']),
                $this->UserModel->getmemid($value['member4']),
                $this->UserModel->getmemid($value['member5']),
            );
            $membermail = array(
                $this->UserModel->getmemberid($value['captain']),
                $this->UserModel->getmemberid($value['member1']),
                $this->UserModel->getmemberid($value['member2']),
                $this->UserModel->getmemberid($value['member3']),
                $this->UserModel->getmemberid($value['member4']),
                $this->UserModel->getmemberid($value['member5']),
            );

            $val = array(
                'teamid' => $value['teamid'],
                'members' => $members,
                'memmail' => $membermail
            );
            array_push($res, $val);
        }
        return $res;
    }

    public function delete($teamid)
    {
        $q = "DELETE FROM event_team
                WHERE teamid = '$teamid'";
        $query = $this->db->query($q);
        return true;
    }
}

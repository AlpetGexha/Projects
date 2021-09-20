<?php
class InsertData extends DB
{
    public function InsertData($Titulli, $Body, $Tags)
    {
        $sql = "INSERT into post(postTitle,postBody,postTags) 
                        VALUE(?,?,?)";
        $stml = $this->openDB()->prepare($sql);
        $stml->execute([$Titulli, $Body, $Tags]);

        return true;
    }
}

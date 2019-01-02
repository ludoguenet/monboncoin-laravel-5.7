<?php

function getUserName($user_id)
{
    $user = Monboncoin\User::find($user_id);
    return $user->name;
}


<?php

function cekPermission($permission_name)
{
    if(auth()->user()->getPermissions($permission_name) || auth()->user()->getRoleNames()->first() === 'Admin'){
        return true;
    }else{
        return false;
    }
}

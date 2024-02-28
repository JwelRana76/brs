<?php

use App\Models\Permission;
use App\Models\RoleHasPermission;
use App\Models\SiteSetting;
use App\Models\UserHasRole;

function setting()
{
  return SiteSetting::findOrFail(1);
}
function userHasPermission($permission)
{


  $user = Auth()->user()->id;
  $role = UserHasRole::where('user_id', $user)->first();

  $permission = Permission::where('name', $permission)->first();
  if ($permission && $role) {
    $valide = RoleHasPermission::where(['role_id' => $role->role_id, 'permission_id' => $permission->id])->first();
    if ($valide) {
      return true;
    } else {
      return false;
    }
  } else {
    return false;
  }
}
function hasNotPermission()
{
  return view('not_permitted');
}
function convertToBangla($englishNumber)
{
  $banglaDigits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
  $banglaNumber = '';

  // Iterate through each character of the English number
  for ($i = 0; $i < strlen($englishNumber); $i++) {
    // Check if the character is a digit
    if (is_numeric($englishNumber[$i])) {
      // Convert the English digit to Bangla digit
      $banglaNumber .= $banglaDigits[$englishNumber[$i]];
    } else {
      // If the character is not a digit, keep it unchanged
      $banglaNumber .= $englishNumber[$i];
    }
  }

  return $banglaNumber;
}

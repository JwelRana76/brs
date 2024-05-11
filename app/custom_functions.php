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
function convertToBangla($total_land) {
  // Define the Bengali numbers
  $banglaNumbers = array(
      '0' => '০',
      '1' => '১',
      '2' => '২',
      '3' => '৩',
      '4' => '৪',
      '5' => '৫',
      '6' => '৬',
      '7' => '৭',
      '8' => '৮',
      '9' => '৯'
  );

  // Check if the input already contains Bangla digits
  $containsBanglaDigits = preg_match('/[\x{09E6}-\x{09EF}]/u', $total_land);

  // If not, convert it to string
  if (!$containsBanglaDigits) {
      $total_land = strval($total_land);
  }

  // Convert each digit of the number to Bengali
  $bangla_land = '';
  $length = strlen($total_land);
  for ($i = 0; $i < $length; $i++) {
      $digit = $total_land[$i];
      // If the input already contains Bangla digits, no need to convert
      if ($containsBanglaDigits) {
          $bangla_land .= $digit;
      } else {
          $bangla_land .= isset($banglaNumbers[$digit]) ? $banglaNumbers[$digit] : $digit;
      }
  }

  return $bangla_land;
}
function banglaToEnglishNumber($banglaNumber)
{
  $banglaDigits = array(
    '০' => '0', '১' => '1', '২' => '2', '৩' => '3', '৪' => '4',
    '৫' => '5', '৬' => '6', '৭' => '7', '৮' => '8', '৯' => '9'
  );

  return strtr($banglaNumber, $banglaDigits);
}

function convertintoBangla($number) {
  $banglaNumbers = array(
    '0' => 'শুন্য',
    '1' => 'এক',
    '2' => 'দুই',
    '3' => 'তিন',
    '4' => 'চার',
    '5' => 'পাঁচ',
    '6' => 'ছয়',
    '7' => 'সাত',
    '8' => 'আট',
    '9' => 'নয়',
    '10' => 'দশ',
    '11' => 'এগারো',
    '12' => 'বারো',
    '13' => 'তেরো',
    '14' => 'চৌদ্দ',
    '15' => 'পনের',
    '16' => 'ষোল',
    '17' => 'সতের',
    '18' => 'আঠার',
    '19' => 'উনিশ',
    '20' => 'বিশ',
    '21' => 'একুশ',
    '22' => 'বাইশ',
    '23' => 'তেইশ',
    '24' => 'চব্বিশ',
    '25' => 'পঁচিশ',
    '26' => 'ছাব্বিশ',
    '27' => 'সাতাশ',
    '28' => 'আটাশ',
    '29' => 'ঊনত্রিশ',
    '30' => 'ত্রিশ',
    '40' => 'চল্লিশ',
    '50' => 'পঞ্চাশ',
    '60' => 'ষাট',
    '70' => 'সত্তর',
    '80' => 'আশি',
    '90' => 'নব্বই',
    '100' => 'একশ',
    '200' => 'দুইশ',
    '300' => 'তিনশ',
    '400' => 'চারশ',
    '500' => 'পাঁচশ',
    '600' => 'ছয়শ',
    '700' => 'সাতশ',
    '800' => 'আটশ',
    '900' => 'নয়শ',
    '1000' => 'হাজার'
);

// If the number is in the predefined array, return its Bengali equivalent
if (isset($banglaNumbers[$number])) {
    return $banglaNumbers[$number];
}

// If the number is greater than 1000, return 'অধিক'
if ($number > 1000) {
    return 'অধিক';
}

// Convert each digit of the number to Bengali
$banglaText = '';
$numberString = strval($number);
$length = strlen($numberString);
for ($i = 0; $i < $length; $i++) {
    $digit = $numberString[$i];
    if ($digit !== '0') {
        if ($length - $i == 2 && $digit == '1') { // For tens place with '1'
            $nextDigit = $numberString[$i + 1];
            $banglaText .= $banglaNumbers[$digit.$nextDigit];
            break; // Break the loop since we handled two digits together
        } else {
            $placeValue = pow(10, $length - $i - 1);
            $banglaText .= $banglaNumbers[$digit * $placeValue] . ' ';
        }
    }
}

return $banglaText;
}
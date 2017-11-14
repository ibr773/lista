<?php
echo "خب ديييييي صاير نغل وجاي طلع الملف ههههههاي";
ob_start();
$token = "التوكن";
define("API_KEY", $token);
function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}
}
$update = json_decode(file_get_contents("php://input"));
$msg = $update->message;
$text = $msg->text;
$chat_id = $msg->chat->id;
$from_id = $msg->from->id;
$new = $msg->new_chat_members;
$message_id = $msg->message_id;
//ميثود القناة
$fwd_id = $msg->forward_from_chat->id;
$post = $update->channel_post;
$post_id = $post->chat->id;
$post_msg_id = $post->message_id;
$post_user = "@".$post->chat->username;
$post_title = $post->chat->title;
$res = explode("\n", $text);
$setch = file_get_contents("setch.json");
$ch = explode("\n", file_get_contents("channels.json"));
$add_ok = json_decode(file_get_contents("http://api.telegram.org/bot".$token."/getChatAdministrators?chat_id=$text"))->ok;
$users_ok = json_decode(file_get_contents("http://api.telegram.org/bot".$token."/getChatMemberscount?chat_id=$text"))->result;
$json = json_decode(file_get_contents("http://api.telegram.org/bot".$token."/getChat?chat_id=$text"))->result;
$add_ok1 = json_decode(file_get_contents("http://api.telegram.org/bot".$token."/getChatAdministrators?chat_id=".$res[1]))->ok;
$users_ok1 = json_decode(file_get_contents("http://api.telegram.org/bot".$token."/getChatMemberscount?chat_id=".$res[1]))->result;
$json1 = json_decode(file_get_contents("http://api.telegram.org/bot".$token."/getChat?chat_id=".$res[1]))->result;
$ch_user1 = $json1->username; 
$ch_user = $json->username; 
$ch_name1 = $json1->title;  
$ch_name = $json->title;  
$ch_id1 = $json1->id; 
$ch_id = $json->id; 
// بعض تعديلات للحقوق
$dev = ""; //يوزر صاحب الدعم بدون @
$devname = ""; // اسم صاحب الدعم هنا
//بدة الكود
mkdir("idmsg");
include "settings.php";
$inch = file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=@$setch&user_id=".$from_id);
if(strpos($inch , '"status":"left"') !== false ){
bot('sendMessage',[
'chat_id'=>$chat_id,
'parse_mode'=>'Markdown',
'text'=>"
عذراً البوت لم يعمل اذا لم تشترك في قناة البوت
اشترك في قناة البوت وارجع ارسل امر /start
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[[['text'=>'قناة البوت', 'url'=>"https://telegram.me/$setch"]],]])]);}
function message($chat_id, $text, $message_id){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>$text,
'reply_to_message_id'=>$message_id,
]);
}
function msgmark($chat_id, $text){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$text, 
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]);}
function action($chat_id, $action){
bot('sendchataction',[
'chat_id'=>$chat_id,
'action'=>$action]);}

// قسم السته
$list = json_encode([
"inline_keyboard"=>[
[["text"=>"$ch[1]", "url"=>"https://t.me/$ch[2]"]],
[["text"=>"$ch[3]", "url"=>"https://t.me/$ch[4]"]],
[["text"=>"$ch[5]", "url"=>"https://t.me/$ch[6]"]],
[["text"=>"$ch[7]", "url"=>"https://t.me/$ch[8]"]],
[["text"=>"$ch[9]", "url"=>"https://t.me/$ch[10]"]],
[["text"=>"$ch[11]", "url"=>"https://t.me/$ch[12]"]],
[["text"=>"$ch[13]", "url"=>"https://t.me/$ch[14]"]],
[["text"=>"$ch[15]", "url"=>"https://t.me/$ch[16]"]],
[["text"=>"$ch[17]", "url"=>"https://t.me/$ch[18]"]],
[["text"=>"$ch[19]", "url"=>"https://t.me/$ch[20]"]],
[["text"=>"$ch[21]", "url"=>"https://t.me/$ch[22]"]],
[["text"=>"$ch[23]", "url"=>"https://t.me/$ch[24]"]],
[["text"=>"$ch[25]", "url"=>"https://t.me/$ch[26]"]],
[["text"=>"$ch[27]", "url"=>"https://t.me/$ch[28]"]],
[["text"=>"$ch[29]", "url"=>"https://t.me/$ch[30]"]],
[["text"=>"$ch[31]", "url"=>"https://t.me/$ch[32]"]],
[["text"=>"$ch[33]", "url"=>"https://t.me/$ch[34]"]],
[["text"=>"$ch[35]", "url"=>"https://t.me/$ch[36]"]],
[["text"=>"$ch[37]", "url"=>"https://t.me/$ch[38]"]],
[["text"=>"$ch[39]", "url"=>"https://t.me/$ch[40]"]],
[["text"=>"$ch[41]", "url"=>"https://t.me/$ch[42]"]],
[["text"=>"$ch[43]", "url"=>"https://t.me/$ch[44]"]],
[["text"=>"$ch[45]", "url"=>"https://t.me/$ch[46]"]],
[["text"=>"$ch[47]", "url"=>"https://t.me/$ch[48]"]],
[["text"=>"$ch[49]", "url"=>"https://t.me/$ch[50]"]],
[["text"=>"$ch[51]", "url"=>"https://t.me/$ch[52]"]],
[["text"=>"$ch[53]", "url"=>"https://t.me/$ch[54]"]],
[["text"=>"$ch[55]", "url"=>"https://t.me/$ch[56]"]],
[["text"=>"$ch[57]", "url"=>"https://t.me/$ch[58]"]],
[["text"=>"$ch[59]", "url"=>"https://t.me/$ch[60]"]],
[["text"=>"$ch[61]", "url"=>"https://t.me/$ch[62]"]],
[["text"=>"$ch[63]", "url"=>"https://t.me/$ch[64]"]],
[["text"=>"$ch[65]", "url"=>"https://t.me/$ch[66]"]],
[["text"=>"$ch[67]", "url"=>"https://t.me/$ch[68]"]],
[["text"=>"$ch[69]", "url"=>"https://t.me/$ch[70]"]],
[["text"=>"$ch[71]", "url"=>"https://t.me/$ch[72]"]],
[["text"=>"$ch[73]", "url"=>"https://t.me/$ch[74]"]],
[["text"=>"$ch[75]", "url"=>"https://t.me/$ch[76]"]],
[["text"=>"$ch[77]", "url"=>"https://t.me/$ch[78]"]],
[["text"=>"$ch[79]", "url"=>"https://t.me/$ch[80]"]],
[["text"=>"$ch[81]", "url"=>"https://t.me/$ch[82]"]],
[["text"=>"$ch[83]", "url"=>"https://t.me/$ch[84]"]],
[["text"=>"$ch[85]", "url"=>"https://t.me/$ch[86]"]],
[["text"=>"$ch[87]", "url"=>"https://t.me/$ch[88]"]],
[["text"=>"$ch[89]", "url"=>"https://t.me/$ch[90]"]],
[["text"=>"$ch[91]", "url"=>"https://t.me/$ch[92]"]],
[["text"=>"$ch[93]", "url"=>"https://t.me/$ch[94]"]],
[["text"=>"$ch[95]", "url"=>"https://t.me/$ch[96]"]],
[["text"=>"$ch[97]", "url"=>"https://t.me/$ch[98]"]],
[["text"=>"$ch[99]", "url"=>"https://t.me/$ch[100]"]],
]]);

//الترحيب
if($text == "/start" and !strpos($inch , '"status":"left"') !== false){
if(in_array($from_id, $sudo)){
msgmark($chat_id, "
`- اهلا بك انت مدير البوت عزيزي 😻🎩 •`
`- اليك اوامر الان يمكنك استخدامه ☑️ •`
ֆ • • • • • • • • • • • • • • • • • • • • • • ֆ
🔰¦ /send • `نشر الستة`
🔰¦ /send user • `نشر الستة بـ قناة معينه`
🔰¦ /bcall • `نشر خبر ع قنوات`
🔰¦ /frde on • `تفعيل نشر بتوجيه`
🔰¦ /frde off • `تعطيل نشر بتوجيه`
🔰¦ /frde true • `تفعيل النشر لنك`
🔰¦ /frde false • `تعطيل النشر لنك`
🔰¦ /bc = user = text • `نشر تنبيه`
🔰¦ /delete • `مسح السته`
🔰¦ /test • `نشر تجريبي`
ֆ • • • • • • • • • • • • • • • • • • • • • • ֆ
`- اوامر الخاصه بك ك مدير 💓 •`
ֆ • • • • • • • • • • • • • • • • • • • • • • ֆ
🔰¦ /res • `فحص القنوات المشاركة`
🔰¦ /set text • `اضافة كليشة للسته`
🔰¦ /okusers 500 = 1000 • `اضافة عدد استقبال`
🔰¦ /setch user • `اضافة قناة تعلمات`
🔰¦ /addch user • `اضافة قناة بسبب المخالفه`
🔰¦ /addsudo id • `رفع ادمن في البوت`
🔰¦ /remsudo id • `تنزيل ادمن من البوت`
🔰¦ /ban user • `حظر قناة من البوت`
🔰¦ /unban user • `الغاء حظر قناة من البوت`
🔰¦ /true • `تفعيل المسح من المخالفه`
🔰¦ /false • `تعطيل المسح من المخالفه`
🔰¦ /on • `تفعيل التحذير من المخالفه`
🔰¦ /off • `تعطيل التحذير من المخالفه`
🔰¦ /del • `مسح الملفات الزايده`
ֆ • • • • • • • • • • • • • • • • • • • • • • ֆ
`- يمكنك بعد جلب اي رسالة من القناة وسيتم حذفه من القناة تلقائين 👾 •`", $message_id);
}else
msgmark($chat_id, "
- اهلا بكم في بوت لستة المتطور 🎩 •
- للاشتراك يجب قناتك لا تقل عن $users+ 😻 •
- اذا تريد الاشترك فقط ارسل معرف القناة 🔰 •
- البوت يقوم بتوجيه بما يلزم ☑️ •
- اذا كنت مشترك قديم ما عليك غير رفع البوت ادمن فقط وسيرجع اضافتك في الدعم ✨ •
- اي استفسار راسل المبرمج > [$devname](t.me/$dev) 👾 •
", $message_id);
}

//استقبال التلقائي
if(preg_match('/^(@)(.*)/s', $text) and $users_ok <= $users and !strpos($inch , '"status":"left"') !== false){
message($chat_id, "- عذرا عزيزي لا يمكنك الاشتراك في الستة ☹️💓  •\n- عدد قناتك قليل للاسف الشديد 💔 •", $message_id);
}
if(preg_match('/^(@)(.*)/s', $text) and $users_ok >= $users and $add_ok != 1 and !strpos($inch , '"status":"left"') !== false){
message($chat_id, "- عزيزي ارفع البوت ادمن ثمة ارجع اشترك 🌝💋 •", $message_id);
}
if(preg_match('/^(@)(.*)/s', $text) and $users_ok >= $users and $add_ok == 1 and !strpos($inch , '"status":"left"') !== false){
message($chat_id, "- ارسل المنشور الان الذي سارسله لك 😻🌸 •", $message_id);
action($chat_id, "typing");
sleep(1);
message($chat_id, "$ch_name\n@$ch_user", $message_id);
}
if(preg_match('/^(.*)\n(@)(.*)/s', $text) and !in_array($ch_id1, $ids) and !in_array($ch_id1, $ban) and $ch_name1 == $res[0] and $users_ok1 >= $users and $add_ok1 == 1 and !strpos($inch , '"status":"left"') !== false){
file_put_contents('settings.php', '$ids[]= "'.$ch_id1.'";'."\n", FILE_APPEND);
message($chat_id, "- تم اشتراكك عزيزي في الستة 😻💓 •\n- انتضر الان وقت الدعم 🌹 •", $message_id);
}
if(preg_match('/^(.*)\n(@)(.*)/s', $text) and in_array($ch_id1, $ids) and !in_array($ch_id1, $ban) and $ch_name1 == $res[0] and $users_ok1 >= $users and $add_ok1 == 1 and !strpos($inch , '"status":"left"') !== false){
message($chat_id, "- القناة مشاركة في الدعم عزيزي ☑️ •", $message_id);
}
if(preg_match('/^(.*)\n(@)(.*)/s', $text) and !in_array($ch_id1, $ids) and in_array($ch_id1, $ban) and $ch_name1 == $res[0] and $users_ok1 >= $users and $add_ok1 == 1 and !strpos($inch , '"status":"left"') !== false){
message($chat_id, "- عذراً عزيزي قناتك محضورة بسبب المخالفه 💓 •\n- راسل مطور البوت : @kasper_dev 👾 •", $message_id);
}
if(preg_match('/^(.*)\n(@)(.*)/s', $text) and $ch_name1 != $res[0] and $users_ok1 >= $users and $add_ok1 == 1 and !strpos($inch , '"status":"left"') !== false){
message($chat_id, "- لا يمكنك تغير اسم القناة 📡 •\n- ارسل الي رسالة الذي البوت ارسله لك عزيزي 💡•", $message_id);
}

//اضافة قناة بسبب المخالفه
if(preg_match('/^\/(addch) (.*)/', $text, $ch_add) and in_array($from_id, $sudo) and !strpos($inch , '"status":"left"') !== false){
$json = json_decode(file_get_contents("http://api.telegram.org/bot".API_KEY."/getChat?chat_id=".$ch_add[2]))->result->id;
file_put_contents('settings.php', '$ids[]= "'.$json.'";'."\n", FILE_APPEND);
message($chat_id, "- تم اضافة القناة $ch_add[2] بنجاح ☑️ •", $message_id);
}

//وضع عدد استقبال
if(preg_match('/^\/(okusers) (.*) = (.*)/', $text, $us) and in_array($from_id, $sudo)){
$i = file_get_contents("settings.php");
$i = str_replace('$users = "'.$us[2].'"', '$users = "'.$us[3].'"', $i);
$i = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $i);
file_put_contents('settings.php', $i);
message($chat_id, "- تم وضع استقبال القنوات $us[3]+ 👾 •", $message_id);
}

//نشر السته
if(preg_match('/^\/(send)/', $text) and in_array($from_id, $sudo)){
$x = file_get_contents("post.json");
$xx = $x + 1;
file_put_contents("post.json", $xx);
$i = file_get_contents("settings.php");
$i = str_replace('$idmsg = "true";', '$idmsg = "false";', $i);
$i = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $i);
file_put_contents('settings.php', $i);
for($h=0;$h<count($ids);$h++){
bot('sendmessage',[
'chat_id'=>$ids[$h],
'text'=>file_get_contents("wic.json") or "test edit /set text",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
'reply_markup'=>$list
]);}
message($chat_id, "- تم نشر الستة عزيزي 🔰 •", $message_id);
}

//نشر الفردي بتوجيه
if($text != "/frde true" and $text != "/frde false" and $link == "true" and in_array($from_id, $sudo)){
$x = file_get_contents("post.json");
$xx = $x + 1;
file_put_contents("post.json", $xx);
for($h=0;$h<count($ids);$h++){
bot("sendmessage",[
"chat_id"=>$ids[$h],
"text"=>"$text",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]);
}}

//نشر لنكات
if($text != "/frde on" and $text != "/frde off" and $fwd == "true" and in_array($from_id, $sudo)){
$x = file_get_contents("post.json");
$xx = $x + 1;
file_put_contents("post.json", $xx);
for($h=0;$h<count($ids);$h++){
bot('forwardMessage',[
'chat_id'=>$get[$h],
'from_chat_id'=>$chat_id,
'message_id'=>$fwd_id or $message_id,]);
}}

//نشر تجريبي
if(preg_match('/^\/(test)/', $text) and in_array($from_id, $sudo)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>file_get_contents("wic.json") or "test edit /set text",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
'reply_markup'=>$list
]);}

//اضافة كليشة السته
$h = explode(" ", $text);
$p = explode("/set", $text);
if($h[0] == "/set" and in_array($from_id, $sudo)){
file_put_contents("wic.json", $p[1]);
message($chat_id, "- تم تضبط رسالة الاشتراك 🎩 •\n- اصبحت الان هاكذا ↙️ •\n\n$p[1]", $message_id);
}
//نشر لسته ببكان معين
if(preg_match('/^\/(send) = (.*)/', $text, $chat) and in_array($from_id, $sudo)){
bot('sendmessage',[
'chat_id'=>$chat[2],
'text'=>file_get_contents("wic.json") or "test edit /set text",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
'reply_markup'=>$list
]);}

//كليشة انتهاء
if(preg_match('/^\/(delete)/', $text) and in_array($from_id, $sudo)){
$i = file_get_contents("settings.php");
$i = str_replace('$idmsg = "false";', '$idmsg = "true";', $i);
$i = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $i);
file_put_contents('settings.php', $i);
$files = scandir('idmsg');
$x = file_get_contents("post.json");
for ($i=0;$i<count($files);$i++){ 
$chid = trim($files[$i],'.txt');
$msgid = file_get_contents("idmsg/$files[$i]");
$aa = $msgid + $x;
for($h=$aa;$h>=$aa-$x;$h--){
bot('deleteMessage',[
'chat_id'=>"$chid",
'message_id'=>"$h",
]);
if($h == count($files)){
message($chat_id, "ع وشك الانتهاء 🎩...");
}}}
file_put_contents("post.json", "0");
message($chat_id, "- تم مسح السته ☑️ •", $message_id);
}

// مسح الملفات الزايده
if($text == "/del" and in_array($from_id, $sudo)){
$files = scandir('idmsg');
$count = count($files);
message($chat_id, "يوجد ($count) ملف زايد جاري مسح 🗑...", $message_id);
for($n=0;$n<$count;$n++){ 
unlink("idmsg/$files[$n]");
}
message($chat_id, "تم مسح الكل بنجاح🔋", $message_id);
}
//نشر ع جميع خبر
if(preg_match('/^\/(bcall) = (.*)/', $text, $bcall) and in_array($from_id, $sudo)){
for($h=0;$h<count($ids);$h++){
msgmark($ids[$h], "$bcall[2]");
}
message($chat_id, "- تم نشر رسالتك ع جميع 🎩 •", $message_id);
}

// كود ان اضافة قناة الم تشترك لم يعمل البوت
$setchannels = explode("/setch", $text);
if($setchannels[0] == "/setch" and in_array($from_id, $sudo)){
file_put_contents("setch.json", $setchannels[1]);
message($chat_id, "- تم اضافة قناة للتعليمات معرف القناة > $setchannels[1] 🌹•", $message_id);
}

//رفع ادمن وحذف ادمن
if(preg_match('/^\/(addsudo) (.*)/', $text, $addsu) and in_array($from_id, $sudo)){
file_put_contents('settings.php', '$sudo[]= "'.$addsu[2].'";'."\n", FILE_APPEND);
message($chat_id, "- تم اضافة ادمن جديد > $addsudo[2] 🌹•", $message_id);
}
if(preg_match('/^\/(remsudo) (.*)/', $text, $remsu) and in_array($from_id, $sudo)){
$i = file_get_contents("settings.php");
$i = str_replace('$sudo[]= "'.$remsu[2].'";', ' ', $i);
$i = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $i);
file_put_contents('settings.php', $i);
message($chat_id, "- تم حذف ادمن > $remsu[2] 🌹•", $message_id);
}

//ارسال تحذير للمخالف
if(preg_match('/^\/(bc) = (.*) = (.*)/', $text, $bc) and in_array($from_id, $sudo)){
$json = json_decode(file_get_contents("http://api.telegram.org/bot".API_KEY."/getChat?chat_id=".$bc[2]))->result->id;
msgmark($json, "$bc[3]");
message($chat_id, "- تم ارسال رسالتك الى $bc[2] بنجاح ☑️ •", $message_id);
}

//اوامر التنبيه
if(preg_match('/^\/(true)/', $text) and $dele == "false" and in_array($from_id, $sudo)){
$i = file_get_contents("settings.php");
$i = str_replace('$dele = "false"', '$dele = "true"', $i);
$i = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $i);
file_put_contents('settings.php', $i);
message($chat_id, "- تم تفعيل وضع مسح المخالفه ☑️ •", $message_id);
}
if(preg_match('/^\/(false)/', $text) and $dele == "true" and in_array($from_id, $sudo)){
$i = file_get_contents("settings.php");
$i = str_replace('$dele = "true"', '$dele = "false"', $i);
$i = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $i);
file_put_contents('settings.php', $i);
message($chat_id, "- تم تعطيل وضع مسح المخالفه ☑️ •", $message_id);
}
if(preg_match('/^\/(on)/', $text) and $error == "false" and in_array($from_id, $sudo)){
$i = file_get_contents("settings.php");
$i = str_replace('$error = "false"', '$error = "true"', $i);
$i = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $i);
file_put_contents('settings.php', $i);
message($chat_id, "- تم تفعيل وضع تحذير المخالفه ☑️ •", $message_id);
}
if(preg_match('/^\/(off)/', $text) and $error == "true" and in_array($from_id, $sudo)){
$i = file_get_contents("settings.php");
$i = str_replace('$error = "true"', '$error = "false"', $i);
$i = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $i);
file_put_contents('settings.php', $i);
message($chat_id, "- تم تعطيل وضع تحذير المخالفه ☑️ •", $message_id);
}
if(preg_match('/^\/(frde on)/', $text) and $fwd == "false" and in_array($from_id, $sudo)){
$i = file_get_contents("settings.php");
$i = str_replace('$fwd = "false"', '$fwd = "true"', $i);
$i = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $i);
file_put_contents('settings.php', $i);
message($chat_id, "- تم تفعيل وضع نشر بتوجيه 🎩 •", $message_id);
}
if(preg_match('/^\/(frde off)/', $text) and $fwd == "true" and in_array($from_id, $sudo)){
$i = file_get_contents("settings.php");
$i = str_replace('$fwd = "true"', '$fwd = "false"', $i);
$i = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $i);
file_put_contents('settings.php', $i);
message($chat_id, "- تم تعطيل وضع نشر بتوجيه 🎩 •", $message_id);
}
if(preg_match('/^\/(frde true)/', $text) and $link == "false" and in_array($from_id, $sudo)){
$i = file_get_contents("settings.php");
$i = str_replace('$link = "false"', '$link = "true"', $i);
$i = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $i);
file_put_contents('settings.php', $i);
message($chat_id, "- تم تفعيل وضع نشر 🎩 •", $message_id);
}
if(preg_match('/^\/(frde false)/', $text) and $link == "true" and in_array($from_id, $sudo)){
$i = file_get_contents("settings.php");
$i = str_replace('$link = "true"', '$link = "false"', $i);
$i = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $i);
file_put_contents('settings.php', $i);
message($chat_id, "- تم تعطيل وضع نشر 🎩 •", $message_id);
}

//تنبيه المخالفه
if($post and $error == "true"){
message($sudo, "- انتباه عزيزي هاذه القناة خالفة السته ⚠️ •\n- اسم القناة🔰• $post_title •\n- معرف القناة Ⓜ️ • $post_user •\n- ايدي القناة 🆔 • $post_id •", $message_id);
}

//حذف من القنوات بتوجيه
if($msg->forward_from_chat and in_array($from_id, $sudo)){
bot('deleteMessage',[
'chat_id'=>$msg->forward_from_chat->id,
'message_id'=>$msg->forward_from_message_id,
]);
message($chat_id, "- وقد تم مسح المنشور 🎩 •", $message_id);
}

//كود المسح عند النشر 
if($post and $dele == "true"){
bot('deletemessage',[
'chat_id'=>$post_id,
'message_id'=>$post_msg_id,
]);
}

//كود حفض ايديات
if($post and $idmsg == "true"){
$post = $update->channel_post;
$post_msg_id1 = $post->message_id+1;
file_put_contents("idmsg/$post_user.txt", "$post_msg_id1");
}

// فحص القنوات
if(preg_match('/^\/(res)/', $text) and in_array($from_id, $sudo)){
message($chat_id, "- جاري فحص القنوات الذي سيتم تثبيته...⏳ •", $message_id);
file_put_contents('channels.json', " ");
for($h=0;$h<count($ids);$h++){
$ok = json_decode(file_get_contents("http://api.telegram.org/bot".API_KEY."/getChatAdministrators?chat_id=$ids[$h]"))->ok;
if($ok == 1){
$json = json_decode(file_get_contents("http://api.telegram.org/bot".API_KEY."/getChat?chat_id=$ids[$h]"))->result;
$user = $json->username; 
$name = $json->title;  
file_put_contents('channels.json', "\n$name\n$user", FILE_APPEND);
if($h == count($ids)){
message($chat_id, "ع وشك الانتهاء 🎩...");
break;
}}}
file_put_contents('channels.json', "\nكل ما يخص البرمجة\ndev_kasper", FILE_APPEND);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- تم حذف جميع القنوات المخالفة ☑️ •",
]);
}

//حظر قناة
if(preg_match('/^\/(ban) (.*)/', $text, $add) and in_array($from_id, $sudo)){
$json = json_decode(file_get_contents("http://api.telegram.org/bot".API_KEY."/getChat?chat_id=".$add[2]))->result->id;
$i = file_get_contents("settings.php");
$i = str_replace('$ids[]= "'.$json.'";', '$ban[]= "'.$json.'";', $i);
$i = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $i);
file_put_contents('settings.php', $i);
message($chat_id, "- تم حظر القناة الان عزيزي 🎩 •", $message_id);
}
//الغاء حظر قناة
if(preg_match('/^\/(unban) (.*)/', $text, $unadd) and in_array($from_id, $sudo)){
$json = json_decode(file_get_contents("http://api.telegram.org/bot".API_KEY."/getChat?chat_id=".$unadd[2]))->result->id;
$i = file_get_contents("settings.php");
$i = str_replace('$ban[]= "'.$json.'";', '$ids[]= "'.$json.'";', $i);
$i = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $i);
file_put_contents('settings.php', $i);
message($chat_id, "- تم رفع حظر القناة الان عزيزي 🎩 •", $message_id);
}
?>

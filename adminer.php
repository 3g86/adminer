<?php
/** Adminer - Compact database management
* @link https://www.adminer.org/
* @author Jakub Vrana, https://www.vrana.cz/
* @copyright 2007 Jakub Vrana
* @license https://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
* @version 4.7.7
*/error_reporting(6135);$Zc=!preg_match('~^(unsafe_raw)?$~',ini_get("filter.default"));if($Zc||ini_get("filter.default_flags")){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$X){$Li=filter_input_array(constant("INPUT$X"),FILTER_UNSAFE_RAW);if($Li)$$X=$Li;}}if(function_exists("mb_internal_encoding"))mb_internal_encoding("8bit");function
connection(){global$h;return$h;}function
adminer(){global$b;return$b;}function
version(){global$ia;return$ia;}function
idf_unescape($u){$se=substr($u,-1);return
str_replace($se.$se,$se,substr($u,1,-1));}function
escape_string($X){return
substr(q($X),1,-1);}function
number($X){return
preg_replace('~[^0-9]+~','',$X);}function
number_type(){return'((?<!o)int(?!er)|numeric|real|float|double|decimal|money)';}function
remove_slashes($vg,$Zc=false){if(get_magic_quotes_gpc()){while(list($y,$X)=each($vg)){foreach($X
as$he=>$W){unset($vg[$y][$he]);if(is_array($W)){$vg[$y][stripslashes($he)]=$W;$vg[]=&$vg[$y][stripslashes($he)];}else$vg[$y][stripslashes($he)]=($Zc?$W:stripslashes($W));}}}}function
bracket_escape($u,$Pa=false){static$xi=array(':'=>':1',']'=>':2','['=>':3','"'=>':4');return
strtr($u,($Pa?array_flip($xi):$xi));}function
min_version($dj,$Ge="",$i=null){global$h;if(!$i)$i=$h;$qh=$i->server_info;if($Ge&&preg_match('~([\d.]+)-MariaDB~',$qh,$A)){$qh=$A[1];$dj=$Ge;}return(version_compare($qh,$dj)>=0);}function
charset($h){return(min_version("5.5.3",0,$h)?"utf8mb4":"utf8");}function
script($Ah,$wi="\n"){return"<script".nonce().">$Ah</script>$wi";}function
script_src($Qi){return"<script src='".h($Qi)."'".nonce()."></script>\n";}function
nonce(){return' nonce="'.get_nonce().'"';}function
target_blank(){return' target="_blank" rel="noreferrer noopener"';}function
h($P){return
str_replace("\0","&#0;",htmlspecialchars($P,ENT_QUOTES,'utf-8'));}function
nl_br($P){return
str_replace("\n","<br>",$P);}function
checkbox($B,$Y,$gb,$oe="",$xf="",$lb="",$pe=""){$H="<input type='checkbox' name='$B' value='".h($Y)."'".($gb?" checked":"").($pe?" aria-labelledby='$pe'":"").">".($xf?script("qsl('input').onclick = function () { $xf };",""):"");return($oe!=""||$lb?"<label".($lb?" class='$lb'":"").">$H".h($oe)."</label>":$H);}function
optionlist($Cf,$kh=null,$Vi=false){$H="";foreach($Cf
as$he=>$W){$Df=array($he=>$W);if(is_array($W)){$H.='<optgroup label="'.h($he).'">';$Df=$W;}foreach($Df
as$y=>$X)$H.='<option'.($Vi||is_string($y)?' value="'.h($y).'"':'').(($Vi||is_string($y)?(string)$y:$X)===$kh?' selected':'').'>'.h($X);if(is_array($W))$H.='</optgroup>';}return$H;}function
html_select($B,$Cf,$Y="",$wf=true,$pe=""){if($wf)return"<select name='".h($B)."'".($pe?" aria-labelledby='$pe'":"").">".optionlist($Cf,$Y)."</select>".(is_string($wf)?script("qsl('select').onchange = function () { $wf };",""):"");$H="";foreach($Cf
as$y=>$X)$H.="<label><input type='radio' name='".h($B)."' value='".h($y)."'".($y==$Y?" checked":"").">".h($X)."</label>";return$H;}function
select_input($Ka,$Cf,$Y="",$wf="",$hg=""){$bi=($Cf?"select":"input");return"<$bi$Ka".($Cf?"><option value=''>$hg".optionlist($Cf,$Y,true)."</select>":" size='10' value='".h($Y)."' placeholder='$hg'>").($wf?script("qsl('$bi').onchange = $wf;",""):"");}function
confirm($Qe="",$lh="qsl('input')"){return
script("$lh.onclick = function () { return confirm('".($Qe?js_escape($Qe):lang(0))."'); };","");}function
print_fieldset($t,$xe,$gj=false){echo"<fieldset><legend>","<a href='#fieldset-$t'>$xe</a>",script("qsl('a').onclick = partial(toggle, 'fieldset-$t');",""),"</legend>","<div id='fieldset-$t'".($gj?"":" class='hidden'").">\n";}function
bold($Xa,$lb=""){return($Xa?" class='active $lb'":($lb?" class='$lb'":""));}function
odd($H=' class="odd"'){static$s=0;if(!$H)$s=-1;return($s++%2?$H:'');}function
js_escape($P){return
addcslashes($P,"\r\n'\\/");}function
json_row($y,$X=null){static$ad=true;if($ad)echo"{";if($y!=""){echo($ad?"":",")."\n\t\"".addcslashes($y,"\r\n\t\"\\/").'": '.($X!==null?'"'.addcslashes($X,"\r\n\"\\/").'"':'null');$ad=false;}else{echo"\n}\n";$ad=true;}}function
ini_bool($Ud){$X=ini_get($Ud);return(preg_match('~^(on|true|yes)$~i',$X)||(int)$X);}function
sid(){static$H;if($H===null)$H=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));return$H;}function
set_password($cj,$M,$V,$E){$_SESSION["pwds"][$cj][$M][$V]=($_COOKIE["adminer_key"]&&is_string($E)?array(encrypt_string($E,$_COOKIE["adminer_key"])):$E);}function
get_password(){$H=get_session("pwds");if(is_array($H))$H=($_COOKIE["adminer_key"]?decrypt_string($H[0],$_COOKIE["adminer_key"]):false);return$H;}function
q($P){global$h;return$h->quote($P);}function
get_vals($F,$e=0){global$h;$H=array();$G=$h->query($F);if(is_object($G)){while($I=$G->fetch_row())$H[]=$I[$e];}return$H;}function
get_key_vals($F,$i=null,$th=true){global$h;if(!is_object($i))$i=$h;$H=array();$G=$i->query($F);if(is_object($G)){while($I=$G->fetch_row()){if($th)$H[$I[0]]=$I[1];else$H[]=$I[0];}}return$H;}function
get_rows($F,$i=null,$n="<p class='error'>"){global$h;$zb=(is_object($i)?$i:$h);$H=array();$G=$zb->query($F);if(is_object($G)){while($I=$G->fetch_assoc())$H[]=$I;}elseif(!$G&&!is_object($i)&&$n&&defined("PAGE_HEADER"))echo$n.error()."\n";return$H;}function
unique_array($I,$w){foreach($w
as$v){if(preg_match("~PRIMARY|UNIQUE~",$v["type"])){$H=array();foreach($v["columns"]as$y){if(!isset($I[$y]))continue
2;$H[$y]=$I[$y];}return$H;}}}function
escape_key($y){if(preg_match('(^([\w(]+)('.str_replace("_",".*",preg_quote(idf_escape("_"))).')([ \w)]+)$)',$y,$A))return$A[1].idf_escape(idf_unescape($A[2])).$A[3];return
idf_escape($y);}function
where($Z,$p=array()){global$h,$x;$H=array();foreach((array)$Z["where"]as$y=>$X){$y=bracket_escape($y,1);$e=escape_key($y);$H[]=$e.($x=="sql"&&is_numeric($X)&&preg_match('~\.~',$X)?" LIKE ".q($X):($x=="mssql"?" LIKE ".q(preg_replace('~[_%[]~','[\0]',$X)):" = ".unconvert_field($p[$y],q($X))));if($x=="sql"&&preg_match('~char|text~',$p[$y]["type"])&&preg_match("~[^ -@]~",$X))$H[]="$e = ".q($X)." COLLATE ".charset($h)."_bin";}foreach((array)$Z["null"]as$y)$H[]=escape_key($y)." IS NULL";return
implode(" AND ",$H);}function
where_check($X,$p=array()){parse_str($X,$eb);remove_slashes(array(&$eb));return
where($eb,$p);}function
where_link($s,$e,$Y,$zf="="){return"&where%5B$s%5D%5Bcol%5D=".urlencode($e)."&where%5B$s%5D%5Bop%5D=".urlencode(($Y!==null?$zf:"IS NULL"))."&where%5B$s%5D%5Bval%5D=".urlencode($Y);}function
convert_fields($f,$p,$K=array()){$H="";foreach($f
as$y=>$X){if($K&&!in_array(idf_escape($y),$K))continue;$Ha=convert_field($p[$y]);if($Ha)$H.=", $Ha AS ".idf_escape($y);}return$H;}function
cookie($B,$Y,$_e=2592000){global$ba;return
header("Set-Cookie: $B=".urlencode($Y).($_e?"; expires=".gmdate("D, d M Y H:i:s",time()+$_e)." GMT":"")."; path=".preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]).($ba?"; secure":"")."; HttpOnly; SameSite=lax",false);}function
restart_session(){if(!ini_bool("session.use_cookies"))session_start();}function
stop_session($fd=false){$Ui=ini_bool("session.use_cookies");if(!$Ui||$fd){session_write_close();if($Ui&&@ini_set("session.use_cookies",false)===false)session_start();}}function&get_session($y){return$_SESSION[$y][DRIVER][SERVER][$_GET["username"]];}function
set_session($y,$X){$_SESSION[$y][DRIVER][SERVER][$_GET["username"]]=$X;}function
auth_url($cj,$M,$V,$l=null){global$ic;preg_match('~([^?]*)\??(.*)~',remove_from_uri(implode("|",array_keys($ic))."|username|".($l!==null?"db|":"").session_name()),$A);return"$A[1]?".(sid()?SID."&":"").($cj!="server"||$M!=""?urlencode($cj)."=".urlencode($M)."&":"")."username=".urlencode($V).($l!=""?"&db=".urlencode($l):"").($A[2]?"&$A[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
redirect($Be,$Qe=null){if($Qe!==null){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',($Be!==null?$Be:$_SERVER["REQUEST_URI"]))][]=$Qe;}if($Be!==null){if($Be=="")$Be=".";header("Location: $Be");exit;}}function
query_redirect($F,$Be,$Qe,$Gg=true,$Gc=true,$Rc=false,$ji=""){global$h,$n,$b;if($Gc){$Ih=microtime(true);$Rc=!$h->query($F);$ji=format_time($Ih);}$Dh="";if($F)$Dh=$b->messageQuery($F,$ji,$Rc);if($Rc){$n=error().$Dh.script("messagesPrint();");return
false;}if($Gg)redirect($Be,$Qe.$Dh);return
true;}function
queries($F){global$h;static$_g=array();static$Ih;if(!$Ih)$Ih=microtime(true);if($F===null)return
array(implode("\n",$_g),format_time($Ih));$_g[]=(preg_match('~;$~',$F)?"DELIMITER ;;\n$F;\nDELIMITER ":$F).";";return$h->query($F);}function
apply_queries($F,$S,$Cc='table'){foreach($S
as$Q){if(!queries("$F ".$Cc($Q)))return
false;}return
true;}function
queries_redirect($Be,$Qe,$Gg){list($_g,$ji)=queries(null);return
query_redirect($_g,$Be,$Qe,$Gg,false,!$Gg,$ji);}function
format_time($Ih){return
lang(1,max(0,microtime(true)-$Ih));}function
relative_uri(){return
preg_replace('~^[^?]*/([^?]*)~','\1',$_SERVER["REQUEST_URI"]);}function
remove_from_uri($Sf=""){return
substr(preg_replace("~(?<=[?&])($Sf".(SID?"":"|".session_name()).")=[^&]*&~",'',relative_uri()."&"),0,-1);}function
pagination($D,$Nb){return" ".($D==$Nb?$D+1:'<a href="'.h(remove_from_uri("page").($D?"&page=$D".($_GET["next"]?"&next=".urlencode($_GET["next"]):""):"")).'">'.($D+1)."</a>");}function
get_file($y,$Vb=false){$Xc=$_FILES[$y];if(!$Xc)return
null;foreach($Xc
as$y=>$X)$Xc[$y]=(array)$X;$H='';foreach($Xc["error"]as$y=>$n){if($n)return$n;$B=$Xc["name"][$y];$ri=$Xc["tmp_name"][$y];$Bb=file_get_contents($Vb&&preg_match('~\.gz$~',$B)?"compress.zlib://$ri":$ri);if($Vb){$Ih=substr($Bb,0,3);if(function_exists("iconv")&&preg_match("~^\xFE\xFF|^\xFF\xFE~",$Ih,$Mg))$Bb=iconv("utf-16","utf-8",$Bb);elseif($Ih=="\xEF\xBB\xBF")$Bb=substr($Bb,3);$H.=$Bb."\n\n";}else$H.=$Bb;}return$H;}function
upload_error($n){$Ne=($n==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):0);return($n?lang(2).($Ne?" ".lang(3,$Ne):""):lang(4));}function
repeat_pattern($fg,$ye){return
str_repeat("$fg{0,65535}",$ye/65535)."$fg{0,".($ye%65535)."}";}function
is_utf8($X){return(preg_match('~~u',$X)&&!preg_match('~[\0-\x8\xB\xC\xE-\x1F]~',$X));}function
shorten_utf8($P,$ye=80,$Ph=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{10FFFF}]",$ye).")($)?)u",$P,$A))preg_match("(^(".repeat_pattern("[\t\r\n -~]",$ye).")($)?)",$P,$A);return
h($A[1]).$Ph.(isset($A[2])?"":"<i>â¦</i>");}function
format_number($X){return
strtr(number_format($X,0,".",lang(5)),preg_split('~~u',lang(6),-1,PREG_SPLIT_NO_EMPTY));}function
friendly_url($X){return
preg_replace('~[^a-z0-9_]~i','-',$X);}function
hidden_fields($vg,$Jd=array()){$H=false;while(list($y,$X)=each($vg)){if(!in_array($y,$Jd)){if(is_array($X)){foreach($X
as$he=>$W)$vg[$y."[$he]"]=$W;}else{$H=true;echo'<input type="hidden" name="'.h($y).'" value="'.h($X).'">';}}}return$H;}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
table_status1($Q,$Sc=false){$H=table_status($Q,$Sc);return($H?$H:array("Name"=>$Q));}function
column_foreign_keys($Q){global$b;$H=array();foreach($b->foreignKeys($Q)as$q){foreach($q["source"]as$X)$H[$X][]=$q;}return$H;}function
enum_input($T,$Ka,$o,$Y,$xc=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$Ie);$H=($xc!==null?"<label><input type='$T'$Ka value='$xc'".((is_array($Y)?in_array($xc,$Y):$Y===0)?" checked":"")."><i>".lang(7)."</i></label>":"");foreach($Ie[1]as$s=>$X){$X=stripcslashes(str_replace("''","'",$X));$gb=(is_int($Y)?$Y==$s+1:(is_array($Y)?in_array($s+1,$Y):$Y===$X));$H.=" <label><input type='$T'$Ka value='".($s+1)."'".($gb?' checked':'').'>'.h($b->editVal($X,$o)).'</label>';}return$H;}function
input($o,$Y,$r){global$U,$b,$x;$B=h(bracket_escape($o["field"]));echo"<td class='function'>";if(is_array($Y)&&!$r){$Fa=array($Y);if(version_compare(PHP_VERSION,5.4)>=0)$Fa[]=JSON_PRETTY_PRINT;$Y=call_user_func_array('json_encode',$Fa);$r="json";}$Qg=($x=="mssql"&&$o["auto_increment"]);if($Qg&&!$_POST["save"])$r=null;$od=(isset($_GET["select"])||$Qg?array("orig"=>lang(8)):array())+$b->editFunctions($o);$Ka=" name='fields[$B]'";if($o["type"]=="enum")echo
h($od[""])."<td>".$b->editInput($_GET["edit"],$o,$Ka,$Y);else{$yd=(in_array($r,$od)||isset($od[$r]));echo(count($od)>1?"<select name='function[$B]'>".optionlist($od,$r===null||$yd?$r:"")."</select>".on_help("getTarget(event).value.replace(/^SQL\$/, '')",1).script("qsl('select').onchange = functionChange;",""):h(reset($od))).'<td>';$Wd=$b->editInput($_GET["edit"],$o,$Ka,$Y);if($Wd!="")echo$Wd;elseif(preg_match('~bool~',$o["type"]))echo"<input type='hidden'$Ka value='0'>"."<input type='checkbox'".(preg_match('~^(1|t|true|y|yes|on)$~i',$Y)?" checked='checked'":"")."$Ka value='1'>";elseif($o["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$Ie);foreach($Ie[1]as$s=>$X){$X=stripcslashes(str_replace("''","'",$X));$gb=(is_int($Y)?($Y>>$s)&1:in_array($X,explode(",",$Y),true));echo" <label><input type='checkbox' name='fields[$B][$s]' value='".(1<<$s)."'".($gb?' checked':'').">".h($b->editVal($X,$o)).'</label>';}}elseif(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads"))echo"<input type='file' name='fields-$B'>";elseif(($hi=preg_match('~text|lob|memo~i',$o["type"]))||preg_match("~\n~",$Y)){if($hi&&$x!="sqlite")$Ka.=" cols='50' rows='12'";else{$J=min(12,substr_count($Y,"\n")+1);$Ka.=" cols='30' rows='$J'".($J==1?" style='height: 1.2em;'":"");}echo"<textarea$Ka>".h($Y).'</textarea>';}elseif($r=="json"||preg_match('~^jsonb?$~',$o["type"]))echo"<textarea$Ka cols='50' rows='12' class='jush-js'>".h($Y).'</textarea>';else{$Pe=(!preg_match('~int~',$o["type"])&&preg_match('~^(\d+)(,(\d+))?$~',$o["length"],$A)?((preg_match("~binary~",$o["type"])?2:1)*$A[1]+($A[3]?1:0)+($A[2]&&!$o["unsigned"]?1:0)):($U[$o["type"]]?$U[$o["type"]]+($o["unsigned"]?0:1):0));if($x=='sql'&&min_version(5.6)&&preg_match('~time~',$o["type"]))$Pe+=7;echo"<input".((!$yd||$r==="")&&preg_match('~(?<!o)int(?!er)~',$o["type"])&&!preg_match('~\[\]~',$o["full_type"])?" type='number'":"")." value='".h($Y)."'".($Pe?" data-maxlength='$Pe'":"").(preg_match('~char|binary~',$o["type"])&&$Pe>20?" size='40'":"")."$Ka>";}echo$b->editHint($_GET["edit"],$o,$Y);$ad=0;foreach($od
as$y=>$X){if($y===""||!$X)break;$ad++;}if($ad)echo
script("mixin(qsl('td'), {onchange: partial(skipOriginal, $ad), oninput: function () { this.onchange(); }});");}}function
process_input($o){global$b,$m;$u=bracket_escape($o["field"]);$r=$_POST["function"][$u];$Y=$_POST["fields"][$u];if($o["type"]=="enum"){if($Y==-1)return
false;if($Y=="")return"NULL";return+$Y;}if($o["auto_increment"]&&$Y=="")return
null;if($r=="orig")return(preg_match('~^CURRENT_TIMESTAMP~i',$o["on_update"])?idf_escape($o["field"]):false);if($r=="NULL")return"NULL";if($o["type"]=="set")return
array_sum((array)$Y);if($r=="json"){$r="";$Y=json_decode($Y,true);if(!is_array($Y))return
false;return$Y;}if(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads")){$Xc=get_file("fields-$u");if(!is_string($Xc))return
false;return$m->quoteBinary($Xc);}return$b->processInput($o,$Y,$r);}function
fields_from_edit(){global$m;$H=array();foreach((array)$_POST["field_keys"]as$y=>$X){if($X!=""){$X=bracket_escape($X);$_POST["function"][$X]=$_POST["field_funs"][$y];$_POST["fields"][$X]=$_POST["field_vals"][$y];}}foreach((array)$_POST["fields"]as$y=>$X){$B=bracket_escape($y,1);$H[$B]=array("field"=>$B,"privileges"=>array("insert"=>1,"update"=>1),"null"=>1,"auto_increment"=>($y==$m->primary),);}return$H;}function
search_tables(){global$b,$h;$_GET["where"][0]["val"]=$_POST["query"];$nh="<ul>\n";foreach(table_status('',true)as$Q=>$R){$B=$b->tableName($R);if(isset($R["Engine"])&&$B!=""&&(!$_POST["tables"]||in_array($Q,$_POST["tables"]))){$G=$h->query("SELECT".limit("1 FROM ".table($Q)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($Q),array())),1));if(!$G||$G->fetch_row()){$rg="<a href='".h(ME."select=".urlencode($Q)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$B</a>";echo"$nh<li>".($G?$rg:"<p class='error'>$rg: ".error())."\n";$nh="";}}}echo($nh?"<p class='message'>".lang(9):"</ul>")."\n";}function
dump_headers($Gd,$Ze=false){global$b;$H=$b->dumpHeaders($Gd,$Ze);$Pf=$_POST["output"];if($Pf!="text")header("Content-Disposition: attachment; filename=".$b->dumpFilename($Gd).".$H".($Pf!="file"&&!preg_match('~[^0-9a-z]~',$Pf)?".$Pf":""));session_write_close();ob_flush();flush();return$H;}function
dump_csv($I){foreach($I
as$y=>$X){if(preg_match("~[\"\n,;\t]~",$X)||$X==="")$I[$y]='"'.str_replace('"','""',$X).'"';}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$I)."\r\n";}function
apply_sql_function($r,$e){return($r?($r=="unixepoch"?"DATETIME($e, '$r')":($r=="count distinct"?"COUNT(DISTINCT ":strtoupper("$r("))."$e)"):$e);}function
get_temp_dir(){$H=ini_get("upload_tmp_dir");if(!$H){if(function_exists('sys_get_temp_dir'))$H=sys_get_temp_dir();else{$Yc=@tempnam("","");if(!$Yc)return
false;$H=dirname($Yc);unlink($Yc);}}return$H;}function
file_open_lock($Yc){$md=@fopen($Yc,"r+");if(!$md){$md=@fopen($Yc,"w");if(!$md)return;chmod($Yc,0660);}flock($md,LOCK_EX);return$md;}function
file_write_unlock($md,$Pb){rewind($md);fwrite($md,$Pb);ftruncate($md,strlen($Pb));flock($md,LOCK_UN);fclose($md);}function
password_file($Hb){$Yc=get_temp_dir()."/adminer.key";$H=@file_get_contents($Yc);if($H||!$Hb)return$H;$md=@fopen($Yc,"w");if($md){chmod($Yc,0660);$H=rand_string();fwrite($md,$H);fclose($md);}return$H;}function
rand_string(){return
md5(uniqid(mt_rand(),true));}function
select_value($X,$_,$o,$ii){global$b;if(is_array($X)){$H="";foreach($X
as$he=>$W)$H.="<tr>".($X!=array_values($X)?"<th>".h($he):"")."<td>".select_value($W,$_,$o,$ii);return"<table cellspacing='0'>$H</table>";}if(!$_)$_=$b->selectLink($X,$o);if($_===null){if(is_mail($X))$_="mailto:$X";if(is_url($X))$_=$X;}$H=$b->editVal($X,$o);if($H!==null){if(!is_utf8($H))$H="\0";elseif($ii!=""&&is_shortable($o))$H=shorten_utf8($H,max(0,+$ii));else$H=h($H);}return$b->selectVal($H,$_,$o,$X);}function
is_mail($uc){$Ia='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$hc='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$fg="$Ia+(\\.$Ia+)*@($hc?\\.)+$hc";return
is_string($uc)&&preg_match("(^$fg(,\\s*$fg)*\$)i",$uc);}function
is_url($P){$hc='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return
preg_match("~^(https?)://($hc?\\.)+$hc(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i",$P);}function
is_shortable($o){return
preg_match('~char|text|json|lob|geometry|point|linestring|polygon|string|bytea~',$o["type"]);}function
count_rows($Q,$Z,$ce,$rd){global$x;$F=" FROM ".table($Q).($Z?" WHERE ".implode(" AND ",$Z):"");return($ce&&($x=="sql"||count($rd)==1)?"SELECT COUNT(DISTINCT ".implode(", ",$rd).")$F":"SELECT COUNT(*)".($ce?" FROM (SELECT 1$F GROUP BY ".implode(", ",$rd).") x":$F));}function
slow_query($F){global$b,$ti,$m;$l=$b->database();$ki=$b->queryTimeout();$yh=$m->slowQuery($F,$ki);if(!$yh&&support("kill")&&is_object($i=connect())&&($l==""||$i->select_db($l))){$me=$i->result(connection_id());echo'<script',nonce(),'>
var timeout = setTimeout(function () {
	ajax(\'',js_escape(ME),'script=kill\', function () {
	}, \'kill=',$me,'&token=',$ti,'\');
}, ',1000*$ki,');
</script>
';}else$i=null;ob_flush();flush();$H=@get_key_vals(($yh?$yh:$F),$i,false);if($i){echo
script("clearTimeout(timeout);");ob_flush();flush();}return$H;}function
get_token(){$Cg=rand(1,1e6);return($Cg^$_SESSION["token"]).":$Cg";}function
verify_token(){list($ti,$Cg)=explode(":",$_POST["token"]);return($Cg^$_SESSION["token"])==$ti;}function
lzw_decompress($Ta){$ec=256;$Ua=8;$nb=array();$Sg=0;$Tg=0;for($s=0;$s<strlen($Ta);$s++){$Sg=($Sg<<8)+ord($Ta[$s]);$Tg+=8;if($Tg>=$Ua){$Tg-=$Ua;$nb[]=$Sg>>$Tg;$Sg&=(1<<$Tg)-1;$ec++;if($ec>>$Ua)$Ua++;}}$dc=range("\0","\xFF");$H="";foreach($nb
as$s=>$mb){$tc=$dc[$mb];if(!isset($tc))$tc=$rj.$rj[0];$H.=$tc;if($s)$dc[]=$rj.$tc[0];$rj=$tc;}return$H;}function
on_help($tb,$vh=0){return
script("mixin(qsl('select, input'), {onmouseover: function (event) { helpMouseover.call(this, event, $tb, $vh) }, onmouseout: helpMouseout});","");}function
edit_form($a,$p,$I,$Oi){global$b,$x,$ti,$n;$Uh=$b->tableName(table_status1($a,true));page_header(($Oi?lang(10):lang(11)),$n,array("select"=>array($a,$Uh)),$Uh);if($I===false)echo"<p class='error'>".lang(12)."\n";echo'<form action="" method="post" enctype="multipart/form-data" id="form">
';if(!$p)echo"<p class='error'>".lang(13)."\n";else{echo"<table cellspacing='0' class='layout'>".script("qsl('table').onkeydown = editingKeydown;");foreach($p
as$B=>$o){echo"<tr><th>".$b->fieldName($o);$Wb=$_GET["set"][bracket_escape($B)];if($Wb===null){$Wb=$o["default"];if($o["type"]=="bit"&&preg_match("~^b'([01]*)'\$~",$Wb,$Mg))$Wb=$Mg[1];}$Y=($I!==null?($I[$B]!=""&&$x=="sql"&&preg_match("~enum|set~",$o["type"])?(is_array($I[$B])?array_sum($I[$B]):+$I[$B]):$I[$B]):(!$Oi&&$o["auto_increment"]?"":(isset($_GET["select"])?false:$Wb)));if(!$_POST["save"]&&is_string($Y))$Y=$b->editVal($Y,$o);$r=($_POST["save"]?(string)$_POST["function"][$B]:($Oi&&preg_match('~^CURRENT_TIMESTAMP~i',$o["on_update"])?"now":($Y===false?null:($Y!==null?'':'NULL'))));if(preg_match("~time~",$o["type"])&&preg_match('~^CURRENT_TIMESTAMP~i',$Y)){$Y="";$r="now";}input($o,$Y,$r);echo"\n";}if(!support("table"))echo"<tr>"."<th><input name='field_keys[]'>".script("qsl('input').oninput = fieldChange;")."<td class='function'>".html_select("field_funs[]",$b->editFunctions(array("null"=>isset($_GET["select"]))))."<td><input name='field_vals[]'>"."\n";echo"</table>\n";}echo"<p>\n";if($p){echo"<input type='submit' value='".lang(14)."'>\n";if(!isset($_GET["select"])){echo"<input type='submit' name='insert' value='".($Oi?lang(15):lang(16))."' title='Ctrl+Shift+Enter'>\n",($Oi?script("qsl('input').onclick = function () { return !ajaxForm(this.form, '".lang(17)."â¦', this); };"):"");}}echo($Oi?"<input type='submit' name='delete' value='".lang(18)."'>".confirm()."\n":($_POST||!$p?"":script("focus(qsa('td', qs('#form'))[1].firstChild);")));if(isset($_GET["select"]))hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$ti,'">
</form>
';}if(isset($_GET["file"])){if($_SERVER["HTTP_IF_MODIFIED_SINCE"]){header("HTTP/1.1 304 Not Modified");exit;}header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");header("Cache-Control: immutable");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
lzw_decompress("\0\0\0` \0\0\n @\0´Cè\"\0`EãQ¸àÿ?ÀtvM'JdÁd\\b0\0Ä\"ÀfÓ¤îs5ÏçÑAXPaJ0¥8#RT©z`#.©ÇcíXÃþÈ?À-\0¡Im? .«M¶\0È¯(ÌýÀ/(%\0");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo
lzw_decompress("\n1ÌÙÞl7B14vb0Ífs¼ên2BÌÑ±ÙÞn:#(¼b.\rDc)ÈÈa7E¤Âl¦Ã±èi1Ìs´ç-4fÓ	ÈÎi7³¹¤Èt4
¦ÓyèZf4°iAT«VVéf:Ï¦,:1¦QÝ¼ñb2`Ç#þ>:7Gï1ÑØÒs°LXD*bv<Ü#£e@Ö:4ç§!fo·Æt:<¥Üå¾oâÜ\niÃÅð',é»a_¤:¹iï
´ÁBvø|Nû4.5Nfi¢vpÐh¸°l¨ê¡ÖÜO¦î= £OFQÐÄk\$¥ÓiõÀÂd2Tã¡pàÊ6þ¡-ØZ Þ6½£ðh:¬aÌ,£ëî2#8Ð±#6nâîñJ¢h«t
±ä4O42ô½okÞ¾*r ©@p@!Ä¾ÏÃôþ?Ð6Àr[ðLÁð:2Bj§!HbóÃPä=!1V\"²0
¿\nSÆÆÏD7ÃìDÚÃC!!à¦GÊ§ È+=tCæ©.C¤À:+ÈÊ=ªªº²¡±å%ªcí1MR/EÈ4© 2°ä± ã`Â8(áÓ¹[WäÑ=ySb°=Ö-Ü¹BS+É¯ÈÜý¥ø@pL4Ydãqøã¦ðê¢6£3Ä¬¯¸AcÜèÎ¨k[&>ö¨ZÁpkm]u-c:Ø¸NtæÎ´pÒ8è=¿#á[.ðÜÞ¯~ mËyPPá|IÖùÀìQª9v[Q\nÙrô'g+áTÑ2
­VÁõzä4£8÷(	¾Ey*#j¬2]­RÒÁ¥)À[N­R\$<>:ó­>\$;> Ì\r»ÎHÍÃTÈ\nw¡N åwØ£¦ì<ïËGwàöö¹\\Yó_ Rt^>\r}ÙS\rzé4=µ\nL%Jã\",Z 8¸i÷0u©?¨ûÑô¡s3#¨Ù :ó¦ûã½ÈÞE]xÝÒs^8£K^É÷*0ÑÞwÞàÈÞ~ãö:íÑiØþv2w½ÿ±û^7ãò7£cÝÑu+U%{PÜ*4Ì¼éLX./!¼1CÅßqx!H¹ãFdù­L¨¤¨Ä Ï`6ëè5®f¸Ä¨=Høl V1\0a2×;Ô6àöþ_ÙÄ\0&ôZÜS d)KE'nµ[X©³\0ZÉÔF[PÞ@àß!ñYÂ,`É\"Ú·Â0Ee9yF>ËÔ9bºæF5:ü\0}Ä´(\$Óë37Hö£è M¾A°²6Rú{MqÝ7G ÚCCêm2¢(Ct>[ì-tÀ/&C]êetGôÌ¬4@r>ÇÂå<Sq/åúQëhmÀÐÆôãôLÀÜ#èôKË|®6fKPÝ\r%tÔÓV=\" SH\$} ¸)w¡,W\0F³ªu@Øb¦9\rr°2Ã#¬DX³ÚyOIù>»
nÇ¢%ãù'Ý_Át\rÏzÄ\\1hl¼]Q5Mp6kÐÄqhÃ\$£H~Í|ÒÝ!*4ñòÛ`Sëý²S tíPP\\g±è7\n-:è¢ªp´lB¦î7Ó¨c(wO0\\:ÐwÁp4ò{TÚújO¤6HÃ¶rÕ¥q\n¦É%%¶y']\$aZÓ.fcÕq*-êFWºúkz°µj°lgá:\$\"ÞN¼\r#ÉdâÃÂÿÐscá¬Ì \"jª\rÀ¶¦Õ¼Ph1/DA) ²Ý[ÀknÁp76ÁY´R{áM¤Pû°ò@\n-¸a·6þß[»zJH,dl B£ho³ìò¬+#Dr^µ^µÙe¼E½½ ÄaPôõJG£zàñtñ 2ÇXÙ¢´Á¿V¶×ßàÞÈ³ÑB_%K=E©¸bå¼¾ßÂ§kU(.!Ü®8¸üÉI.@KÍxnþ¬ü:ÃPó32«míH		C*ì:vâTÅ\nR¹µ0uÂíæîÒ§]Î¯P/µJQd¥{LÞ³:YÁ2b¼T ñÊ3Ó4äcê¥V=¿L4ÎÐrÄ!ßBðY³6Í­MeLªÜçöùiÀoÐ9< G¤ÆÐMhm^¯UÛNÀ·òTr5HiM/¬ní³T [-<__î3/Xr(<¯®ÉôÌuÒGNX20å\r\$^:'9è¶O
í;×k¼µf N'a¶Ç­bÅ,ËV¤ô
«1µïHI!%6@úÏ\$ÒEGÚ¬1(mUªå
rÕ½ïßå`¡ÐiN+Ãñ)ä0lØÒf0Ã½[UâøVÊè-:I^ \$Øs«b\reugÉhª~9ÛßbµôÂÈfä+0¬Ô hXrÝ¬©!\$e,±w+÷ë3Ì_âA
kù\nkÃrõÊcuWdYÿ\\×={.óÄ¢g»p8t\rRZ¿vJ:²>þ£Y|+Å@ÀÛCt\rjt½6²ð%Â?àôÇñ>ù/¥ÍÇðÎ9F`×äòv~K¤áöÑRÐWðzêlmªwLÇ9Y*q¬xÄzñèSe®Ý³è÷£~DàÍá÷x¾ëÉi72ÄøÑOÝ»û_{ñú53âút_õzÔ3ùd)C¯Â\$?KÓªP%ÏÏT&þ&\0P×NA^­~¢ pÆ öÏÔõ\r\$ÞïÐÖìb*+D6ê¶¦ÏÞíJ\$(ÈolÞÍh&ìKBS>¸ö;z¶¦xÅoz>íÚoÄZð\nÊ[ÏvõËÈµ°2õOxÙVø0fûú¯Þ2BlÉbkÐ6ZkµhXcdê0*ÂKTâ¯H=­Ïp0lVéõèâ\r¼¥nm¦ï)((ô:#¦âòEÜ:C¨CàÚâ\r¨G\rÃ©0÷
iæÚ°þ:`Z1Q\n:à\r\0àçÈq±°ü:`¿-ÈM#}1;èþ¹q#|ñS¾¢hlDÄ\0fiDpëL ``°çÑ0yß1
ê\rñ=MQ\\¤³%oq­\0Øñ£1¨21¬1°­ ¿±§Ñbi:í\r±/Ñ¢ `)Ä0ù@¾Â±ÃI1«NàCØàµñO±¢Zñã1±ïq1 òÑüà,å\rdIÇ¦väjí1 tÚBø°â0:
0ðð1 A2Vñâ0 éñ%²fi3!&Q·Rc%Òq&w%Ñì\ràVÈ#ÊøQw`% ¾Òm*r
Òy&iß+r{*²»(rg(±#(2­(ðå)R@i-  1\"\0Û²Rêÿ.e.rëÄ,¡ry(2ªCàè²bì!BÞ3%Òµ,R¿1²Æ&èþtäbèa\rL³-3á Ö ó\0æóBp1ñ94³O'R°3*²³=\$à[£^iI;/3i©5Ò&}17²# Ñ¹8 ¿\"ß7Ñå8ñ9*Ò23!ó!1\\\0Ï8­rk9±;S
23¶àÚ*Ó:q]5S<³Á#383Ý#eÑ=¹>~9Sè³rÕ)T*a@ÑÙbesÙÔ£:-óéÇ*;, Ø3!i´LÒ²ð#1 +nÀ «*²ã@³3i7´1©´_FS;3ÏF±\rA¯é3õ>´x: \r³0ÎÔ@-Ô/¬ÓwÓÛ7ñÓSJ3 ç.Fé\$O¤B±%4©+tÃ'góLq\rJtJôËM2\rôÍ7ñÆT@£¾)â£dÉ2P>Î°Fià²´þ\nr\0¸bçk(´D¶¿ãKQ¤´ã1ã\"2tôôºPè\rÃÀ,\$KCtò5ôö#ôú)¢áP#Pi.ÎU2µCæ~Þ\"ä");}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("f:gCI¼Ü\n8Å3)°Ë7
81ÐÊx:\nOg#)Ðêr7\n\"è´`ø|2ÌgSiH)N¦Sä§\r\"0¹Ä@ä)`(\$s6O!ÓèV/=' T4æ=iS6IO G#ÒX·VCÆs¡ Z1.Ðhp8,³[¦Häµ~Cz§Éå2¹l¾c3Íés£ÙIbâ4\néF8TàIÝ©U*fz¹är0EÆÀØy¸ñfY.:æIÊ(Øc·áÎ!_lí^·^(¶N{S)rËqÁYlÙ¦33Ú\n+G¥ÓêyºíËi¶ÂîxV3w³uhã^rØÀº´aÛú¹cØè\r¨ë(.ÂºChÒ<\r)èÑ£¡`æ7£íò43'm5£È\nPÜ:2£P»ªq òÿÅC}Ä«úÊÁê38BØ0hRÈr(0¥¡b\\0Hr44ÁB!¡pÇ\$rZZË2Ü.É(\\5Ã|\nC(Î\"P
ðø.ÐNÌRTÊÎÀæ>HN
8HPá\\¬7Jp~Üû2%¡ÐOC¨1ã.§C8ÎHÈò*j°
á÷S(¹/¡ì¬6KUÊ¡<2pOIôÕ`Ôäâ³dOH Þ5-üÆ4ãpX25-Ò¢òÛ°z7£¸\"(°P \\32:]UÚèíâß
!]¸<·AÛÛ¤ÐßiÚ°l\rÔ\0v²Î#J8«ÏwmíÉ¤¨<É æü%m;p#ã`XDø÷iZøN0È9ø¨å Áè`
wJD¿¾2Ò9t¢*øÎyìËNiIh\\9ÆÕèÐ:æáxï­µyl*ÈÎæY Üøê8W³â?µÞ3ÙðÊ!\"6ån[¬Ê\r­*\$¶Æ§¾nzxÆ9\rì|*3×£pÞï»¶:(p\\;ÔËmz¢ü§9óÐÑÂü8N
Áj2½«Î\rÉHîH&²(ÃzÁ7iÛk£ ¤c¤eòý§tÌÌ2:SHóÈ Ã/)xÞ@éåtri9¥½õë8ÏÀËïyÒ·½°VÄ+^WÚ¦­¬kZæYl·Ê£4ÖÈÆª¶À¬ð\\EÈ{î7\0¹pDi-TæþÚû0l°%=Á ÐË9(5ð\n\nn,4\0èa}Ü.°öRsïª\02B\\Ûb1S±\0003,ÔXPHJspådK CA!°2*WÔñÚ2\$ä+Âf^\n1´òzE Iv¤\\ä2É .*A°E(d±á°ÃbêÂÜÆ9âÁDh&­ª?ÄH°sQ2x~nÃJT2ù&ãàeR½GÒQTwêÝ»õPâã\\ )6¦ôâÂòsh\\3¨\0R	À'\r+*;RðHà.!Ñ[Í'~­%t< çpÜK#Âæ!ñlßÌðLe³Ù,ÄÀ®&á\$	Á½`CXÓ0Ö­å¼û³Ä:Méh	çÚGäÑ!&3 D<!è23Ã?h¤J©e Úðhá\r¡mðNi¸£´ÊNØHl7¡®vêWIå.´Á-Ó5Ö§ey\rEJ\ni*¼\$@ÚRU0,\$U¿E¦ÔÔÂªu)@(tÎSJkáp!~­àd`Ì>¯\nÃ;#\rp9jÉ¹Ü]&Nc(rTQUª½S·Ú\08n`«yb¤ÅLÜO5î,¤ò>xââ±fä´âØ+\"ÑI{kMÈ[\r%Æ[	¤eôaÔ1! èÿí³Ô®©F@«b)R£72î0¡\nW¨±L²ÜÒ®tdÕ+íÜ0wglø0n@òêÉ¢ÕiíM«\nA§M5nì\$E³×±NÛál©Ý×ì%ª1 AÜûºú÷ÝkñrîiFB÷Ïùol,muNx-Í_ Ö¤C( fél\r1p[9x(i´BÒ²ÛzQlüº8CÔ	´©XU Tb£ÝIÝ`p+V\0îÑ;CbÎÀXñ+Ïsïü]H÷Ò[ákx¬G*ô]·awnú!Å6òâÛÐmSí¾IÞÍKË~/Ó¥7ÞùeeNÉòªS«/;dåA>}l~Ïê ¨%^´fçØ¢pÚDEîÃa·t\nx=ÃkÐ*dºêðTºüûj2Éj\n É ,e=M84ôûÔaj@îTÃsÔänf©Ý\nî6ª\rd¼0ÞíôY'%ÔíÞ~	Ò¨<ÖËAîH¿G8ñ¿Î\$z«ð{¶»²u2*àaÀ>»(wK.bP{
oýÂ´«zµ#ë2ö8=É8>ª¤³A,°e°À
+ìCè§xõ*ÃáÒ-b=m,aÃlzkï\$Wõ,mJiæÊ§á÷+èý0°[¯ÿ.RÊsKùÇäXçÝZLËç2`Ì(ïCàvZ¡ÜÝÀ¶è\$×¹,åD?H±ÖNxXôó)îM¨\$ó,Í*\nÑ£\$<qÿÅh!¿¹SâÀxsA!:´K¥Á}Á²ù¬£RþA2k·Xp\n<÷þ¦ýëlì§Ù3¯ø¦ÈVV¬}£g&YÝ!+ó;<¸YÇóYE3r³ÙñCío5¦Åù¢Õ³Ïkkþ
ø°ÖÛ£«Ït÷Uø
­)û[ýßÁî}ïØu´«lç¢:Dø+Ï _oãäh140ÖáÊ0ø¯bäKã¬ öþé»lGª#ª©ê¦©ì|Udæ¶IK«êÂ7à^ìà¸@º®O\0HÅðHi6\rÛ©Ü\\cg\0öãë2BÄ*eà\n	
zr!nWz& {Hð'\$X  w@Ò8ëDGr*ëÄÝHå'p#Ä®¦Ô\ndü÷,ô¥,ü;g~¯\0Ð#Ì²EÂ\rÖI`î'ð%EÒ. ]`ÊÐ
î%&Ðîm°ý\râÞ%4Svð#\n fH\$%ë-Â#­ÆÑqBâíæ ÀÂQ-ôc2§&ÂÀÌ]à èqh\rñl]à®s ÐÑhä7±n#±Ú-àjE¯Frç¤l&dÀØÙåzìF6¸Á\" |¿§¢s@ß±®åz)0rpÚ\0X\0¤Ùè|DL<!°ôo*D¶{.B<Eª0nB(ï |\r\nì^©à h³!Öêr\$§(^ª~èÞÂ/pq²ÌB¨ÅOðú,\\µ¨#RRÎ%ëäÍdÐHjÄ`Â ô®Ì­ Vå bSd§iEøïoh´r<i/k\$-\$o¼+ÆÅÎúlÒÞO³&evÆ¼iÒjMPA'u'Î( M(h/+«òWD¾So·.n·.ðn¸ìê((\"­À§hö&p¨/Ë/1DÌçjå¨¸EèÞ&â¦,'l\$/.,Äd¨
WbbO3óB³sH :J`!.ªÀû¥ ,FÀÑ7(ÈÔ¿³û1lås ÖÒ²Å¢q¢X\rÀ®~Ré°±`®Òó®Y*ä:R¨ùrJ´·%LÏ+n¸\"ø\r¦ÎÍH!qb¾2âLi±%ÓÞÎ¨Wj#9ÓÔObE.I:
6Á7\0Ë6+¤%°.È
Þ³a7E8VSå?(DG¨Ó³Bë%;ò¬ùÔ/<´ú¥À\r ì´>ûMÀ°@¶¾H DsÐ°Z[tH£Enx(ð©R xñû@¯þGkjW>ÌÂÚ#T/8®c8éQ0Ëè_ÔIIGII!¥ðYEdËE´^tdéthÂ`DV!Cæ8¥\r­´b3©!3â@Ù33N}âZBó3	Ï3ä30ÚÜM(ê>Ê}ä\\Ñtêf fËâI\r®ó337 XÔ\"tdÎ,\nbtNO`Pâ;­ÜÒ­ÀÔ¯\$\nßäZÑ­5U5WUµ^hoýàætÙPM/5K4Ej³KQ&53GXXx)Ò<5D
\rûVô\nßr¢5bÜ\\J\">§è1S\r[-¦ÊDuÀ\rÒâ§Ã)00óYõÈË¢·k{\nµÄ#µÞ\r³^·|èuÜ»Uå_nïU4ÉU~YtÓ\rIÃ@ä³R ó3:ÒuePMSè0TµwW¯XÈòòD¨ò¤KOUÜà;Uõ\n OYéYÍQ,M[\0÷_ªDÍÈW ¾J*ì\rg(]à¨\r\"ZC©6uê+µYóY6Ã´0ªqõ(Ùó8}ó3AX3T h9j¶jàfõMtåPJbqMP5>ðÈø¶©Yk%&\\1d¢ØE4À µYnÊí\$<¥U]Ó1mbÖ¶^Òõ ê\"NVéßp¶ëpõ±eMÚÞ×WéÜ¢î\\ä)\n Ë\nf7\n×2´õr8=Ek7tVµ7P¦¶LÉía6òòv@'6iàïj&>±â;­ã`Òÿa	\0pÚ¨(µJÑë)«\\¿ªnûòÄ¬m\0¼¨2ôeqJö­Pôtë±fjüÂ\"[\0¨·¢X,<\\î¶×â÷æ·+mdå~âà
Ñs%o°´mn×),×æÔ²\r4¶Â8\r±Î¸×mEH]¦üÖHW­M0Dïßå~ËKîE}ø¸´à|fØ^Ü×\r>Ô-z]2sxDd[stS¢¶\0Qf-K`­¢tàØwT¯9æZà	ø\nB£9 Nbã<ÚBþI5o×oJñpÀÏJNdåË\rhÞÃ2\"àxæHCàÝ:øý9Yn16Æôzr+z±ùþ\\÷ôm Þ±T öò ÷@Y2lQ<2O+¥%Í.Óhù0AÞñ¸ÃZ2R¦À1£/¯hH\r¨X
ÈaNB&§ ÄM@Ö[xÊ®¥êâ8&LÚVÍvà±*j¤ÛGHåÈ\\Ù®	²¶&sÛ\0Q \\\"èb °	àÄ\rBsÉw	ÙáBN`7§Co(ÙÃà¨\nÃ¨¨19Ì*E ñS
ÓU0Uº t'|m°Þ?h[¢\$.#É5	 å	pàyBà@Rô]£
ê@|§{ÀÊP\0xô/¦ w¢%¤EsBd¿§CU~O×·àPà@Xâ]Ô
¨Z3¨¥1¦¥{©eLY¡Ú¢\\(*R` 	à¦\n
àºÌQCFÈ*¹¹àé¬ÚpX|`N¨¾\$[@ÍU¢àð¦¶àZ¥`Zd\"\\\"
¢£)«I:ètìoDæ\0[²¨à±-© gí³®*`hu%£,¬ãIµ7Ä«²Hóµm¤6Þ}®ºNÖÍ³\$»MµUYf&1ùÀe]pz¥§ÚI¤Åm¶G/£ ºw Ü!\\#5¥4I¥d¹EÂhqå¦÷Ñ¬kçx|Úk¥qDb
z?§º>ú¾:[èLÒÆ¬Z°X®:¹·ÚÇjßw5	¶Y¾0 ©Â­¯\$\0C¢dSg¸ë {@\n`	ÀÃüC ¢·»Mºµâ»²# t}xÎN÷º{ºÛ°)êûCÊFKZÞjÂ\0PFYBäpFk0<Ú>ÊD<JEg\rõ.2ü8éU@*Î5fkªÌJDìÈÉ4TDU76É/´è¯@·K+ÃöJ®ºÃÂí@Ó=ÜWIOD³85MNº\$Rô\0ø5¨\ràù_ðªìEñÏI«Ï³Nçl£Òåy\\ôÇqUÐQû ª\n@¨ÛºÃp¬¨PÛ±«7Ô½N\rýR{*qmÝ\$\0R×ÔÅåqÐÃ+U@ÞB¤çOf*CË¬ºMCä`_ èüò½ËµNêæTâ5Ù¦C×»© ¸à\\WÃe&_X_ØhåÂÆB3ÀÛ%ÜFW£û|GÞ'Å[¯ÅÀ°ÙÕV Ð#^\rç¦GR¾P±ÝFg¢ûî¯ÀYi û¥Çz\nâ¨Þ+ß^/¨¼¥½\\6èßb¼dmh×â@qíÕAhÖ),J­×WÇcm÷em]ÓeÏkZb0ßåþYñ]ymèfØe¹B;¹ÓêOÉÀwapDWûÉÜÓ{\0À-2/bN¬sÖ½Þ¾RaÏ®h&qt\n\"ÕiöRmühzÏeøàÜFS7µÐPPòä¤âÜ:B§âÕsm¶­Y düÞò7}3?*túòéÏlTÚ}~ä=cý¬ÖÞÇ	Ú3
;T²LÞ5*	ñ~#µA¾sx-7÷f5`Ø#\"NÓb÷¯Gõ@Üeü[ïø¤Ìs¸-§M6§£qq he5
\0Ò¢À±ú*àbøISÜÉÜFÎ®9}ýpÓ-øý`{ý±ÉkP0T<©Z9ä0<Õ\r­;!Ãgº\r\nKÔ\n\0Á°*½\nb7(À_¸@,îe2\rÀ]K
+\0Éÿp C\\Ñ¢,0¬^îMÐ§º©@;X\rð?\$\rj+ö/´¬BöæP ½ù¨J{\"aÍ6ä¹|å£\n\0»à\\5Ð	156ÿ .Ý[ÂUØ¯\0dè²8Yç:!Ñ²=ºÀX.²uCªö!Sº¸o
pÓBÝüÛ7¸­Å¯¡Rh­\\hE=úy:< :u³ó2µ80si¦TsBÛ@\$ Íé@Çu	ÈQº¦.ôT0M\\/êd+Æ\n¡=Ô°dÅëA¢¸¢)\r@@Âh3Ù8.eZa|.â7YkÐcÀñ'D#¨Yò@Xq=M¡ï44B AM¤¯dU\"Hw4î(>¬8¨²ÃC¸?e_`ÐÅX:ÄA9Ã¸ôp«GÐäGy6½ÃFXr¡l÷1¡½Ø»B¢Ã
9Rz©õhB{\0ëå^Ã-â0©%D5F\"\"àÚÜÊÂúiÄ`ËÙnAf¨ \"tDZ\"_àV\$ª!/
Dáð¿µ´Ù¦¡ÌF,25ÉjTëáy\0
N¼x\rçYl¦#ÆEq\nÍÈB2\nìà6·
Ä4Ó×!/Â\nóQ¸½*®;)bR¸Z0\0ÄCDoË48À´µÐe\nã¦S%\\úPIk(0Áu/G²Æ¹¼\\Ë} 4FpGû_÷G?)gÈotº[vÖ\0°¸?bÀ;ªË`(Ûà¶NS)\nãx=èÐ+@êÜ7jú0,ð1Ã
z­>0GcðãL
VXô±ÛðÊ%À
ÁQ+øéoÆFõÈéÜ¶Ð>Q-ãcÚÇl¡³¤wàÌz5Gê@(hcÓHõÇr?Nbþ@É¨öÇø°îlx3U`rwª©ÔUÃÔôtØ8Ô=Àl#òõlÿä¨8¥E\"O6\nÂ1e£`\\hKfV/Ð·PaYKçOÌý éàx	Ojór7¥F;´êB»ê£íÌ¼>æÐ¦²V\rÄÄ|©'Jµz«¼#PBäY5\0NC¤^\n~LrRÔ[ÌRÃ¬ñgÀeZ\0x^»i<Qã/)Ó%@ÊfB²HfÊ{%Pà\"\"½ø@ªþ)òDE(iM2S*yòSÁ\"âñÊeÌ1«×\n4`Ê©>¦Q*¦Üy°n¥TäuÔâäÑ~%+W²XK£Q¡[ÊàlPYy#DÙ¬D<«FLú³Õ@Á6']Æû\rFÄ`±!%\n0cÐôÀË©%c8WrpG.TDo¾UL2Ø*é|\$¬:çXt5ÆXYâIp#ñ ²^\nê:#Dú@Ö1\r*ÈK7à@D\0¸CC£xBhÉEnKè,1\"õ*y[á#!ó×âÙ©Ê°l_¢/öxË\0àÉÚ5ÐZÇÿ4\0005JÆh\"2%Y
¦a®a1SûO4Ê%niøPàß´qî_Ê½6¤Ä6ãñ\n@PjUú\0µ`r;¹H´¢:÷âð¶¨4 _w*ø@F@%¸s[d×eôÓbh¿\0âÉ±P\r \\iÀJ§99P9Î^s.âP29©\nNj#,ÀÚð5íM)ÿB¦³\ni%~¸§:9ÏÎX\reÐè8³îeÓ½+ïÀç9Áµâx*ÙW2áNbaçSàE¼ð2è\r³¬Åæpê	îÌ\\(/	LfàÊðòY§äX#8ZJÄHÊ+Pà-I1xÉ¢36àN¢w\rÓÁ[x3ý>\rTObá>sÉ²0ê
jA8;Ø#Ñ¤³àËÂjPdqRJÒ\"(x¡hµ*Äó	T¦éaVã®YÆÆë\$Àî7Z9Ä¸1ÌXJàéaïAOk8fDCð96@áÂéMê(H§ÍãÐBºà?i¼TAPÜ­^0´PÀµaf/ÏP0ÍMH)\"¡dU@¹r1\\Ñ\rÙoH| àÇÅÉh×8
@?PZ,A>Â®ÊúE(&¿eÍ]åQ\$¸åÐªZ¡}a¿¤Ì:P¹w:Ä(è¢ZÊ!8°´«­àn@9\$Þ£(K\"þî%Å¦Í@2ç\$P°<Çº\0õç¦JtUXP\"-AðÔÉ¦YkÖ2óÑö4ÏC\n«\0¶½ 2ý~Äs_Éþ\0÷N5¼ÒèÑ/ ÓIÉ;Âi¸¦ÄÖefkF<ÇrEì,Î6%?¨Ij;'S)MÁ§
4)ÍN.~èùéï\0JÓõ3©ãQzz	?õ§m1¡ªºq	cQHÜ¯yL\"OÏ
0|c\$PÊ\"ÏðÅr0eLm#dÂpx.uA¨^éB76¬ÂqnÛ×BønæiZvR@ï)*ãqÆÿ)ôý7^Iµ¡jIÒS53¤éªê8Úº×Äx9	LqÐLÄOAÚA\0001¢ª%!1-â·WÒ
%#!5+³¥®¡÷!vue(¨Bp¸\nKÅ/ÙÐã×Æ\\ÛiÏæ\0^À\$, |ZÒ(R+kà\n++ÚØVÊG¤{/ðTÍ<ÖM¦ÃªÃÂ¢©°\$ä{Ð´êÌyìVtä +¡SÑZÂ¤(u x\"HC·Jä? v8J÷PÂ Q\0ùV1Àá# '_á\nº4%Ç¥\nza_²ÃPDD{¬+\$SzÊÖ
? l¬Ê«¨2z´!=ÁODÐëÞ[ñb\0éKÊÄ®Ítj+ª(Ò5è.âk£ZFÖ­=Aº®­U×£ð0©CÖËêÐÇ×~Æv.­8+Rx[¬ÂºËØ²Å¦·AuÞáI8ä¬3ß®Ä '	ðifÿà.JÊT¢ïÜX11¤ø&3ì6ª	òÐf@|O`b®g\0»>ÏÖxkkMDÖQ\n¬µñh§ÑøaÀy\$tÀÈ`\"Ì5¿ð²É56| `&´À:TÅA\n­Ë¥ ©pjRùÒI*çQ¦¨±£aNå®Zæ_Z qâ´©G9\0¿±ìå(Ä°=Jú dGíí9rÕê,QpØ+kZ¡\$×I+(Ç5Ì{2íÜ_mÇË8¬e¯Àénõ¦
®\\6Å¶\${XÖK\$·£#kUÚí+vævE¯m×nØêvOè	!Adt£_/´(6õ1Ú­ñm[ã¦¼Üî\$øTÎ±hÖdÜÍXøðÀÖ/7ê ¡B¢ ä-\$À®UrÉ>b*)Ì¶ZÞXnbÄ\nªæESÎpoe¶p\\¸¢D ¨EÍ#Á,¤T~ê.
Pèçm)aº=Ã³Rô·E¶<rõ6gHE-t»ë´ºRívðZtF+m[¸ÒîuÏ:à7w÷]îß,`Ýà-®w«Â9ÒðÑa¯ØãoÛËÅ[DM°ý
ÝÛïoeñrq6³HÒâÈ!*tehíø
^èÊ¹IÉM×Ä\"DAåØ\$\0oHÌApúEÙZL¢}\"öö:ó|àå¯6è|=n¥ªëf¶cðÎÐv§J]A5c
Hø8óó¶-«¾âíOËVBV¥#Ð´ò`ÓÒ\rý -¼	ØKBdG
^ô+ýÀ.·ðªElöË\$\$(qé0|9(h{\n4a7BÜP\0n@-hÉoWà¢¼ `Á+^jÄàdÎ9cPòq1ÚàH\"ÊÌæ\\ÊÐÁ±!µ°\".Ú¤¿¾Ôµ¢E<Õ/z}±(¶XD.6?Nxk*,)ËlÃW§9	j\\IæÎ(JÂøæ­@;Ü1¯àÀ\nIxÔÃ¯àh\rI[:ú¬ËH5/vBuPfuðÁ6«!4³xlâÌ2ÑÛ¼³^ ìÝg\0¤ÙË_qø°~4IÑO\"í-xðDºÓb\\\"Â-_£rÈ¤§G\"Àba{OªßRÚvÕrqK\0\$úmÓbÅÐðNAt@)Uð£°®Ðpjò£ývÈ¼,9ÊêÔ*T~ÝL§½dÑ»ðKgÀªPÉLýª¼Fû2ßúP*,uWÑû*Z¶ÏúUpUi\0d]Ïÿ\rGw\n@`Ð¸©k!qÖgäâ§EòÈHEà£@©ü]y2sÿÇe¿ò%Ã\"ÁÃ\\ÿO?üz+¶Ô4¢;uzÐ0d7±þFËäÊÐ<dÉö2uÎ9âÂW\$y9ý¨\0PÜdÀ,È-öÀ·[æÆÕñh|BQ §á5ÒÉåøØ©<r\0®t;2ûîf9Tª=@çs:äÖÉúñLávË÷©X@WoN 
Wú\$DD7øïeÛÖåÖ:(Ùvð·°/©Âr\rAÆ \nÅz3|¹Ùªz^ev/Ûy¡Ø^5Gµí0B¶ÿm`À¼vlànçn¾R>\nYTcÄÔb¬·P\\rPcßcx7c¥õD={*dr8å©ï©wëÎÜ=R6_ÆNy¥¾`&·á\$H°ÔGîkË4Y|»Ó/ËÙ³Æ@éåÒ¤àsÎ­ùÂÖ¬îçR\"yÖ[îzGo%GgÒýø{Ïº.ïÀ9rï£c¾\\UÎ5âîCÈé\"®)L×ËIßßk¿Ø\r¯üi(íÏ¹-´åú\\dÜ&rö|åfæÃîÐPÞeMéIÚbc0MléC¾°ÑOZ9&ôz¸µ¼HKXèÐé%·AauRÅ¤ñwéI=ºKYò´De¸üÍ\rÞ1¥D¼\"OmuLoÅC\\m!sËT\0ètº¥|¢uKµ)ôÈè²
Z2¸XoM|Cå©Ðh/è¸ôâ!FÔ¨(íJñ\0HSz3ò´Ý(füJØ4Þ£Ý8cbÙ\$¤åÛ©Rê` iÞº.\0üä?àl[6ÇD¨ºHÖÃòR[Àe<q³®
É;©êñú§ÔpKtf`/À»ÿÔ¤z\rÝ«-MièÍ¢LJ®,±ëJCÚÔÔ õ±f°Ó§[¯Öö¥Ú²,-YÚ]!y nTÅ×ÊBl·Þ\$zUcu¡\$¦j>72Õ,4.Ôæ!£íQ¶óD+ìFàó×ç¡Í[\n6ÁSo8ëM)®LeÙ´¯ª\r,ìe=»\rù¦ïÊÇ-h#ºM´*=O¶Õ\n¶#DÁ«êQ+aäO»-Ss1+[@(äÍá3|ìr¨Fæ=iJ¹£Ú2&Ñs\rOí\$!lÐ®DìÀäBtÉþiÀ¸Rq;Í@P¡¶äWP>?=rÓ×nCs,À;BàoêüMÄm¬}­æyÁM¤ðÿË¹-ÛðÝ>y,g6 qãñ\"¸q3|dîå;ìbîF7Ð	ë«@éö?Æv@	À¸ERUì û&I\\}-X º§gG4°]g6Ô>èë·\0Í:º³\"jWPä{±gÀO\\3ÌÝø\nðÒ\rÒ ,ßDß¢9Ç\0	àO}jCÚ·ÔLç|	H¼6¿ý°írTFÿö±­!·S+rìÔôÒc3ÁB@XdT6&÷ÁÇGÆgn8±Æz|)ÊVû^éÜ	©-\0î8ôº¶-«8b»7Ê-/@Ö>VÁ¬¶+uî¤\0B½zl%5×¶á¾OJîî!ÇáÖ²@øx¤hä7 ¼!18SR\0Q*o÷8¾n*?_è×Ø\nxÎìÄTÓ9¨þ¡åün®4,7oÞ^ÈN]´dºqá1#e¡(v¬²ìØ,½¸ms.8÷TÅWgB>`ÏLë@øÞÕ\\­yäÀn\nNq´ð1E=h4<Ó¾\$ÈsAñâu3ÊB±æ:§@áu2A=³Ñ\\B-uMÑÑDnWßdñV
ÖTlrRÀ²ëÒÜUgÈ\r¤§õÓ{Fë>AÇCð'§	Õå2´µ¥b¡bÍÐd§Y/|nr\rSäSk*øAO¦ÒR)Æ;sÁÔ\$w\$)EïAi¾é° Q 1ÝªëÆD3%âï ¦Ë*2rÛPLs,;Þug+th°bñ¶LóÈø%ýÅrC|Z®çáÇN*ÝÐ*5;Û¡ùU¯A²{Ð¤ô~yéiKX¢ÚDä#¢2CJYõ²Öù>zS²CU£õc§ûõêORÔ¾¡0)Ø+Òú:-IN¯£|eÏG;ÛbØÈ\$,p0ô_L.ÅÌ\$Äòv±ÑSÜF1&U°Ë(	nxt§¢ædï@0ù¨Êå±õä/wcñö_RÄ2·fÑ­eÄªè\0=õãsî¡ÁbsCO4×t~§h(¢o}OUòí®_hÔìpÔÔÑòëxí§×\$?!ÐBw³GÄ9ÊGìæ¸¦÷ÃíV?{Xîn×S~¦_1Ø÷Å¢qU{#x\nN \$8EÀqÝ~¥7 !Ài!ñ¥nöqi\r\$ékð¨£ôóºQ×ÃLd	ÒSÏÜtpA9öá/[úsß\0Ø6Vv,ÿõÔ±¥¡'Ý`ê?CshctH\"éK¾}n¦åó¥'®üë»
^§3ª¢Ä_M£%Õoø¤éçVOÍÜÙ¿£«ÝEë\n£rpT¼Lð|`eñÑºÊõA²jä:d|[áÛâ½Jòúò4l N±u4]l´M³H&µ¤\$ä\0YRÀqzWÄ@Üÿ±¢íe3¡'t|·¿.ºÒÞ`(ñI<Ä2¤_5)%¢GÐÃm\0P\nïmèo@Í>½³xB\"ñÒEm|
ù2\$},3LYXgo¡\$ß¶ <Óþ¿IE\"`×ú¨4ág©8^£]\n¡ð:øqVTÔ£Òm°mù7&ÒÄ¤ÃmÓÿ&À¨ÀQzÃÑ½·³Å±íHÔëöyOçfý«\rÙ£.¢¸¶®@¾JW&ßq×50	Ô5ÀîPËG\n½³í¸ÆF­{\0\r²m@ @ P  x4i4+@\0,Í\\C1Óè\nLêÅÓ>n\0ÿââ	 #ÇÞéÄÒ#@]/4JR IR²ïpè¹< Ç¯òaj?)Mví 2X|@v\0aºç\"­Ïkø¨é-ÂyA[|À7\r\$ìÀÚóZÇ­Ràtù>ªÏáCErL	öÆrÓOªe R/à¢J·ä~%Xo4áµdU\"¦QrºIêºQDåò¤ÐèQQM}àQ¿{)Ø©­\",fÐ_(,½6àQ+c¯®&SñùÝ~OípáCº¯ÍÚ©Äù´VþñÍñ@1è[Ù<H/Ê~Ô\0^C ³TÒõq_gPÁpeþ@BÁ×ÑÀéúÇë pÈ¿º)Xßã\0§õßñ{ü`\0vü§Ù³Q¨«Ò@~ ç¿¡ú¿íÅTÆWòûÿ¿ÎôÛü®úßìÿO÷>â8&ÞÿCLÝ¦ÿ(¯ó(ÿ§Ç2ûì\r%;àkæ4û¨_OÍ¾ø5³ö`@<ý²¼/Ü7Ì_	6'AY«ÿ\"¶ýaS°¿z£kpï¾®4+h@ZÿÃô 8>®ýâoßLÿû¿¥ÀjÌsùÀÿ\rJØm±À\0L\0cå?Â³ümªN(¯÷ ÚTp#à| >Àþ©A[?[ûÅ¿·Hkïü¨Â\n¡t¿p:G¬Ïõ>¾TÊ{*¨Ø-¡tÀÔÿÙPÀúXëj¥N4Ü¦0\n\$ø:H,¦H}°A¾©cè¦*ün?ãë¢\nþÊ;éO\0Zú°v©AB£é`o¡ª8_ÒR--nT#DIs1ÎÝ\0VPM\0Vÿr¬¿0\$Bi`TdX|e\08\\ð7),_º°K¿3(.cÁ\\°d2ÛÎçR<òu¨\\£	4ÐÂNÀ(|gïþ|¡N&,³ñðy¡ÜÍ(À²ß8bï:P½1Y'!Ä \0fxÒËë\0ä1àH[,½>çäé&æT°/a\rLCÁbE¹§	7çô¸ÖbðèkÈÒ|bíç0¹T\"þ.ÀàÅÙ5sËD¹Sgë8¹Rh*4¢}»¦<-9B\$¬ÓÞd9B\$åi«H8cj\\`ð_»æ	É#`ò¢hHÎ¨p \$0`1ïW\n%NZ\\#àÂbÙ¦P%m7l\"¢d¹ô\"P¼!Ø#/ÅÌ¤,Íª¿­J#0µcå]Âà-(ò¹6ð 7l~ð\r\0Bî0À:CAé\\pÏ
[òÎåÐ(Ð®JGå0B\"8¼PB*%Ê<#BF72ÊB¤öéÂ5Bp	t&ð6\0bøñ4<\$í¶¥K¡V\0G	ómY ");}elseif($_GET["file"]=="jush.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("v0F£©ÌÐ==ÎFS	ÐÊ_6MÆ³èèr:ECI´Êo:CXc\ræØJ(:=E¦a28¡xð¸?Ä'i°SANNùðxs
NBáÌVl0çS	ËUl(D|ÒçÊP¦À>Eã©¶yHchäÂ-3Ebå ¸b½ßpEÁpÿ9.Ì~\n?Kb±iw|È`Ç÷d.¼x8EN¦ã!Í23©á\rÑYÌèy6GFmY8o7\n\r³0¤÷\0DbcÓ!¾Q7Ð¨d8Áì~¬N)ùEÐ³`ôNsßð`ÆS)ÐOé·ç/º<xÆ9o»ÔåµÁì3n«®2»!r¼:;ã+Â9CÈ¨®Ã\n<ñ`Èó¯bè\\?`4\r#`È<¯BeãB#¤N Üã\r.D`¬«jê4ÿpéar°øã¢º÷>ò8Ó\$Éc ¾1Éc ¡c êÝê{n7ÀÃ¡AðNÊRLi\r1À¾ø!£(æjÂ´®+Âê62ÀXÊ8+Êâàä.\rÍÎôÎ!x¼åhù'ãâ6Sð\0RïÔôñOÒ\n¼
1(W0
ãÇ7që:NÃE:68n+äÕ´5_(®s \rãê/m6PÔ@ÃEQàÄ9\n¨V-Áó\"¦.:åJÏ8weÎq½|Ø³XÐ]µÝY XÁeåzWâü 7âûZ1íhQfÙãu£jÑ4Z{p\\AUËJ<õkáÁ@¼ÉÃà@}&L7U°wuYhÔ2¸È@ûu  Pà7ËAhèÌò°Þ3ÃêçXEÍ
Z]­lá@MplvÂ)æ ÁÁHWÔy>Y-øYè/«ªÁî hC [*ûFã­#~!Ð`ô\r#0PïCËf ·¶¡îÃ\\î¶É^Ã%B<\\½fÞ±ÅáÐÝã&/¦OðL\\jF¨jZ£1«\\:Æ´>N¹¯XaFÃAÀ³²ðÃØÍf
h{\"s\n×64ÜøÒ
¼?Ä8Ü^p\"ë°ñÈ¸\\Úe(¸PNµìq[g¸Árÿ&Â}PhÊà¡ÀWÙí*Þír_sËPhà¼àÐ\nÛËÃomõ¿¥ÃêÓ#§¡.Á\0@épdW ²\$Òº°QÛ½Tl0 ¾ÃHdHë)ÛÙÀ)PÓÜØHgàýUþªBèe\rt:Õ\0)\"Åtô,´ÛÇ[(DøO\nR8!Æ¬ÖðÜlAüV
¨4 hà£Sq<à@}ÃëÊgK±]®àè]â=90°'åâøwA<ÐÑaÁ~òWæD|A´2ÓXÙU2àéyÅ=¡p)«\0P	sµn
3îrf\0¢F
·ºvÒÌG®ÁI@é%¤+Àö_I`¶ÌôÅ\r. N²ºËKI
[ÊSJò©¾aUfSzû«M§ô%¬·\"Q|9¨Bc§aÁq\0©8#Ò<a³:z1Ufª·>îZ¹l¹ÓÀe5#U@iUGÂ©n¨%Ò°s¦Ë;gxL´pP?BçÊQ\\bÿé¾Q=7:¸¯Ý¡Qº\r:tì¥:y(Å ×\nÛd)¹ÐÒ\nÁX; ìêCaA¬\ráÝñP¨GHù!¡ ¢@È9\n\nAl~H úªV\nsªÉÕ«Æ¯ÕbBr£ªö­²ßû3\rP¿%¢Ñ\r}b/Î\$5§PëCä\"wÌB_çÉUÕgAtë¤ô
å¤
é^QÄåUÉÄÖjÁí Bvhì¡4)¹ã+ª)<j^<Lóà4U* õBg ëÐæè*nÊè-ÿÜõÓ	9O\$´Ø·zyM3\\9Üè.o¶Ìë¸E(iåàÄÓ7	tßé-&¢\nj!\rÀyyàD1gðÒö]«ÜyRÔ7\"ðæ§·~ÀíàÜ)TZ0E9MåYZtXe!Ýf@ç{È¬yl	8;¦R{ë8Ä®ÁeØ+ULñ'F²1ýøæ8PE5-	Ð_!Ô7
ó [2JËÁ;HR²éÇ¹8pç²Ý@£0,Õ®psK0\r¿4¢\$sJ¾Ã4ÉDZ©ÕI¢'\$cLRMpY&ü½Íiçz3GÍzÒJ%ÁÌPÜ-[É/xç³T¾{p¶§zCÖvµ¥Ó:V'\\KJa¨ÃM&º°£Ó¾\"à²eo^Q+h^âÐiTð1ªORäl«,5[Ý\$¹·)¬ôjLÆU`£SË`Z^ð|r½=Ð÷nç»TU	1HykÇt+\0váD¿\r	<àÆìñjG­tÆ*3%kYÜ²T*Ý|\"CülhE§(È\rÃ8r×{Üñ0å²×þÙDÜ_.6Ð¸è;ãürBjO'Û¥¥Ï>\$¤Ô`^6Ì9#¸¨§æ4Xþ¥mh8:êûcþ0ø×;Ø/Ô·¿¹Ø;ä\\'( îtú'+òý¯Ì·°^]­±NÑv¹ç#Ç,ëvð×ÃOÏiÏ©>·Þ<SïA\\\\îµü!Ø3*tl`÷u\0p'è7
Pà9·bs{Àv®{·ü7\"{ÛÆrîaÖ(¿^æ¼ÝE÷úÿë¹gÒÜ/¡øUÄ9g¶î÷/ÈÔ`Ä\nL\n)À(Aúað\" çØ	Á&PøÂ@O\nå¸«0(M&©FJ'Ú! 
0<ïHëîÂçÆù¥*Ì|ìÆ*çOZím*n/bî/ö®Ô¹.ìâ©o\0ÎÊdnÎ)ùi:RÎëP2êmµ\0/vìOX÷ðøFÊ³Ïîè®\"ñ®êöî¸÷0õ0ö¬©í0bËÐgjðð\$ñné0}°	î@ø=MÆ0nîP/pæotì÷°¨ð.ÌÌ½g\0Ð)o\n0È÷\rF¶é b¾i¶Ão}\n°Ì¯
	NQ°'ðxòFaÐJîÎôLõéðÐàÆ\rÀÍ\rÖö0Åñ'ð¬Éd	oepÝ°4DÐÜÊ¦q(~ÀÌ ê\rE°ÛprùQVFHl£Kj¦¿äN&­j!ÍH`_bh\r1 ºn!ÍÉ­z°¡ð¥Í\\«¬\ríÃ`V_kÚÃ\"\\×'V«\0Ê¾`ACúÀ±Ï
¦VÆ`\r%¢ÂÅì¦\rñâk@NÀ°üBñí¯ ·!È\n\0Z6°\$d ,%à%laíH×\n#¢S\$!\$@¶Ý2±I\$r{!±°J2HàZM\\ÉÇhb,'||cj~gÐr
`¼Ä¼º\$ºÄÂ+êA1ðEÇÀÙ <ÊL¨Ñ\$âY%-FDªdLç³ ª\n@bVfè¾;2_(ëôLÄÐ¿Â²<%@Ú,\"êdÄÀNerô\0æ`Ä¤Z¾4Å'ld9-ò#`äóÅ
à¶Öãj6ëÆ£ãv ¶àNÕÍf Ö@Ü&B\$å¶(ðZ&ßó278I à¿àP\rk\\§2`¶\rdLb@Eö2`P( B'ã¶º0²& ô{Â§:®ªdBå1ò^Ø*\r\0c<K|Ý5sZ¾`ºÀÀO3ê5=@å5ÀC>@ÂW*	=\0N<g¿6s67Sm7u?	{<&LÂ.3~DÄê\rÅ¯x¹í),rîinÅ/ åO\0o{0kÎ]3>m1\0I@Ô9T34+Ô@eGFMCÉ\rE3ËEtm!Û#1ÁD @H(Ón ÃÆ<g,V`R]@úÂÇÉ3Cr7s~ÅGIói@\0vÂÓ5\rVß'¬ ¤ Î£PÀÔ\râ\$<bÐ%(DdPWÄîÐÌbØfO æx\0è} Üâlb &vj4µLS¼¨Ö´Ô¶5&dsF Mó4ÌÓ\".HËM0ó1uL³\"ÂÂ/J`ò{Çþ§ÊxÇYu*\"U.I53Q­3Qô»Jg 5
sàú&jÑÕuÙ­ÐªGQMTmGBtl-cù*±þ\r«Z7Ôõó*hs/RUV·ðôªBNË¸ÃóãêÔài¨Lk÷.©´Ätì é¾©
rYiÕé-Sµ3Í\\TëOM^­G>ZQjÔ\"¤¬iÖMsSãS\$Ib	f²âÑuæ¦´å:êSB|i¢ YÂ¦à8	vÊ#éDª4`.Ë^óHÅM_Õ¼uÀUÊz`ZJ	eçºÝ@Ceíëa\"mób6Ô¯JRÂÖT?Ô£XMZÜÍÐÍòpèÒ¶ªQv¯jÿjV¶{¶¼ÅC\rµÕ7TÊª úí5{Pö¿]\rÓ?QàAAÀèÍ2ñ¾ V)Ji£Ü-N99fl JmÍò;u¨@<FþÑ ¾ejÒÄ¦I<+CW@ðçÀ¿ZlÑ1É<2ÅiFý7`KG~L&+NàYtWHé£w	ÖòlÒs'gÉãq+Lézbiz«ÆÊÅ¢Ð.ÐÇzW²Ç ùzdW¦Û÷¹(y)vÝE4,\0Ô\"d¢¤\$Bã{²!)1U5bp#Å}m=×È@wÄ	P\0ä\rì¢·`O|ëÆö	ÉüÅõûYôæJÕöE×ÙOu_§\n`F`È}MÂ.#1á¬fì*´Õ¡µ§  ¿zàucû³ xfÓ8kZR¯s2Ê-§Z2­+Ê·¯(åsUõcDòÑ·ÊìÝX!àÍuø&-vPÐØ±\0'LïX øLÃ¹o	Ýô>¸ÕÓ\r@ÙPõ\rxF×üEÌÈ­ï%Àãì®ü=5NÖ¸?7ùNËÃ
©w`ØhX«98 Ìø¯q¬£zãÏd%6ÌtÍ/
ä¬ëLúÍl¾Ê,ÜKaN~ÏÀÛìú,ÿ'íÇM\rf9£w!x÷x[ÏØG8;xAù-IÌ&5\$D\$ö¼³%
ØxÑ¬ÁÈÂ´ÀÂ]¤õ&o-39ÖLù½zü§y6¹;u¹zZ èÑ8ÿ_Éx\0D?X7«y±OY.#38 ÇeQ¨=Ø*Gwm ³ÚYù ÀÚ]YOY¨F¨íÙ)z#\$e)/z?£z;Ù¬^ÛúFÒZg¤ù Ì÷¥§`^Úe¡­¦º#§Øñ©ú?¸e£M£Ú3uÌå0¹>Ê\"?ö@×Xv\"ç¹¬¦*Ô¢\r6v~ÃOV~&×¨^gü ÄÙ'Îf6:-Z~¹O6;zx²;&!Û+{9M³Ù³d¬ \r,9Öí°ä·WÂÆÝ­:ê\rúÙùã@ç+¢·]Ì-[gÛ[s¶[iÙiÈqyéxé+|7Í{7Ë|w³}¢£EûW°Wk¸|JØ¶åxm¸q xwyj»#³e¼ø(²©¸ÀßÃ¾ò³ {èßÚ y »M»¸´@«æÉ°Y(gÍ-ÿ©º©äí¡¡ØJ(¥ü@ó
;
yÂ#S¼µYÈp@Ï%èsúo9;°ê¿ôõ¤¹+¯Ú	¥;«ÁúZNÙ¯Âº§ k¼V§·u[ñ¼x
|q¤ON?ÉÕ	
`u¡6|­|X¹¤­Ø³|Oìx!ë:¨ÏY]¬¹c¬À\r¹hÍ9nÎÁ¬¬ëÏ8'ùêà Æ\rS.1¿¢USÈ¸
¼XÉ+ËÉz]ÉµÊ¤?©ÊÀCË\r×Ë\\º­¹ø\$Ï`ùÌ)UÌ|Ë¤|Ñ¨x'ÕØÌäÊ<àÌeÎ|êÍ³çâÌéLïÏÝMÎy(Û§ÐlÐº¤O]{Ñ¾×FD®ÕÙ}¡yuÑÄß,XL\\ÆxÆÈ;U×ÉWtvÄ\\OxWJ9È×R5·WiMi[Kf(\0æ¾dÄÒè¿©´\rìMÄáÈÙ7¿;ÈÃÆóÒñçÓ6KÊ¦Iª\rÄÜÃxv\r²V3ÕÛßÉ±.ÌàRùÂþÉá|á¾^2^0ß¾\$ QÍä[ã¿D÷áÜ£å>1'^X~t1\"6Lþ+þ¾AàeáæÞåIç~åâ³â³@ßÕ­õpM>Óm<´ÒSKÊç-HÉÀ¼T76ÙSMfg¨=»ÅGPÊ°PÖ\r¸é>Íö¾¡¥2Sb\$C[Ø×ï(Ä)Þ%Q#G`uð°ÇGwp\rkÞKezhjÓzi(ôèrO«óÄÞÓþØT=·7³òî~ÿ4\"ef~ídôíVÿZ÷U-ëb'VµJ¹Z7ÛöÂ)T£8.<¿RMÿ\$ôÛØ'ßbyï\n5øÝõ_àwñÎ°íUð`eiÞ¿Jb©gðuSÍë?Íå`öáì+¾Ïï Mïgè7`ùïí\0¢_Ô-ûõ_÷?õF°\0õ¸Xå´[²¯J8&~D#Áö{PØô4Ü½ù\"\0ÌÀý§ý@Ò¥\0F ?* ^ñï¹å¯wëÐ:ð¾uàÏ3xKÍ^ów¼¨ß¯y[Ô(æµ#¦/zr_g·æ?¾\0?1wMR&M¿ù?¬StT]Ý´Gõ:I·à¢÷)©Bï vô§½1ç<ôtÈâ6½:W{Àôx:=ÈîÞóø:Â!!\0xÕ£÷q&áè0}z\"]ÄÞoz¥ÒjÃw×ßÊÚÁ6¸ÒJ¢PÛ[\\ }ûª`S\0à¤qHMë/7BP°ÂÄ]FTã8S5±/IÑ\r\n îO¯0aQ\n >Ã2­j
;=Ú¬ÛdA=­p£VL)Xõ\nÂ¦`e\$TÆ¦QJÍó®ælJïÔîÑyIÞ	ä:ÑÄÄBùbPÀûZÍ¸n«ª°ÕU;>_Ñ\n	¾õëÐÌ`ÔuMòÂÖm³ÕóÂLwúB\0\\b8¢MÜ[z&©1ý\0ô	¡\rTÖ× +\\»3ÀPlb4-)%Wd#\nÈårÞåMX\"Ï¡ä(Ei11(b`@fÒ´­SÒójåDbf£}rï¾ýDR1
´bÓAÛïIy\"µWvàÁgC¸IÄJ8z\"P\\i¥\\m~ZR¹¢vî1ZB5IÃi@x·°-uM\njKÕU°h\$oJÏ¤!ÈL\"#p7\0´ P\0D÷\$	 GK4eÔÐ\$\nGä?ù3£EAJF4àIp\0«×F4±²<f@ %q¸<kãw	àLOp\0xÓÇ(	G>ð@¡ØçÆÆ9\0TÀìGB7 - øâG:<Q #Ã¨ÓÇ´û1Ï&tz£á0*J=à'J>ØßÇ8q¡Ð¥ªà	OÀ¢XôF´àQ,ÀÊÐ\"9®pä*ð66A'ý,yIFR³TÏý\"÷HÀR!´j#kyFÀàe¬z£ëéÈðG\0p£aJ`C÷iù@T÷|\nIx£K\"­´*¨Tk\$c³òÆaAh! \"úE\0OdÄSxò\0T	ö\0à!FÜ\nU|#S&		IvL\"
ä\$hÐÈÞEAïN\$%%ù/\nP1²{¤ï) <ð L å-R1¤â6¶<@O*\0J@q¹Ôª#É@Çµ0\$t|]ã`»¡ÄA]èÍìPáCÀp\\pÒ¤\0ÒÅ7°ÄÖ@9©bmr¶oÛC+Ù]¥JrÔfü¶\rì)d¤Ñ­^hßI\\Î. gÊ>¥Í×8ÞÀ'HÀfrJÒ[rçoã¥¯.¹v½ï##yR·+©yËÖ^òùF\0á±]!ÉÒÞ++Ù_Ë,©\0<@M-¤2WòâÙR,ce2Ä*@\0êP Âc°a0Ç\\PÁO ø`I_2Qs\$´w£¿=:Îz\0)Ì`ÌhÂÁç¢\nJ@@Ê«\0ø 6qT¯å4J%N-ºm¤Äåã.É%*cnäËNç6\"\rÍ¸òèûfÒAµÁpõMÛI7\0MÈ>lO4ÅS	7cÍì\"ìß§\0å6îps
ÄÝåy.´ã	ò¦ñRKðPAo1FÂtIÄb*ÉÁ<©ý@¾7ÐËp,ï0NÅ÷: ¨N²m ,xO%è!Úv³¨ gz(ÐM´óÀIÃà	à~yËöh\0U:éØOZyA8<2§²ð¸ÊusÞ~lòÆÎEðO0±0]'
>¡ÝÉ:ÜêÅ;°/ÂwÒôäì'~3GÎ~Ó­äþ§c.	þòvT\0cØt'Ó;P²\$À\$øÐ-s³òe|º!@dÐObwÓæc¢õ'Ó@`P\"xôµèÀ0O5´/|ãU{:b©R\"û0
ÑkÐâ`BD\nkPãc©á4ä^ p6S`Ü\$ëf;Î7µ?lsÅÀßgDÊ'4Xja	A
E%	86b¡:qr\r±]C8ÊcÀF\n'Ñf_9Ã%(¦*~ãiSèÛÉ@(85 TË[þJÚ4I
l=°QÜ\$dÀ®hä@D	-Ù!ü_]ÉÚHÆk6:·Úò\\M-ÌØðò£\rFJ>\n.qeGú5QZ´' É¢½Û0îzPà#Å¤øöÖéràÒít½ÒÏËþ<QT¸£3D\\¹ÄÓpOE¦%)77Wt[ºô@¼\$F)½5qG0«-ÑW´v¢`è°*)RrÕ¨=9qE*K\$g	íA!åPjBT:Kû§!×÷H R0?6¤yA)B@:Q8B+J5U]`Ò¬:£ðå*%Ip9Ìÿ`KcQúQ.B±LtbªyJñEêTé¥õ7ÎöAmÓä¢Ku:ðSji 5.q%LiFºTr¦Ài©ÕKÒ¨z55T%UUÚIÕ¦µÕY\"\nSÕmÑÄx¨½Ch÷NZ¶UZÄ( Bêô\$YËV²ãu@è»¯¢ª|	\$\0ÿ\0 oZw2Òx2ûk\$Á*I6IÒn ¡I,ÆQU4ü\n¢).øQôÖaIá]À èLâh\"øf¢Ó>:Z¥>L¡`nØ¶Õì7VLZu
e¨ëXúèºB¿¬¥Bº¡Z`;®øJ]òÑäS8¼«f \nÚ¶#\$ùjM(¹Þ¡¬a­Gí§Ì+Aý!èxL/\0)	Cö\nñW@é4ºáÛ© ÔRZ®â =Çî8`²8~âhÀìP °\r	°ìD-FyX°+Êf°QSj+Xó|È9-øs¬xØüê+VÉcbpì¿o6HÐq °³ªÈ@.l 8g½YMÖWMPÀªU¡·YLß3PaèH2Ð9©:¶a²`¬Æd\0à&ê²YìÞY0Ù¡¶S-%;/TÝBS³PÔ%fØÚý @ßFí¬(´Ö*Ñq +[Z:ÒQY\0Þ´ëJUYÖ/ý¦pkzÈò,´ðªjÚê¥W°×´e©JµFèýVBIµ\r£ÆpFNÙÖ¶*Õ¨Í3kÚ0§D{Ôø`qÒ²Bqµe¥DcÚÚÔVÃE©¬nñ×äFG E>jîèÐú0g´a|¡Shì7uÂÝ\$ì;aô7&¡ë°R[WXÊØ(qÖ#¬P¹Æä×Ýc8!°H¸àØVX§Ä­jøÊZô¡¥°Q,DUaQ±X0ÕÕ¨ÀÝËGbÁÜlBt9-oZüL÷£¥Â­åpËx6&¯¯MyÔÏsÒ¿èð\"ÕÍèRIWU`c÷°à}l<|Â~Äw\"·ðvI%r+Rà¶\n\\ØùÃÑ][Ñ6&Á¸ÝÈ­ÃaÓºìÅj¹(ÚðTÑÀ·C'
´ '%de,È\nFCÅÑe9C¹NäÐ-6UeÈµýCX¶ÐV±¹ýÜ+ÔR+ºØË3BÜÚJð¢è±æT2 ]ì\0PèaÇt29Ï×(i#aÆ®1\"S
:ö· ÖoF)kÙfôòÄÐª\0ÎÓ¿þÕ,ËÕwêJ@ìÖVòµéq.e}KmZúÛïå¹XnZ{G-»÷ÕZQº¯Ç}Å×¶û6É¸ðµÄ_ØÕà\nÖ@7ß` ÕïC\0]_ ©Êµù¬«ï»}ûGÁWW: fCYk+éÚbÛ¶·¦µ2S,	ÚÞ9\0ï¯+þWÄZ!¯eþ°2ûôàí²k.OcÖ(vÌ®8DeG`ÛÂöL±õ,dË\"CÊÈÖB-Ä°(þp÷íÓp±=àÙü¶!ýkØÒÄ¼ï}(ýÑÊBkr_RîÜ¼08a%ÛL	\0éÀñb¥²ñÅþ@×\"ÑÏr,µ0TÛrV>
ÚÈQÐ\"rÞ÷P&3báP²æ- xÒ±uW~\"ÿ*èNâh%7²µþK¡Y^A÷®úÊCèþ»p£áî\0ð..`cÅæ+ÏâGJ£¤¸H¿À®E
¤¾l@|I#AcâÿD
|+<[c2Ü+*WS<ràãg¸ÛÅ}>iÝ!`f8ñ(c¦èÉQý=fñ\nç2Ñc£h4+q8\na·RãBÜ|°R×ê¿Ýmµ\\qÚõgXÀ Ï0äXä«`nîFîìO pÈîHòCjd¡fµßEuDVbJÉ¦¿å:±ï\\¤!mÉ±?,TIaØaT.L],J??ÏFMct!aÙ§RêFGð!¹Aõ»rr-pX·\r»òC^À7áð&ãRé\0ÎÑf²*àA\nõÕHáã¤yîY=Çúè
l<¹AÄ_¹è	+ÎtAú\0B<Ay
(fy1Îc§O;pèÅá¦`ç4Ð¡Mìà*îfê 5fvy {?©àË:yøÑ^câÍu'8\0±¼Ó±?«gÓ 8BÎ&p9ÖO\"zÇõrs0ºæB!uÍ3f{×\0£:Á\n@\0ÜÀ£pÙÆ6þv.;àú©Êb«Æ«:J>Ëé-ÃBÏhkR`-ÜñÎðawæxEj©
÷Ár8¸\0\\Áïô\\¸Uhm ý(mÕH3Ì´í§SÁæq\0ùNVh³Hy	»5ãMÍe\\g½\nçIP:Sj¦Û¡Ù¶è<¯Ñxó&LÚ¿;nfÍ¶cóq¦\$fð&lïÍþi³
àç0%yÎ¾tì/¹÷gUÌ³¬dï\0e:ÃÌhïZ	Ð^@ç ý1Ïm#ÑNów@ßOððzGÎ\$ò¨¦m6é6}ÙÒÒX'¥I×i\\QºY¸4k-.è:yzÑÈÝH¿¦]ææxåGÏÖ3ü¿M\0£@z7¢³6¦-DO34Þ\0ÎÄùÎ°t\"Î\"vC\"JfÏRÊÔúku3MÎæ~ú¤Ó5V àj/3úÓ@gG}Dé¾ºBÓNq´Ù=]\$é¿IõÓ3¨x=_jXÙ¨fk(C]^jÙMÁÍF«ÕÕ¡àÏ£CzÈÒVÁ=]&\r´A<	æµÂÀÜãç6ÙÔ®¶×´Ý`jk7:gÍî4Õ®áëYZqÖftu|hÈZÒÒ6µ­iã°0 ?éõéª­{-7_:°×ÞtÑ¯íck`YÍØ&´éIõlP`:íô j­{hì=Ðf	àÃ[by¢ÊoÐB°RS¼B6°À^@'4æø1UÛDq}ìÃNÚ(Xô6j}¬cà{@8ãòð,À	ÏPFCàðBà\$mv¨Pæ\"ºÛLöÕCS³]ÝàEÙÞÏlUÑfíwh{o(ä)è\0@*a1GÄ ( D4-cØóP8£N|RâVM¸°×n8G`e}!}¥Çp»Üòý@_¸ÍÑnCtÂ9Ñ\0]»u±î¯s»Ý~èr§»#Cn p;·%>wu¸ÞnÃwû¤Ýê.âà[ÇÝhT÷{¸Ýå¼	ç¨Ë·JðÔÆiJÊ6æO¾=¡ûæßE÷Ù´ImÛïÚV'É¿@â&{ªòö¯µ;íop;^Ø6Å¶@2ç¯lûÔÞNï·ºMÉ¿r_Ü°ËÃ´` ì( yß6ç7¹ýëîÇ7/Ápðe>|ßà	ø=½]Ðocûá&åxNm£ç»¬ào·GÃN	p»x¨Ã½Ýðy\\3àøÂ'ÖI`râG÷]Ä¾ñ7\\7Ú49¡]Å^p{<Zá·¸q4uÎ|ÕÛQÛàõpýi\$¶@oxñ_<Àæ9pBU\"\0005 iä×»¸Cûp´\nôi@[ãÆ4¼jÐ6bæP\0&F2~Àù£¼ïU&}¾½¿É	ÌDa<æzx¶k£=ùñ°r3éË(l_
FeF4ä1K	\\Óldî	ä1H\r½ùp!%bGæXfÌÀ'\0ÈØ	'6Àps_á\$?0\0~p(H\n1
W:9ÕÍ¢¯`æ:hÇBègBk©ÆpÄÆót¼ìEBI@<ò%Ã¸Àù` êyd\\Y@DP?|+!áWÀø.:Lev,Ð>qóAÈçº:îbYé@8d>r/)ÂBç4ÀÐÎ(·`|é¸:t±!«Á¨?<¯@ø«/¥ S¯P\0Âà>\\æâ |é3ï:VÑuw¥ëçx°(®²4ÇZjD^´¥¦Lý'¼ìÄC[×'ú°§®éjÂº[ E¸ó uã°{KZ[s6S1Ìz%1õc£B4B\n3M`0§;çòÌÂ3Ð.&?¡ê!YAÀI,)ðålW['ÆÊIÂTjè>F©¼÷S§ BÐ±Pá»caþÇuï¢NÝÏÀøHÔ	LSôî0ÕY`ÂÆÈ\"il\rçB²ëã/ôãø%PÏÝNGô0JÆX\n?aë!Ï3@MæF&Ã³Öþ¿,°\"îèlbô:KJ\rï`k_êb÷üAáÙÄ¯Ìü1ÑI,ÅÝîü;B,×:ó¾ìY%¼J #v'{ßÑÀã	wx:\ni°¶³}cÀ°eN®Ñï`!wÆ\0ÄBRU#ØSý!à<`&v¬<¾&íqOÒ+Î£¥sfL9QÒBÊÉóäbÓà_+ï«*Su>%0©
8@l±?L1po.ÄC&½íÉ BÀÊqh¦ó­Áz\0±`1á_9ð\"è!\$ø¶~~-±.¼*3r?øÃ²Àds\0ÌõÈ>z\nÈ\00 1Ä~ôJð³ðú|SÞô k7gé\0úKÔ d¶ÙaÉîPgº%ãwDôêzmÒûÈõ·)¿ñjÛ×Âÿ`k»ÒQà^ÃÎ1üº+Îå>/wbüGwOkÃÞÓ_Ù'¬-CJ¸å7&¨¢ºðEñ\0L\r>!ÏqÌîÒ7ÝÁ­õo`9O`àö+!}÷P~EåNÈcöQ)ìá#ûï#åòìÌÑøÀ¡¯èJñÄz_u{³ÛK%\0=óáOX«ß¶Cù>\n²
|wá?ÆFÅêÕaÏ©UÙåÖb	N¥YïÉh½»é/úû)ÞGÎ2ü¢K|ã±y/\0éä¿Z{éßP÷YG¤;õ?Z}T!Þ0Õ=mN¯«úÃfØ\"%4aö\"!Þúºµ\0çõï©}»î[òçÜ¾³ëbU}»ÚmõÖ2± 
ö/tþî%#.ÑØÄÿseBÿp&}[ËÇ7ã<aùKýïñ8æúP\0ó¡g¼ò?ù,Ö\0ßßr, >¿ýWÓþïù/Öþ[qýk~®CÓ4ÛûG¯:X÷Gúr\0Ééâ¯÷L%VFLUc¯Þä¢þHÿybPÚ'#ÿ×	\0Ð¿ýÏì¹`9Ø9¿~ïò_¼¬0qä5K-ÙE0àbôÏ­ü¡t`lmêíËÿbàÆ; ,= 'S.bÊçS¾øCcêëÊAR,íÆX@à'
8Z0&ìXnc<<È£ð3\0(ü+*À3·@&\r¸+Ð@h, öò\$O¸\0Åèt+>¬¢bªÊ°\r£><]#õ%;Nìsó®Å¢Êð*»ïcû0-@®ªLì >½Yp#Ð-f0îÃÊ±aª,>»Ü`ÆÅàPà:9o·ð°ov¹R)e\0Ú¢\\²°Áµ\nr{Ã®XÒøÎ:A*ÛÇ.Dõº7»¼ò#,ûN¸\rEÔ÷hQK2»Ý©¥½zÀ>P@°°¦	T<ÒÊ=¡:òÀ°XÁGJ<°GAfõ&×A^pã`©ÀÐ{ûÔ0`¼:ûð);U !Ðe\0î£½Ïcp\r³ ¾:(ø@
%2	S¯\$Y«Ý3é¯hCÖì:O#ÏÁLóï/éç¬k,¯Kåoo7¥BD0{¡jó ìj&X2Ú«{¯}RÏx¤ÂvÁä÷Ø£À9Aë¸¶¾0;0õáà-5/<Üç° ¾NÜ8E¯Ç	+ãÐ
ÂPd¡;ªÃÀ*n¼&²8/jX°\r>	PÏW>KàO¢VÄ/¬U\n<°¥\0Ù\nIk@ºã¦[àÈÏ¦Â²#?Ùã%ñèË.\0001\0ø¡kè`1T· ©¾ëÉl¼À£îÅp®¢°Á¤³¬³
< .£>íØ5Ð\0ä»	O¬>k@Bn¾<\"i%>ºzÄçñáºÇ3ÙP!ð\rÀ\"¬ã¬\r >adàöó¢U?ÚÇ3P×Áj3£ä°>;Óä¡¿>t6Ë2ä[ÂðÞ¾M\r >°º\0äìP®·Bè«Oe*Rn¬§y;« 8\0ÈËÕoæ½0ýÓøiÂøþ3Ê2@Êýà£î¯?xô[÷ÛÃLÿa¯w\ns÷A²¿x\r[Ñaª6Âclc=¶Ê¼X0§z/>+ªøW[´o2Âø)eî2þHQPéDYzG4#YD
ö
ºp)	ºHúp&â4*@/:	áT	­¦aH5ëh.A>ï`;.­îYÁa	Âòút/ =3
°BnhD?(\n!ÄBús\0ØÌDÑ&DJ)\0jÅQÄyhDh(ôK/!Ð>®h,=Ûõ±ãtJ+¡Sõ±,\"M¸Ä¿´NÑ1¿[;øÐ¢¼+õ±#<ìI¤ZÄP)ÄáLJñDéìP1\$Äîõ¼Q>dO¼vé#/mh8881N:øZ0ZÁèT BóCÇq3%°¤@¡\0Øï\"ñXD	à3\0!\\ì8#h¼vìibÏT!dªÎüV\\2óÀSëÅÅ\nA+Í½pxÈiD(ìº(à<*öÚ+ÅÕE·ÌT®¾ BèS·CÈ¿T´æÙÄ eAï\"á|©u¼v8ÄT\0002@8D^ooø÷|Nùô¥ÊJ8[¬Ï3ÄÂõîJz×³WL\0¶\0È8×:y,Ï6&@À E£Ê¯Ýh;¼!f¼.Bþ;:ÃÊÎ[Z3¥Â«ðn»ìëÈ­éA¨ÓqP4,óºXc8^»Ä`×ôl.®üº¢S±hÞ°O+ª%P#Î¡\n?ÛÜIB½ÊeËO\\]ÎÂ6ö#û¦Û½Ø(!c) Nõ¸ºÑ?EØB##D íDdo½åPAª\0:ÜnÂÆ`  ÚèQ³>!\r6¨\0V%cbHF×)¤m&\0B¨2Ií5Ù#]úØD>¬ì3<\n:MLðÉ9CñÊ0ãë\0¨(á©H\nþ¦ºM\"GR\n@éø`[Ãó\ni*\0ð)üìu©)¤«Hp\0N	À\"®N:9qÛ.\r!´JÖÔ{,Û'æÙ4
BúÇlqÅ¨Xc«Â4ßN1É¨5«WmÇ3\nÁF`­'Òxà&>z>N¬\$4?óÃïÂ(\nì¨>à	ëÏµPÔ!CqÍ¼p­qGLqqöG²yÍH.«^à\0zÕ\$AT9FsÐ
¢D{ía§øcc_GÈz)ó³ Ü}QÆÅhóÌHBÖ¸<y!L­Û!\\²î ø'H(ä-µ\"in]Ä³­\\¨!Ú`MH,gÈí»*ÒKfë*\0ò>Â6¶à6ÈÖ2óhJæ7Ù{nqÂ8àßôÉHÕ#cHã#\r:¶7Ê8àÜZ²ZrD£þß²`rG\0äl\n®Ii\0<±äãô\0Lg
~¨ÃE¬Û\$¹ÒP\$@ÒPÆ¼T03ÉHGH±lÉQ%*\"N?ë%	Î\nñCrWÉC\$¬pñ%uR`ÀË%³òR\$<`ÖIfxª¯÷\$/\$¥\$O
(Ë\0æË\0RY*Ù/	ê\rÜC9ï&hhá=IÓ'\$RRIÇ'\\a=EÔòuÂ·'ÌwIå'Tüÿ©¾ãK9%d¢´·!üÀÊÊÀÒj
ì¡íÓÊ&ÐævÌ²\\=<,Eù`ÛYÁò\\²¤*b0>²r®à,dpdÌ0DD Ì`â,T ­1Ý% P¤/ø\ròb¹(£õJÑèÍîT0ò``Æ¾ÞèíóJt©©Ê((dÇÊªáh+ <É+H%iÈô²#´`­ ÚÊÑ'ô£B>t¯JZ\\`<Jç+hR·ÊÔ8îàhR±,J]gò¨Iäè0\n%J¹*ÐY²¯£JwD°&ÊD±®ÉÐªR§K\"ß1Qò¨Ë ²AJKC,ä´mV»²ÊÙ-±òÏKI*±r¨\0ÇL³\"ÆKb(üªóJ:qKr·dùÊ-)ÁË#Ô¸²Þ¸[ºA»@.[Ò¨Ê¼ß4º¡¯.1ò®J½.Ì®¦u#JÁg\0Æãò§£<Ë&ðK¤+½	M?Í/d£Ê%'/¿2YÈä>­\$Í¬lº\0©+øÁ}-tºÍ
*êRä\$ßòÌK».´Á­óJHûÊ2\r¿B½(PÍÓÌ6\"ünf\0#Ð ®Í%\$ÄÊ[\nÐnoLJ°ÅÓÂe'<¯ó
1KíÁyÌY1¤Çs¥0À&zLf#üÆ³/%y-²Ë£3-ÂÍK£L¶ÎÉ×0³ë¸[,¤ËÌµ,±«§0±Ó(.DÀ¡@ÏÁ2ïL+.|£÷¤É2è(³L¥*´¹S:\0Ù3´ÌíóG3lÌÁaËl³@L³3z4­Ç½%ÌÍLÝ3»
³¼!033=Lù4|È¡à+\"°Êé4´Ëå7Ë,\$¬SPM\\±Î?JYÌ¡¹½+(Âa=K¨ì4¤³CÌ¤<Ð
=\$,»³UJ]5h³W &tÖI%é5¬Ò³\\M38g¢Í5HN?W1H±^ÊÙÔ¸YÍØ Í.N3M4Ã
³`i/P7ÖdM>d¯/LRÎÜâ=K60>¯I\0[ðõ\0ßÍ\r2ôÔòZ@Ï1Û2ÿ°7È9äFG+ä¯ÒÅ\r)àhQtL}8\$ÊBeC#Ár*HÈÛ«-Hý/ØËÒ6Èß\$øRC9ÂØ¨!Å7ük/PË0Xr5¡3D¼<TÁÔq¯Kô©³nÎH§<µFÿ:1SLÎrÀ%(ÿu)¸Xr1ÑnJÃIÌ´S£\$\$é.Î9Ôé²IÎÒ3 ¨LÃl¯Î9äÅCN #Ô¡ó\$µ/ÔésÉ9«@6Êt²®Nñ9¼´·NÉ:¹Â¡7ó Ó¬Í:DáÓÁM)<#ÓÃM}+ñ2ÎNþñ²O&ð¢JNy*òòÙ¸[;ñóÎO\"mÚÄóÅMõ<c Â´°±8¬K²,´ÓÇN£=07s×JE=Tá³ÆO<Ôô³£Jé=DÓ:ÏC<ÌàË=äèó®KÊ»Ì³ÈL3¬÷­LTÐ3ÊS,.¨ÿÏq-ñsç7Í>?ó¼7O;Ü `ùOA9´óñÏ»\$üÁOÑ;ìý`9ÎnÇIAxpÜöE=O¹<ü²5ÏÎý2¸O?d´´`NòiOÿ>þ3½P	?¤òÔOmúSðMôË¬·=¹(ãdã¤AÈ­9\0í#üä²@­9DÁÉ&Üýò? Ði9»\nà/ñAÝóòÈ­A¤ýSËPo?kuN5¨~4ÜãÆ6Ø=ò*@(®N\0\\ÛdGåüp#è¤> 0À«\$24z )À`ÂWð +\080£è¦ ¤ªäz\"TÐä0Ô:\0\ne \$rM=¡r\n²NP÷Cmt80ðú #¤ØJ= &ÐÆ3\0*Bú6\"éèú#Ì>	 (Q\nðê´8Ñ1C\rt2EC\n`(Çx?j8N¹\0¨È[À¤QN>£©à'\0¬x	cêªð\nÉ3×Chü`&\0²Ð´8Ñ\0ø\näµ¦úO`/¢A`#ÐìXcèÐÏD ÿtR\n>¼ÔdÑBòD´LÐÄÌõäÐÍDt4ÐÖ jpµGAoQoG8,-sÑÖðÔK#);§E5´TQÑGÐ4Ao\0 >ðtMÓD8yRG@'PõC°	ô<PõCå\"K\0xüÔ~\0ªei9Ðìv))ÑµGb6±H\r48Ñ@M:³FØtQÒ!H{R} ôURpÍÔO\0¥I
t8¤ØðûÎÇ[D4FÑD#ÊÑ+D½'ôMÊÀ>RgIÕ´QïJ¨UÒ)EmàüTZ­Eµ'ãê£iEÝ´£ÒqFzAªº>ý)TQ3HÅ#TLÒqIjNT½¼
&CøÒhX\nTÑÙK\0000´5¢JHÑ\0FE@'ÑFp´hS5F\"ÎoÑ®e%aoS E)  DU «QFmÎÑ£M´ÑÑ²e(tnÒ U1Ü£~>\$ñßÇ­(hÕÇGüy`«\0ê 	íGò3Ô5Sp(ýõPãGí\$#¤¨	©©N¨\nôV\$ö]ÔPÖ=\"RÓ¨?Lzt·1L\$\0ÔøG~å ,KNý=ëÒGMÅ
¤NS)ÑáO]:ÔS}Ý81àRGe@Cí\0«OPðSõNÍ1ôÝT!P@ÑÝSðÿÕSG`\nÉ:P°j7R @3üÑ\n üã÷â£DÓ æúLÈÏ¼ 	èë\0ùQ5ôµ©CPúµSMP´v4º?h	hëTD0úÑÖàõ>&ÒITxôO¼?@U¤÷R8@%ÔõK§NåKãóRyE­E#ýù @ýÃøä%Là«Q«Q¨µ£ª?N5\0¥R\0úÔTëFåÔRSí!oTEÂC(Ï¶ÈýÄµ\0?3iîSS@U÷QeMµ	KØ\n4PÕCeS\0NC«P­Oõ! \"RTûõS¥NÕÁU5OU>UiIÕPU#UnKPô£UYTè*ÕC«U¥/\0+º¸Å)ÈÚ:ReAà\$\0ø¤xòÇWDº3Ãêà`üÚüçU5ÒIHUYô:°P	õe\0MJiµÃýQø>õ@«T±C{ÕuÑì?Õ^µv\0WR]U}Cöê1-5+Uä?í\rõW<¸?5JU-SXüÕLÔß \\tÕ?ÒsMÕbÕVÜt§T>ÂMU+Ö	EÅcÏÔ9Nm\rRÇCý8SÇX'RÒéXjCI#G|¥!QÙGhtðQ¸ý )<¹YÐ*ÔÐRmX0üôö½M£õOQßYýhÀ«ßduÕ¤ÕZ(ýAo#¥NlyN¬VZ9IÕºM¦V«ZuOÕ
TÕTÅEÕÖ·SÍeµµÖÊ\nµXµªSÛQERµ³ÔÙ[MF±VçO=/õ­¨>õgÕ¹TíVoUT³ZN*T\\*ÃïÐ×S-pµSÕÃVÕqÒM(ÏQ=\\-UUUV­CÄ×ZØ\nuV\$?M@UÎWJ\r\rUÐÔ\\å'U×W]
W£W8ºN '#h=oCóÐýF(üé:9ÕYu¤÷V-UÓ9]ÒC©:U¿\\\nµqWà(TT?5Páª\$ R3ÕâºC}`>\0®E]#Rêà	ÿ#R¥)²W:`#óGõ)4RÀý;õáViD%8À)Ç^¥Qõé#h	´HÂX	þ\$Nýx´#i xûÔXRõ'Ô9`m\\©¨\nEÀ¦Q±`¥bu@×ñN¥dT×#YYýµ®GV]j5#?L¤xt/#¬å#é
½O­PÕëQæ¢6££Ï^í ðüÖØM\\R5t´Ópà*XV\"WÅD	oRALm\rdGN	ÕÖÀú6p\$PåºE5Ôý©Tx\n+C[¨ôVýÖ8UDu}Ø»F\$.ªËQ-;4È±NX\n.XñbÍ\0¯b¥)#­NýG4KØÐZS^×´M¶8Øód­\"C¬>ÅÕdHe\nöY8¥Ñ.ê ú°ÒFúD½W1cZ6QâKHü@*\0¿^¸úÖ\\QßF4U3Y|=Ó¤éEÔÛ¤¦?-47YPmhYw_\rVe×±M±ßÙe(0¶ÔFÕ\r !ÒPUIuÑ7QåCèÑ?0ÿµÝgu\rqà¤§Y-Qèó°èú=g\0
\0M#÷U×S5Zt®Öae^\$>²ArV¯_\r;tî¬¨HW©Zí@HÕØhzDèÚ\0«S2Jµ HIåO 'ÇeígÉ6¹[µR<¸?È /ÒKM¤öØ\n>½¤HáZ!iö¤TX6Ò×iºC !Óg½à ÒG }Q6Ñ4>äwà!ÚC}§VBÖ>åªUQÚjª8cïUTàû'<>ÈýõôHC]¨VÑ7jj3v¥¤å`0ÃèÈ23ö°Ðòxû@Uk \n:Si5Õ#Yì-wîÕàéM?céÒMQÅGQÕÑb`ò\0@õËÒ§\0M¥à)ZrKXûÖÙWl­²öÍlå³TM×D\r4QsS¥40ÑsQÌõmYãhd¶ÂC`{VgEÈ\n»XkÕà'Óè,4ú¼¹^í¢6Æ#<4éNXnM):¹·OM_6dæõ¸Ãõ[\"KU²nÖ?l´x\0&\0¿R56T~> ôÕ¸?Jn ÏZ/iÒ6ôÎÚglÍ¦ÖUÛáF}´.£¼JLöCTbM4ÍÓcLõTjSD}JtZªµÇ:±L­´d:EzÊ¤ª>ÖV\$2>­µ¢[ãpâ6öÔR9uêW.?1®£RHuèÛR¸?58Ô®¤íDÝÆu£çpûcìZà?r×» Eaf°}5wY´ëåÏÒêÅWwT[Sp7'Ô_aEk \"[/i¥¿#ÿ\$;m
fØ£WOüôÔFò\r%\$Íju-t#<Å!·\n:«KEA£íÒÑ]À\nUæQ­KEÀ #¿Xå¨÷5[Ê>`/£ÍDµÊÖ­VEpà)åI%ÏqßÜûníx):¤§le¢´Õ[eÕ\\eV[j
£éÑ7 -+ÖßGWEwt¯WkEÅ~uìQ/mõ#ÔW`ýyuÇ£DÝAö'×±\r±ÕOD )ZM^³u-|v8]g½hö×ÅLàW\0øÈû6ËX=YÔd½Q­7ÏÏ9£çÍ²r <ÃÖêD³ºB`c 9¿È`D¬=wx©I%ä,á¬è²àêj[ÑÖíßOÿ´ ``Å|¸òòÆÞø¤¼í.Ì	AOÀÄ	·@å@ 0h2í\\âÐM{eã9^>ôâ@7\0òôËWò\$,íÉÅ¡@ØÒâå×w^fmå,\0ÏyD,×^X.¯Ö©7ã·Ã×2ÝÅf;¥6«\n¤
^zC©×§mz
én^ô&LFFê,°ö[¥eÈõaXy9h!:zÍ9còQ9bÅ !¦µGw_WÉg¥9©ÓS+t®ÚápÝtÉ\nm+ÞÙ_ð	¡ª\\¼k5£ÒÜ]Æ4_h9 Ù÷N
Å]%|¥7ËÖ];ï|ñµ ßXýÍ9Õ|åñ×ÌG¢¨[×Ô\0}UñçßMCI:ÒqO¨VÔa\0\rñRÍ6ÏÃ\0ø@H¢ÅP+rìS¤Wãèøp7äI~p/ø HÏ^Ýê²ü¤¬E§-%û¥Ì»Í&.ÎÄ+¸JÑ;:³¶«!ýÐNð	Æ~öª/WÄÂ!BèL+Â\$ðíq§=ü¿+Ñ`/Æe\\±ÒÏxÀpElpSÂJSÝ¢½ö6à_¹(Å¯©Äéb\\OÆÊ&ì¼\\Ð59\0ûÂ9nñøD¸{¡\$á¸Kv2	d]èv
CÕþÅÕ?tf|WÜ:£Ô¨p&¿àLnÎè³î{;çÚGR9øT.y¹üïI8¹´\rl° ú	Tè n3¼öðT.9´è3 ¼Zès¡¯ÑÒGñþ:	0£¦£zè­Ý.]ÀçÄ£Q?àgT»%ñÕxÕ.ÔÇn<ì£-â8BË³,BòìrgQþ¢íßóÉ`Úá2é:îµ½{
gëÄsøgóZ¿
 ×<æ×w{¦bU9	`5`4\0BxMpð8qnahé@Ø¼í-â(>S|0®
¾¥
3á8h\0Ñ«µCÔzLQ@¶\n?¸`AÀ >2Â,÷áñN&«xl8sah1è|BÉDxBÞ#VV×`Wâa'@¬	X_?\nì¾  _â. ØP¼r2®bUarÀI¸~áñ
Sàú\0×
\" 2ÖþÀ>b;
vPh{[°7a`Ë\0êË²jo~·ûþvÍÙ|fv4[½\$¶«{ó¯P\rvæBKGbpëÈÅøO5Ý 2\0j÷ÙLî)ÇmáÈV¡ejBB.'R{C¤ïV'`Ø %­ÇÐ\$ Oå\0`«4 ÌNò>;4£³¢/ÌÏ´À*Âø\\5ÅÁ!û`X*Þ%îÄNÍ3SõAMôþËÆ,þ1¬²®í\\¯²caÏ§ ³ù@Ø¬Ë¸B/¬Íø0`óv2ï¡§`hDÅJO\$ç
@p!9!¥\n1ø7pB,>8F4¯åf Ï:ñ7Âî3£3
¿à°T8=+~Øn«Îâ\\Äe¸<br·þ øFØ²° ¹C¡N:c:Ôl<\rã\\3à>ñÀ6ONnä!;áñ@twë^FéLà;×º,^aÈ\ra\"ÞÀÚ®'ú:vàJe4Ã×;ñ_d\r4\rÌ:ÛüÀ¬Sà2[cXÿÊ¦Pl\$¹Þ£iwåd#B bÎ×¤õ`:Ï~ <\0Ñ2Ù·RÂÆPÈ\r¸J8D¡t@ìEè\0\rÍ6öóäÞ7½äYÏ£ú\"åäÀ\rü¦À3¡.+«z3±;_ÊvLÝäÓwJ¿94ÀIJa,A¦ñ¯;s?ÖN\nR!§ÝOm
sÈ_æà-zÛ­wÛzÜ­7¡ÍÅzî÷Mo¿¥æ\0¢aÅÝ¹4å8èPfñYå?òieBÎSà1\0ÉjDTeK®UYSå?66R	¦cõ6Ry[c÷°5Ù]BÍÖRù_eA)&ù[åXYRW6VYaeUfYeåwU¹båwEë°Ê;z¤^W«9ä×§äÝõë\0<Þèeê9SåÎ¤daª	_-îáL×8Ç
ÍQöèTH[!<p\0£Py5|#êP³	×9và2Â|Ç¸áfaoá,j8×\$A@kñ¿aË½bócñÈf4!4¨¶cr,;æöbÆ=Â;\0°øÅº
cdÃæX¾bìxaRx0Aãh£+wðxN[ÜB·pÚ¿wTÀ8T%Ml2à½¡ð}¡Ès.kY0\$/èfU=þØsgKÃ¡M õ?ÿç`4c.Ôø!¡&åg°ûfà/þf1=¯V AE<#Ì¹¡f\n») ëNpòã`.\"\"»Aç¤ãüq¸X Ù¬:aÉ8¹f¯VsóGÞr:æVÞÆcÔgVlg=`ãWËýyÒgUÀËªáº¼îeT= ãáÆx 0â M¼@»Â%Îºb½þwÆfÛÙOøç­Ü*0¯
®|tá°%±PÈÍpæúgKù¬?pô@JÀ<BÙ#­`1î9þ2çg¶!3~ØÜçînläÅfØVhù¬.Ñà
aCÑù?³û-à168>A¤aÈ\r¦y0 ÖiJ«} à¹© Ðz:\r¡)Sþ¡@¢åh@äöY¹ã´mCEg¡cyÏ<õàÍh@¼@«zh<WÙÄ`Â¨±:zOãÎÖ\rÍêW«°V08Ùf7(Gy²`St#ïf#²C(9ÈÂØdùææ8T:¯»0ºè qµ  79·á£phAgÜ6.ãæ7Frbä ÈjèA5î
á¡a1úÚhZCh:%¹ÎgU¢ðD9ÖÅÉ×¹Ïé0~vTi;VvSwØ\rÎ?àÇf²£
ÿ¥nÏiYìaº¬3 Î9Õ,\nÃr,/,@.:èY>&
FÑ)ú¶}b£èiOÝiæ:dèAnc=¤L9Oh{¦ 8hY.ÙÀ®¾®
üÇ\r¬Ö£Àé1Q¯U	ChôeÿO°+2oÌÎìÞN÷§øzpè¢(þ]Óhå¢Z|¬O¡cÑzDáþ;õT\0j¡\0
8#>ÎÁ=bZ8Fjóìé;íÞºTé
¡w®Í)¦ýøN`æë¨¤Ã
B{ûz\ró¡cÓè|dTGi/ûú!iÊ0±¼ø'`Z:CHï(8Âê`V¥Úãöª\0Üê§©£WïßÇªÕzgG¾
½²-[ÃÐ	iêN\rqºé«no	Æ¥fEJý¡apb¹ê}6£
Õ=o¤,tèY+ö®EC\rÖPx4=¼¾Ù@¦.F£[¡zqçÜèX6:FG¨ #°û\$@&­ab¤þhE:²å¬ä`¶S­11g1©þ2uhY¬_:Bß¡dcï*ÿ­\0úÆFYF:Ë£ªnØÌ=Û¨H*Z¼Mhk/ë¡zÙ¹ï´]Áh@ôæ©Øã1\0øZKù¢ëÎÆè^+º,vfós®>¤Oã|èÀÊsÃ\0Ö5öXéîÑ¯F÷n¿Ar]|ÏIi4è
þ ØÂC° h@Ø¹´cß¥¨6smOÃågX¬V2¦6g?~ÖÃYÕÑ°súcl \\R\0¨cA+1°ùÌé\n(ÑúÃÌ^368cz:=z÷(äø ;è£¨ñsüF¶@`;ì,>yTßï&d½L×ÿ%Ò-ëCHL8\rÇbû°°£úMj]4Ym9üÛüÐZÚBøïP}<ûàX²¯Ì¥á+gÅ^ØMÞ + B_Fd¬XølówÈ~î\râ½è\":ÔêqA1X¾ìæ²Ðø¯3ÖÎEáh±4ßZZÂó¸& 
ææ1~!Nfã´öo\nMeÜà¬îëXIÎíG@V*X¯;µY5{V\nè»ÏTéz\rF 3}m¶Ôp1í[>©tèe¶wæë@VÖz#2Äï	iôôÎ{ã9pÌ»ghæ+[elU¦ÛAßÙ¶Ó¼i1Ä!¾ommµ*Kàê}¶°!íÆ³í¡®Ý{me·f`mèCÛz=nÞ:}g° TmLu1FÜÚ}=8¸ZáíèOÛmFFMf¤
OOðîáÀèøß/¼éõ¸ÞåþVoqj³²èn!+½òµüZ¨ËI¹.Ì9!nG¹\\3a¹~
O+Îå::îK@\nÚ@¤Hph´\\BÄõdmfvCèÓPÛ\" æ½Û.nW&ên¢øHYþ+\r¶Äz÷i>MfqÛ¤î­ºùÝQc[­H+æÀo¤Ñ*ú1'¤÷#ÄEwD_Xí)>Ðs£-~\rT=½£à÷à- íy§m§¹æð{hóÌjÚMè)^¹ïÀ'@Vå¡+iÈîÎòåµÉ;F D[Îb!¼¾´B	¦¤:MPîóÛ­oC¼vAE?éC²IiYÍ#þp¶P\$kâJÞq½.É07þöxl¦sC|ï½¾bo2äXª>Mô\rl&»Ç:2ã~ÛÑcQ²îò²æoÑÞdá-þèUÜRoYnM;n©#ß\0P¾fðÚPo×¿(CÚv<Ê¬ø[òoÛ¸û×fÑ¿ÖüÁ;ßáºõ[úY.o®Up¿®pUø. ©B!'\0òã<Tñ:1±À¾ ã¤î<ðnîF³ðI¢Ç´V0ÊÇRO8wøÎ,aFú¼É¥¹[´Î
ñYOù«/\0Ùox÷ÇQð?§°:ÙëÆè`h@:«¿öÑ/Mím¼x:Û°c1¤Öàû¯ív²;è^æØÆ@®õ@£úð½ÂÇ\n{¯¼Âîà;ç´B¼í¸8º gåä\\*gåyC)ÛE^ýOÄh	¡³¦Au>Æèü@àDÌYæ¼íâ`o»<>ÀpÄ·q,Y1Q¨Áß¸/qg\0+\0âæåDÿç?¶þ î©Úßîk:ù\$©û¬í×¥6~I¥
=@íÑ!¾ùvÚzOñ²â+ÍõÆ9Çi³¼aïðêû
gòðôî¿¹ÿ?0Gnq²]{Ò¸,FáÃøO¡âÞ <_>f+¢,ñÌ	»Ôñ±&ôðíÂ·¼yêÇ©Oü:¬UÂ¯LÆ\nÃÃºI:2³¿-;_Ä¢È|%éå´¿!Îõf\$¦Xr\"KniîñÀÐ\$8#g¤t-r@LÓåè@S£<rN\nD/rLdQkà£ªõÄîeðåäãÐ­åø\n=4)BË×ôÌZ-|Hb¡HkÊ*	ÖQ!Ð'êG Ybt!¿Ê(n,ìP³OfqÑ+XY±ÿë\"b F6ÖÌr fò\"ÒÜ³!N¡ó^¼¦r±B_(í\"¨KÊ_-<µò *Q÷ò¨Ù/,)H\0²rç\"z2(¹tÙ.F>#3â®Ø¦268shÙ þ¨ÆI1Sn20¶çÊ-«4ÚÇ2As(¬4ä¼Ë¶\0ÆÝ#årþK'ËÍ·G'7&\n>xßüÜJØGO8,ó
0¼âù8ÑÓ\0óW9ÝI?:3nº\r-w:³ÂÌÅ×;3È!Ï;³ÜêZRM+>ÖÜðÊé0/=R
'1Ï4Õ8ûÑÏmÿ%È¥}Ï9»;=ÏnQöã=ÏhhLõ·GÏkWÎ\rô	%Ø4ÒsñÎJ3sÛ4@U%\$ÜÑN;Ì?4­»óNÚÏ2|ÊóZÚ3Øh\0Ï35^Àxi2d\r|ûM·Ê£bh|Ý#vÇ` \0ê®äàû\$\r2h#ú¤?³I\n¼+o-?6`á¹½¿.\$µøKY%ØÂJ?¦c°RN#K:°KáELÁ>:Á¥@ãjPÌn_t&slm'æÐ©É¸Ó²½ã;6ÛHU5#ìQ7U ýWYÜU bNµWû_ûª©;TCø[Ý<Ú>ÅÇõWýCUÔ6X#`MI:tùÓµö	u#`­fu«\$«t­öXó`f<Ô;båghöÑÕ9×7ØS58õ¬Ý#^-õ\0êÀúîÕ¹R*Ö'£¨(õðõqZå££êX¹QÝFUvÔW GWíñÓTêÇWô~Ú­^§WöÄÁÕýJ=_ØbmÖÝbV\\l·/ÚMÕÿTmTOXuÊ=_ýITvvua\rL_ÕqR/]]mÒsu=H=uÑg o\\UÕ
gM×	XVU À%õhý¡53U\\=¡öQßØM¹v¡gåmàõue¡ÙûhÿbÝMÝGCeO5®ÔÖO5
ÔYÙi=eÕ	GTURvOa°*ÝivWXJ5<õ¯bu ]×Öðúµ<õÃÙÕ\$u3v#×'eöuÑR5mvD5.võW=U_å(´\\VØÏ_<õ÷SÍn)Ü1M%QháZT
f5EÕ'ÕÍW½vÅUmiÕUÔÕ]aW©U§dRváÙ-YUZuÙUVUiRVõ³ÓÇ[£íZMU§\\=Âv{ÛXýµ¼wQ÷huHvÇ×gqÝ´w!Úoqt¢U{TGqý{÷#^G_ubQêåi9Qb>ÚNUdº±k
½5hPÙmu[\0¦êÅ_¶é[õY-ðô÷rõÈÕ(ÖCrMeýJõ!h?QrX3 xÿÈÏ#÷xÖ<Û{u5~íÑ-ÝuëYyQ\r-î\0ùuÕ£uuÙ¿pUÚ
)PåÜ\r<u«S0ÝÉw¹ß-iÝóÔ!ÌÖøB÷áÆd]ùèÅÔÆEêðvlmQÝ6k¼ÒJ´wí¦ÄØÃãED¶UÙRev:XßcØNW}`-¨tÓH#ebº±uãó	~B7ê ?	OPCWµ×SEÍV>¶×UÛ7ßçÔám»Ó¬zÿ=µÍØ1º+ ¹mÃI,>µX7àä] .½*	^îã°N
º.èÎ/\")Ð	
¯s®|à¤çÓÐlÁ}ã¸Íç!óî5n±pj£¾h}½èðmEázHÂaO0d=A|wëß³ãë×Îìu²vùØ¼Gx#®
bcSðo-ùtOm`Cò^MÅ@ë´h­n\$k´`þ`HD^PEà[ä]¹¨rR¸m=.ñÙ>Ayi \"úò	Ö·oã-,.\nq+À¥åfXd«¶ã*ß½KÎØ'Üê Ð%aôÿù9pûæøKLMà!þ,èÊË¨zX#VáuH%!À63J¾ryÕíùq_èu	úWù±Æ|@3b1åÈ7|~wï±³þíA7ÒÂè	¼9cS&{ãäÒ%VxðïkZO×wUr?®ªN Î|
CÉ#Å°õåÕ¯ ¹/ú9ftEw¸CÁºa¦^\0øO<þW¦{Yã=éeëýnÉígyf0h@ìSÝ\0:C©´^¸VgpE9:85Ã3æÞ§áºð@»áj_ª[Þ+«êÇ©x^ê®~@ÑWª¸ãã9xFC¿­.ãçöük^Iû¡pU9üØSØ÷½\$óóø\r4´
ù\0ÎèO°ãÄ)L[Âp?ì.PECSìI1nm{Å?PîWAß²Á;ñìD°;SºaKføò%?´XõÞ+¤B>½ù9¿¯ÙGjczAÍ÷:êa³n0bJ{o¥·!3À­!'ØKÃÅíùÔ}ã\\èÎ3Wøê5îxÏÉÁL;2Î¶na;²í×ºXÓ]Éoºxû{ä¦5ÞjX÷ð¶vÓéãqÞÊEE{Ñ4Á¾öÄ{íÙç	Ì\nöÊ>ùaï¯·¾üì§ïØLûÔûåïÿ½ûìñ'ð½Þé{ë\n>Jøßá¸Ó÷YÏ\rOÊ½ðt¯ÿû¥-OÃ¦ü4Ôÿ9Fü;ð§Á»ÔüGðøIªFßì1ÂoÿßóñO²¾éa{w0Ó»ï¤Æ¯;ñlüoñàJÐTb\rwÇ2®Jµþ=D#ònÁ:ÉyñûSø^ã,.¿?(ÈI\$¯ÊÆ¯í¨á3÷Ãsð4MÊaCRÉÆÍGÌúIß°n<ûzyÑXN¾ð?õâ.Ãî=àñ´DÇ¼\rØé\nÕó¨\roõý\nÐCl%ÁÍYÎû¥ß°ÏàGÑþÚ}#VÐ%ý(ÔÿÒà3æÉrð};ôû×¿GÉÌnö[ª{¥¹_<m4[	I¥¢À¼q°µ?ð0cVýnms³nMõõ\"Nj1õw?@ì\$1¦þ>ðÒ^øÕû¥ö\\Ì{nÂ\\Ìé7¿Ùic1ïÚÿhooê·?j<GöxlÏù©Sèr}ÍÃÚ|\"}÷/Ú?sç¬tIäåê¼&^ý1eóÓtãô,*'F¸ß=/Fkþ,95rVâáøàÀºìÛo9Íø/FÀ_~*^×ã{ÐIÆö¯ã_²^nøþN~øáÅAí¦d©åñþUøwäqY±åî´T¸2ÀéGä?&§æô:yùè%XçJÛCþd	Wèß~úG!´J}¤úìùõÄB-Óï±;îûhÃ*ó¼R´ìöE¶ ~âæó.«~Éçæ SAqDVxÂîÍ='íÉEÙ(^û¢~ùø¿çòéçïo7~M[§Qãî(³Üy¸ùnPÑ>[WX{qÔaÏ¤ÆÉý.&NÚ3]ñúHYïÝûëÛ[¶ÁÙ&ü8?Ñ3¦¶§ÝÚ»¶á#¦ÎBðe6ë
@[°¤£ûàÐG\rÎ+ý§}ü÷ÁÿÏ_Ýç7|N§«Þ4~(zÁ~»¹ï§%?±ßÓÈ[¹ø1Sª]xØköÑKxO^éArZ+ºÿ»½*ÂWö¯kþwD(¹ø»R:æý\0§íù'¤óm!OÐ\näÅuèÆó.[ PÆ!¹²}×Ïm Ûï1pñuüâ,T©çL 	Â0}â&PÙ¥\n=Dÿ=¾ñÐ\rÂA/·o@äü2ãt 6àDK³¶\0ÈÂq7l ¼ðBêúÌ(;[ñkr\r;#ÃälÅ\r³<}zb+ÔÐOñ[WrX`Z Å£Pm'Fn ¼îSpß-°\0005À`d¨Ø÷PÁÚÇ¾·Û;²Ìn\05fïP¿EJäwûÛ ¹.?À;¶§NòÞ¥,;Æ¦Ï-[7·ÞeþÚiÅâ-ÖîdÙ<[~6k:&Ð.7]\0ó©ûëù/µ59 ñÁ@eT:ç
¯3ÅdsÝú5ä5f\0ÐPµöHBí°½º8JÔLS\0vI\0Ç7DmÆa3e×í?B³ª\$´.EÐfË@ªnúbòGbÁÏq3|üPaËøÏ¯X7Tg>Â.ÚpØï5¸«AHÅµ3Sð,Á@Ô#&wµî3ôm[ÏÀòIíÑ¥Ó^Ì¤J1?©gTá½#ÏS±=__±	«£ÉVq/CÛ¾·ÝÎ|ËôáþD g>Üõëé 6\r7}qÆÅ¤JGïB^î\\g´Ýõü&%­Ø[ª2IxÃ¬ªñ6\03]Á3{É@RUàÙMö v<å1¿¾sz±uP5ªF:Òiî|À`­qÓ÷V| »¦\nkâ}Ð'|gd!¨8¦ <,ëP7m¦»||»ÿ¶IAÓ]BB ÏFö0XÏú³	DÖß`W µÁqm¦OL	ì¸.Í(Áp¼Òä¶\"!ýª\0âÍAïÃôÁV7kM¸\$ÓN0\\Õ§\"fá Çëñ È\0uq, 5ÆãA6×pÎÎÈ\nðÎjY³7[pK°ð4;l5n©Á@â\\fûÐl	¦MöùûPÁç3®C HbÐ©¸cEpPÚÐ4eooeù{\r-à2.ÔÖ¥½P50uÁ²°G}Äâ\0îËõ¨<\rö!¸~Êýµ¾óñ¹\n7F®d¶ýà>·Ôa¢Ù%ºc6Ô§õMÀ¥|òàdû·ìOÓ_¨?JæªC0Ä>ÐÁ&7kM4ª`%fílðÎB~¢wxÑÚZGéP2¯à0ü=*pð@BeÈØÏ|2Ä\r³?q¸Ð8í¸ë±ñÍÐ(·yráö 0àî>>ÀE?wÜ|r]Ö%AvàýÁÅä@+ÝXÁªAgâÉÛÿsû®CÐûAXmNÒú4\0\rÚÍ½8JÝJðÇ¸DÒó´:=	ðóëÆS4¯ñF;	¬\\&ÖèP!6%\$iäxi4c½0Bá;62=ÚÛ1ÂùÌPCØåÂmËÍdpc+Ò5å\$/rCR`£MQ¤6(\\á2A ¦¹\\ªlGòl¬\0Bq°¤P¯r²ûøBµêÑ¹_6LlË!BQIÂGÀåÜØðXRbs¡]BHrã`ÎXä\$på±8ð	nbR,Â±
L \"ÂE%\0aYB¦s
ÍD,!Æ×ÏpN9RbG·4ÆþM¬t
¸¬jUô¤À§y\0ìÝ%\$.iL!xÂìÒÅ(Ä.)6T(I
ìa%ÒKÈ]mÄt¥ô
ú&óG7ÇITMóBú\rzaÂØ])va%²41TÁjÍ¹(!
¬Þ¡¨\\\\ÆWÂÜ\\t\$¤0Åæ%á\0aK\$èTF(YàC@ºHÏÐHãnDdÃWpÉhZ¯'áZC,/¡\$û¦£J¡FB¨uÜ¬Q:Î¥ÂAö:-a#ì=jb¨§lÕUg;{R°Uº±EWnÔUa»VâîNj¬§uGÉ*¨yÖ¹%ÝÒ@Åï*Ìä«ÕYxê±_ó²§z]ë)v\"£çRÕåL¯VIvê=`¾'ª°UÝ) S\r~R\niÅ)5S¦åD49~Êb;)3,¦9M3¯HsJkTÃ(¢úuJ][\$uf¨íob£µ¹\n.,îYÜµ9j1'µ!ö1\$J¶gÚ¤ÕÄU0­ÓZuah£±·cH¥,ÃYt²ñKbö5ë5/dY¬³AUÒ
©[W>¨_Vÿ\r*·õ©j£§-T±
 zÖYÊdc®mÒ¹±Ø:¹üË[Ut-{ªµýl	£i+a)».[º_:Ú5ähò­WÂ§Ém»¥%JI´[T«h>®µ·°;ËXÌºdêÂSdVæ;\rÆ±!NK&AJu4B
ÁdgÎ¢.Vp¢ámb
)ÇV!U\0Gä¸¨`Ð­\\
qâ7Qöb«VL¥Þ:äÕúó¬Z.­NòÄ*ÔU]Z´læzë
Îöù®ÇR D1IåÂ£Ñr:\0<1~;#ÀJbà¦ÊMyÝ+Û/\"Ïj<3æ#Ìêñ¡
:P.}êe÷ïòD\"qÙyJýGû·sop¯²þX\rÝ³dÞ\rxJ%íÏÆ¼O:%yyãÅ,%{Î3<îXÃ¸ÏÌ÷¯zÂEÎz(\0 D_÷½.2+Ög®bºcÚxìpgÞ¨Áß|9CPûî48U	Q§/Aq®ÝQ¼(4 7e\$Dv:V¡b×ûN4[ùiv°Àê2ñ\rX1¼AJ(<PlFÐ\0¾¨\\zÝ)ÑçW(ü4ôÈÃÚï¢ pÓõÊ`µÇ\r³da6¯üOÖímña´}qÅ`ÂÀ6P'hàç3§|îÃf jÈÿAæzø£+DUWøDíþÞ5ÅÄ%#é°x3{«¶L\r-Í]:jd×P	jüf½q:Z÷\"sadÒ)óGØ3	¤+ðrNKö1Qþ½çx=>û\"¤°-á:ÊFÍõIÙ*í@ÔÇy»Tí\\Uè¨ãY~Âäâ3DåÁã¨f,s¢8HV¯'Ét9v(:ÖB9ñ\\Z¡
(&E8¯ÍW\$X\0»\n9«WBÀbÁÃ66j9Ð âÊ?,¬| ùa¾g1²\nPs \0@%#K¸ \r\0Å§\0çÀ0ä?ÀÅ¡,ä\0ÔhµÑh\08\0l\0Ö-ÜZ±jbàÅ¬\0p\0Þ-Ùf`ql¢ä0\0i-Ü\\ps¢è7e\"-ZðlbßEÑ,ä\0ÈÌ]P ¢ÚE¶b\0Ú/,Zðà\rÀ\0000[f-@\rÓ¯EÚÏ/Z8½~\"ÚÅÚ­ö.^ÒÎQwÅÏ\0Ö/t_È¼ÀâèEðÖ\0æ0d]µbúÅ¤|\0ÈÄ\\Ø¼¢íE¤\0af0tZÀÑnJô\0l\0Î0L^´Qj@ÅáJ´^¸¹q#F(1º/ì[µ1¢ãÆIæ.Ü^8»\0[qØÌ[Ãl\"åÆ \0æ0,dè¶ÀÆ\rÌcøµ{cEÁ\0oâ0¬]°\0\rc%ÅÛð8½w¢åÆZµ-Ä\\ºñ{ãÅÖGª/\\bp
@1Æ\0a²1ùÈÏÑsã!Å¨/î/Ì]8¹~c\"ÅÛÅþ2ôcÎm£\"9q/\\^fQ~cÆ_£Î-\$i\"Ö\0003Ë¬¤fXºqx#\09Z.´i¸È@F3tZHÉ \rcKb\0j/DjøÉ1¨ââÆIh´aÈñvÆ©OZ4ZòÌÑ#YE¨\0i.hHÒÑsX/F<Ï.äjøËñ­bèÆÍ\0mV/d\\èØñb÷E³£3T^(ÝÑcKFRÕùô]X¶q½¢øÅà6Ô]hÓñc6EÄó66Ühãn\0005sn/dn¸Ô`\r\"ÑF³Ú-D`ÈÕãN2Y¤bxÀñ#\\ÅëV3x·1xFx¾\0Ê6b°q£Ç!8|^ÌÑubåÆàÕ-ôrØäq¼ã:Æé%ö0ppñ#Ç¢\0Æ6ÔfÕÑÇ¢âÅ¬dÒ0qH´±¾£\$Ç@qò-¼^B4±¦\"ú\081ª/lnxÏ âêG3:0tjhÒ~@Æ¼¥¦3¤vHÆñ¹bÜG(e4gØºqÂã2Æ1É-nXËñº\"ãF<Q1\\j¸¸1®ãÈEÇÇä³4m¨Õñªã[ônÁz7üyhÞ1§#ÆÞ/3\\xÐqÍKGÿÆ6äoÑ1{£°FJ×6¼lXéqâ£Æu©Þ9r(¿1ÒãGc\0Åf:rX½ #ÐÅ½\0iÞ<\\}×ñåbîF½\0sÖ7Üy2ÌÑæ#uFe\">4iØÅ¿âÔÆçé\n<{¸ã£âÆJ;¬]ØÄ1Å#ÎÆ0ÙJ;4^èÂD½ãóÇ®¨³4i¨À(H#ÚÆEx/¤nøû1ðã/Ç¡åj6,lÛ1tã/\0005%ï0]xü¶£GG5!0¤¨×ñÚâérq¢2Ì¨ÞÎãNFPo\"4ô_·1×dÇ%e ²3¬s8éüãG5 æ6Ô[HëcØHjY;ô[è¾bë! yò@Ä\\¸½qØ#WHN;ÌcÆQèã:Ç-%ª.kXÆý£ÚGÍÏ1Df¨ßºcWFl¡!0ü²c EÜ©;lÑq\"ëF©ß¢7\\\\¨ùñâ£ÔÆOqþ.T|\"?ñãÆE³f9TyYÑ©ãSG1ûÂA\$f9R\n\"ÞÆx¹>B
HÚñß¤\0Ç¶:\$e¹1£³F?=º3Tu)\nq¹béÇ~ËÎ<TøÎ±ÐcH.m~CôwHÊ±¸#/ÈI]~3ä^ºÑ#§Æ>Y®4^¸ÎQjcÊÇK1\"Ò8¬|6Ñåc\"ÇBµ\"b4ãèæ%¢ÔÈG\0e\"/t¨´1r£1Æe!v2yÀ±õä<Ç 8\\o¨ÊÑ#tÅÑ\rz@´}HÂèbïÆèy î1Ì\\¨ðëdeGÁZ3~ér)ã1È¿ÛBl~H½²:£dF£-Î?k8´qèc(FÍKÞ5|myñc1Æ<*@´jØáò1ãÛÅ¾>I´ZèÍQjäÈ2É\$0¤hµQäVFT	\$ÆAl~öqÚ£È±\$Ö>\\pÙ\rq\$/Èu%ï!®Jq \$ ãtE²GN-Tq)ò\"¢ÛHÊË¦=ìXÉ2-£H«8\\nµRW\$Hë\"¢C\\_¹\0»d\$Çf³\".Du	'Q£zEíÙ&0toóqjãúÆ¿³R@døÉä£ùÇu##¶LLkÉ*qó\$*GÄiÎ@TilãòEªÎ5¾r\\dIµ\"/ÌZÉ0j\$TÅþz5Ld3£ëÉoÂ.Tq¹!1{£ÆåÖ9Z¸¾QÕbÓFwJ94nÒÄÖä{É(-8·2h¤uÈé;\$-Dkøårs£H#¡ôY7ò\"Ø/E¿Ó 	\$j¢^ò-£]Ç7[\"N\$èÂ¤WÈ¯Ö/]à\$²+1Ga/&IDnøÂ@\$åÆ!ç\$Î-k!Q¨âùÊ)(N/\$t¸Ý¹äëÆOKzP´tXÜò[\0Gw(*K\$vË1ócÉ'ÞGÌIòxd­È\nAÒ8\\rX·Òa£÷IiNI%\$½ãÆ_÷ª6¤fçQþ#ÈI5#F´ØºñÏ#³Eâ\"î3\$¢IÜcHÝvR|ùQ¤cE¸ñ:Reº±hä¶EÎfK`8þr.#·E³s®0L
üRäF©·!\nC\$`Èöñ´\$ôH?ËnPÜe!ñ¥@F'¿/¸¶ÄÖäÿÊ¯%ÂN,hÈÌrF\$öÈþÇ3´tøæÒ¥Åæ!1<ÉCQÏ%ÉÃ¹æJäZØf.Ý6Å·±C¥ÊÔ.²[þBÒ¿xëàè\0NRn`ÈùY\n%+N¨IMs:Ã¹Ydef¬B[¶°ÝnÆ¹Yòm¨ÁR®×ûÉY¯ÚCXëÛj³çU+Vk,¯\0Pëýb@e²¹¥x¬V¾ºyT¤7uî«[JïÈ±\nD¯§eR¿¬mx&°lÀ\0)}ÚJ¼,\0IØZÆµ\$k!µ¨ñYb²Á°RÂe/Q¾Àk°5.Áe­5À¨W`ª¥\0)Yv\"VÂ\0Ã\n%å`Yn¯Õ¡aôÔxÃQ!,õ`\"	_.å©Ætm\$\"²J«¤ÖÀ§vÆ%M9j°	æ§Ä*³KpÖ;\\R ¼ü3(§õ^¯:}Èï|>Âµa-'U%w*#>¤@Ì¬eJÿ¤;Pw/+¹á5E\rjn¡ÐÃdô¢^[ú¯§cÎ°¥uËz\\Ø1mi\"xpåÃ;£ÌîæP)äøªÇ#±Ø¡
Ë!Aª;¨ß	4ì³a{`aV{KUàÊ8ã¨0''o2¨¢ycÌ¸9]Ké@ºÒ^ðlBâOrëÔã,du¤¾8¤?õÕ%¼gB»îÆYn+ã%c¬e\0°ñà¤±Yr@fì(]Ö¼¨\nbizîÖnSS2£ÁGdBPj¹Ö@(È¥¦!à-çv²´eÚ*c\0ª4JæçùÕÙ,UÈ	dºÉeðj'TH]ÔÔG!)uÕÖ¯Ò¯ùZËB5ûÌW0\n±á¡ÔR«ÁW
\\¦Q jÄ^rÊ%lÌ3,ÒYy×Éf3&ÌÜÕQ:Ïµ2mÉR)T¾(KRÁ 0ªÊ@«ìY´¢Y:£Ùe3\r%´¨°Tö%­XÁ¹STÔ.J\\ë0ÙhôÄ
D!Ä:uæêÉU\"¾ÅÁo+7\"µf'º­R\0°ÞJõ2S2è#nm »ÁIåý\"Xü³²[ÖÑì} J¨¯c¼9p0ªüÕQ»(U\0£xDEW.LõÁ=<BÔ0+½)ZS V;â\\âµI{5IAôÖÃ,dW²uè5Ew\n\$%Ò
½2i_\$ÈÙ+ìæO,¬íX´ÕJg&J¡úGº%\\J·b.ÄÝ^LTòFlè¹]k#f@L·GÄT¼ÙÒÍHÏÌ\"q1SÌ°ùjVÉ(ÎìZVzßÅ³,§ÊèG.1Fû±gNÊ;×1ÃV¬¦5EÍò5`ò\0Ctè=F\ná¹Î±KþÖ\0­Û±%¨ËD]Q\$\r\03J\\,Í³<T4*£Á.ÒYK²D«QéLïS%,gÔÇåª§Ö<Ëëu0ôÍUÄÖ*x(©åNÂYv!þ¥yÍ	wÅ4fdª¥rGM \$äê^;ºéîÝæ)<Pã]DÒ%%Ó;ÔjÊåI0æaÓu^Jp[)¦v©3RhRúEöÀ\næL_#5|Ü¾Õm3Pñ*¨\\Y51X	i³NÈñ\$\"°ºaü­õh*KUÝÌïV8¨åuò±%&ræ¯Ë ²5oÕçg³;ÝrMl[Æ¨ög³ùª·UÍqê¹h|ÔeO2·f MlW2AP×¹ÍÀÍv~eD¬eñ3UÓ«lE62iüÎõìÓUbÌï¬«õU¬©¨îøýªVðêiI!\$i¨Ê­&Z:½xm!Å.ÖOÍfwÒ¯!ÌÓkÝ¤Í6b\"«IJ]]:T6ÒVrú¹}ÜÇ«]®±U¢	ys7fÔMÅÿ3ÜÎYó:T_MÍw%3ÆnÏ¥\nÎæz*í3âh·	»`U²Lÿ,¥ÛÐ5¨óvf»ÃÙ42_Q¼hÝÇÍuD§\no£¹)¤ÄÕ«M9¿7foÛ¼©¤rÖÝÇÎWB~iTÝeyQTâN\nd¦pr§#óM§;
4æpª¼têÿ(;³5	|¬àÇ­',AV7ÜÔåUAö&ìÍRP¯\"äÕyÒ·) [nÌÕñ-3VË,?s6ºpù3fµÎAÛ9k|ÝÉ®Sf¬*@5Þg¼¾É¿2·Í}®þUüÝðùæHÎFl%®pÂ«Ie³beMÙSO\r[¼æi²3fÉÎLVá®rÙu®¾¥ÛNA:î%rÚy3Q_Ì¸W.ÑÕÈ^Sl@&ÌÁ5ÖYlÂÌ1åæÎ}VxêgÊ
§^SnÕÌÍQ!:5×ZÞiZCÔ:¿3qgé%DáõÝª{U¡3tZ¹`ûÓu%w:ÉZQ:QìÏÇW fîí¿9Jplê)Ö3xÔvÌþK7b#«ù½«çX+J(¢Âh´ìP*Ó´«Îþ¢!×ìÅSLçh*'¤¨\npBùÚªgNÊ§8BuÒªéÂ¯çÎ½8niêIÍs¸USÍI;vvÚ³UõsR7Nu×8©H|íéÅÓ·§Ì«8òq´ÕÙÞ+'ÑßÍ`x¢9R	Õ®ºçMaR8úxä)¸'!Ï;±U¬×YÖÝsNIg:ÕKTëy¯3®gÍYìëÊkäãÉÜ³n'LO(¿3w4ñ4î»¦ÇÏÚêþl¬ñÎJ½ªw½9Ý\\ìçóóhf(¢_~ìòà}9Nö¦Õ\0´åb\"¢Yé¤Th,Ú¤@ú±D¡û\$I·;eüèUÊn¨³·,¹OªÆ	Xÿg´-ÀÉ+>ti'Gölª%\0­8âVBËU1«ye\0KTÆ4ûÁÈmºV2)\r]I/\rFù
ÔX×Àß¨ña·­GÂ¹ò*§»ÿ>ERì÷ðî®¥ÑZ-)I\$®¹íç:¦aË\0¾FybaÙg«w§­(ß_@§v}öiõÊ³îS^Ë25DÔ³Ð	ÈôURO±JHÖ\\ØisðfÆËKN±qi÷Sg×OÂ\n²F~|«µÏ*@gR_Q<9sÜ¬3i+Ø².Cw²²ê|øyË6aìOÜY9¶¶É\nëÔ½-([®±_}íSû]c¤S=Â¤ÎÙþÎÍÔYÎàU-> <ú©µ\n<ÖsOôQ4F¦^}\0007uäk(/Û/5{Lÿ9µ\0§¬Ð &³[<ÏõsÛ\0&Íè#
@hÌéª3©V}ÐH¢*Üw+]'DÐ& @§Ö])µè;TGe3\\Îên®ÑßËd\$:¦uN4Åyktê-dR!7­Ée4(P!-þ9À4ç_PMGbÄ±w
«ØÉ6O§S¦Fâí)§yh0+²§qT|·+uÔÿÎ+ A¬?òÞ	öTè3.q 41T´¸e\n:P ø¯{Tî\n³ëh?«TïAùS£­*«åÒ+åu¥>ú\\ê¾ZéíÊîYì·¢wEJö%·sL±¾dªyÀ+\rCèß¡'Añl,Òyå3þç²ËÍ`º	_*ÑPû ThKDV²·~5	à0´+á¼,-?­]ºò3ëÖKå`¯^¸¤I42(]ªw.ærÄÊËê]¬\nYÆ¨B£­Ð	³í}ÐR ¾ÉgØ}:H§ðJÄWP²ê\"ÞµðôV\\¬<? >½åáÿ§Ü¬Ý¿=¦
:\n0×è\\+ñS´æfÝU³íU,
WCÖèOn¨òÎ
¢§.e9|R÷I'©[×/º²ÄÙü2ù«QÓBn:ÆIõ\nö§g¼9Æ\rü,ÓR6³ýçÒQ\$XÝ+¸>©±`\nù)/_8QiÔùµê=êv?5v\0 \n¨çÉLG¥Dmw\\ëFÖÑ¢¯Ádêµ}s\"ÃYv¤|âJ*´9h­¡Ñ@XEUÑ*Þ(oQ]\$B,ûéÜKTv¤AptCÉ\n×C,/<¡­ÚEW-VïP¡¢=Wÿ*%Kê-Q`9	(Êú59Óèm)ËX¸¨@ç2ø ýT@Û\nS¯bd×EÎ´a+DXîá|UÚ		¡F® 2ú%5\njm«WÙ+xêKæVÌ3#¶CTÃek¤&Î,£l¬jbd7)Ó\"\n+ìPüºbèI@è3ÑÜµjUÒÌEsÞÔ)D¢fëõûÇPZ3AÎÕ\nwThð²ªÛÅ4Zäª<Êuß©ßdqâËu(÷bKG±à¥éÀnÓTï®]z¨f%#3IËfS¨®&}µ@D@++ù¤Aíhª¿\nªïUÞ¥|B¡;
UmÑÙU
EN¥!ôx2±1Ò\0§GmvH~õÁHèTê)öW®³YNý\"åk5©ÑvT#=µÚ¥Ê<\n}#R3YHÅRÍIÍ³Ü¦;ÌÑRl£1léuB%TQJî*ºêÙ'ºEë0i¬dw,¥zÊÍ¥:\$¦;Í? üîj¿)§ô)ÔÊ\$32J}Å&[³\$¨õÌ¤;DnýE×´À+0ÛaZ{¨èC èû(¤ê:¸ ÚO@hø²D£æ\0¡`PTou³ÄïF®\rQvû¨o½Ü¡\$Sîö+Ò#7À¤Izr
pk DWFsÍ9 Qê  Ð°1gÀÅ#\0\\Là\$Ø 3g©Xyôy -3hÀþÃ!nXèô]+±	Éc\0È\0¼bØÅ\0\rü-{\0ºQ(ðQÔ\$s0
ºém(°[RuòVÆ÷ÒØ>Æ¼+àJ[©6àÒàJ\0Öú\\´¶ã,ÒéK3ý.ê]a_\0RòJ Æ`^Ô¶ClRÛIKîù\n \$®nÅÒä¥ïKj©\nÁ©~/¥ªmn].ª`ô¿ijÒâ¦#K¾f:`\0
é6¦7Kâ¨zcôÂ\0Òõ¦/K®­/ªdôÄéFE\0aL¤dZ`JéSÏÊ
2ØÍ4Î@/Æ(Lòõ0ª`´Ä©_Lþ]4ZhôÐ©SD¦M
4:cÑéSR¥×ME4iòéSG¦EMjå4zdÔÕ©SFKLª%4ªeÔÏ%\$ÓlKM2õ1ÈÚÔi¦Ó©MV­.¸ÚÖi´Ó©Lz/÷ôÛ£Ó¦ÑMæ,`_ôàimS¦gMÆjgòéÇÓ5¦9.
9j_òéºS¥µ.Å9ê_±òé¾S¦.7Úrò)ÉÓ%§[2m8ºuTæéS±§3M:]3ºqèänÓ±§KN1|^ÒktÏ\"ÒÓH§gKj-;zcñiÎÓ§\r<ê_²-iÊÓ¸¥ñ\"ÖU.¹´óiëRÚkOFí=:\\ôÏ\$ZÓ©§MLE­5úxôø©ÂÓ»_\"Ö=<\0ñtéÙSç¦9OÒ­1~öi²Óô§¹Oêí>ê~q)òF¸¨ =6:~ÔõãJÔÏP:Í=¨åTÿ)¢Æ«§ÿPJ8õ@êwôô©÷Ç*§ÍOÊ5]>ªt÷£T\n§å!\" 6Y	)ÈH¨/Pª
3É	éð/P~ àù	ªÓ®¨!\"CÌÔýj¡ ¨eNJ¡üêñÔ*%Ô4¦1Q¡ÅCZQjTBQ.¢\rE)\0004Ëê\$2¨SM+å<jt¿j0Ô,¦9Q¡}F\0\$±s©Ta¨KÎ£]Ecj*'K»M¾MGx½ÕRÇT1¦#Qê¡¥Gª5ª:Ôz¨L¡4u6z\"j\"TKuNÖ£ýGÚg\$jFSÜ¨ïQ2¤¥Høîµ\"êMT©%R¤HzÕ\$ª,Ôw¨Re.\$rªzµ)©ÛÔ¦©-Qö ÍJ¹Êª@Ô°©=R&/IÊ1*]T³À7¼¾QÒåD&Ó©qN¦_(´q²c[TwQRôå´J\0nâ÷T­¨û.¦956cÔÜÕSz¥HÁ7ªRÔ}Sr8¥NÕ\"bÖTè§ÁQÞ5MNõ#ãçÔè©ESÂ§-HÁ7\"ÜTü©_Sê§}GØÌ?*yÔ©Sò§½P*5#âöÔÜÏT:§]PÊõC*ÔT:¨-K8Æ5CªÕªR¦--MÈ¾HªÕ ª'T¨­HøËõHªÔÑ×T¨íRª£õ,âéÔÜGTÚ©-SJ¤õM*Ô©UTÚ©mMH¸õMªÕ>ªgSD³5MÈÂRªÕHªwU\"©íK8ÕÕRª ÔÚ¡U*ª-U*¨ànÂ¾TÙIR­,t¢Z«ÕêY¶IUF«51ª¬µW)vÕk_KÆ«pJ«5Zj­Å¯©R4r\n¬^jIÓCKºª}UÊ_ª°ÔªãO¬=N·R*¯F-ª½R¬%WÕcê¦Õ\\aV>«EYjµdªªÔÃ«UÎ¬µWXÍ5*ÈÕ¹UyõZ°1kãÕ¨«7V¬R\\HÍ5h*ÖU¢©ÏUÆ§M[²±kêvÕ¸«3Vò­}[(ä5WªzÕ¸«iB­Oº®1¯ê¯Tý«V®;­[øîµpRæGu«;T@0>\0ê/I³ªÿW`í]¦ô\0ªîÆ8«¿P¯]ÈÍ1m*ïÕÇyUz¨mW¡õ|ªÝ[«¡Ö¯
]J¬ÑêøU±««ö¯
Z*¤5\\jÖ«ëZªô`ZÁ5~ª®Eì¬Wú«4ZÁ5h£QÕ^cXZ®Sú®1o«Vª¹U&«TºÄ5}cU^X°dm*³±kUu¥«SfG=[¹õjäsÕ¿ÏX¦Kc\n®iRâHç«i#±uWt»µª½¥º«»XÂÕcÄ¹«U¬rÚ¢õUZÕNE¢¬Xº¬
4ÚÈudê·Eä¬eV^²íKÉànâòV8sXÂ¥ÍfÇõ/ÂhJ³-J]Ó
ÓÎÁÕzO±<Eh\$å·¡ó\0Kë<bwñ
>·øN\")]b£	â+zê.cS.¢iFç	ã£µQNQ«éV*ªéÛÎúÞO[X¤nx¤P	k­§oNø£}<aOò§IßÁh·ºT;òrñ¤VD6Qß;z]j×~':ë[Ivôó7^Ê§ÖÁjëºw[«ùæîºçÊÅ¥:u ÅDs#¦¿Î\\wµ<n|*áhëmÎKv;YÒ±Ú3á]«^#Zªj¥gy³jÄ§Y,%;3¾³ÊÚù×.ÈW\"Ã\$Ù3>gÚºÏÓÏ¦ªVTóZj¥hYÝjkD*!h&XzËiª¥+GV­\"¥æ¸Z:Ò¤§+NoG¥Zjj¥iÉ]ÊkOÐ_­Ö¬ÔmjIª¨§t¯#½[âj\rnãê©×ÐnßZ¥_,ÕéógÎÄ©:¹¼Å9Áÿ«[L2®W=TÔ×0®ãf¶\0P®U6\ns%7isYæ?£¿uá3¾½nb5¡«»X|G~l&×k¤¥·M§ ¯ú¶Ïy¡SÉ)Î]Ü­r·¶Ù¸µ¸æìÖêÅ?Õ}u'n0W-Î¹®æb·´Çªìõk?»vQý7
Ü}p\nìõÀÍÙ®Z*»9)Êá5ÞZW­-ZB¸²:ìõã«W\0WZfpGpõîÍÙ®:Fpú¤äUÙëSN/Ï\\©Ü%s9¬S{§ ×8®ÏZÍasÊÛ+¢N^®9MÕ{
P5Óç ×Q®ÔîJº¢«y§õÕè;Úîz¸ÂÕYÚV Ä3:ïDÅIÃ+çý¯£19M;º¥ô¨V´®\rQ{êÉÕ®¶Å+£FCLÄ¹N¥©Ô\\ùÞ)\$iÛN'\0¦°PÂõÊÇ]XÌ^s1òf&\"'<OøóÌ¡ËL\0¹\"@Ö¥%ä6úÂUAõ1ýi(zÌèÝ\rÒÕä±ÈbZÀ+IQOï3ºË\r=*Ä )ñ¨!Á Ð`ª¼h°,Ð«mGPCËA Ù²íA(ZÅ°%tì,h/ÁiÈk¬«¡XEJ6ð±IDèÈ¬\"\nïaU- «\nvy°_ÄÂÂÚ«¯k	a½B<ÇVÂÛD»/P»ôaîÁ)9Lã¶(Z°8êvvÃ¹Øk	§oÐZXkäÑå§|´&°.Âæ±C¹Øá°`1]7&Ä+H¤CBcXB7xXó|10¦ãa6°ubpJLÇ
(·÷mbl8I¶*Rö@tk0¡¯ÅxXÛÁÓ;ÁÅ al]4s°t¿íÅªð0§c'´ælß`8M8ÀÃD4w`p?@706gÌ~K±\rÛ P´
Ùbh\"&¯\nìqPDÈÐÎó\$Ð(Í0QP<÷°àÀã¬Q!X´
xúÔ5R·`w/2°2#À¸ `¬»1/Ü\r¡Ö:Â²±¢£B7öV7ZgMYúH3È ÙbÎ	ZÁÓJÅöGâwÙgl^Æ-R-!Íl7Ì²LõÆ°<1 íQC/Õ²h¼à)ÏW6C	÷*dþ6]VK!mì
ØÜã05G\$Rµ4¯±=Cw&[æ«YP²dÉ³')VK,¨5eÈ\rÞÊèK+ï1X)bÛe)ÄâuF2A#EÑ&g~e¡yfp5¨lYl²Ô5õö¿Ö\nÂÙm}`(¬M Pl9Yÿfø±ýÖ]Vl-4Ã©¦«ÂÁ>`À/û³fPEi\0kvÆ\0ßfhS0±&ÍÂ¦lÍ¼¢#fuåÌû5	i%ÿ:Fdö9ØG<ä	{ö}ìÂs[7\0á¬Î3íft:+.Èp >ØÕ±£@!Pas6q,À³1bÇ¬ÅãZK°ê±Ü-úar`?RxXÁé¡ÏVïú#Ä¤ÔzÂ; ÀD¾H²Á1¥6D`þYê`÷RÅPÖ>-Æ!\$Ùù³ì×~ÏÐÅà`>Ùï³õhÔ0ô1À¬&\0ÃhëûIwlûZ\$\\\r¡8¶~,\nºo_áÀB2D´a1ê³àÇ©=¢v<ÏkF´p``kBF¶6 ÄÖ²hÆÉT TÖ	@?drÑåJÀH@1°G´dnÁÒwÆ%äÚJGÒ0bðTf]m(Øk´qg\\í½ó¸¬ë°ê ÈÑ3vk'ý^d´¨AXÿ~ÇWVsÂ*¼Ê±æd´ûM À¬@?²ÄÓ}§6\\m9<Î±iÝ§Ô¬h½^s}æ-¦[Ks±qãbÎÓ-öOORm8\$ÞywÄì##°@â·\0ôÒØ¤ 5F7ö¨ X\nÓÀ|JË/-SW!fÇ 0¶,w½¨D4Ù¡RU¥T´îÕðZXÇ=í`W\$@âÔ¥(XG§Òµa>Ö*ûY¶²\n³ü\nì!«[mjµ0,mu¬W@ FXúÚÎòðü=­ (¦ý­b¿ý<!\n\"ª83Ã'¦(RÝ\n>ù@¨W¦r!L£HÅkÌ\rE\nWÆÞ\r¢'FH\$£ääÀmÈ=ÔÛ¥{LY
&ÑÜ£_\0ÆüÝ#¢ä[9\0¤\"ÔÒ@8ÄiKª¹ö0ÙlÑÐp\ngîÛ'qbFØyá«cl@9Û(#JU«Ý²{io­¥.{ÔÍ³4ÞVÍVnFÉxðÑüzÎ QàÞ\$kSa~Ê¨0s@£À«%
y@À5HNÎÍ¦´@x#	Ü« /\\¥Ö?<hÚù
¼IT :3Ã\n%¸");}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo"GIF89a\0\0\0001îîî\0\0\0\0\0!ù\0\0\0,\0\0\0\0\0\0!©ËíMñÌ*)¾oú¯) q¡eµî#ÄòLË\0;";break;case"cross.gif":echo"GIF89a\0\0\0001îîî\0\0\0\0\0!ù\0\0\0,\0\0\0\0\0\0#©Ëí#\naÖFo~yÃ._waá1ç±JîGÂL×6]\0\0;";break;case"up.gif":echo"GIF89a\0\0\0001îîî\0\0\0\0\0!ù\0\0\0,\0\0\0\0\0\0 ©ËíMQN\nï}ôa8yaÅ¶®\0Çò\0;";break;case"down.gif":echo"GIF89a\0\0\0001îîî\0\0\0\0\0!ù\0\0\0,\0\0\0\0\0\0 ©ËíMñÌ*)¾[Wþ\\¢ÇL&ÙÆ¶\0Çò\0;";break;case"arrow.gif":echo"GIF89a\0\n\0\0\0ÿÿÿ!ù\0\0\0,\0\0\0\0\0\n\0\0i±ªÓ²Þ»\0\0;";break;}}exit;}if($_GET["script"]=="version"){$md=file_open_lock(get_temp_dir()."/adminer.version");if($md)file_write_unlock($md,serialize(array("signature"=>$_POST["signature"],"version"=>$_POST["version"])));exit;}global$b,$h,$m,$ic,$qc,$_c,$n,$od,$ud,$ba,$Vd,$x,$ca,$re,$vf,$gg,$Mh,$zd,$ti,$zi,$U,$Ni,$ia;if(!$_SERVER["REQUEST_URI"])$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"];if(!strpos($_SERVER["REQUEST_URI"],'?')&&$_SERVER["QUERY_STRING"]!="")$_SERVER["REQUEST_URI"].="?$_SERVER[QUERY_STRING]";if($_SERVER["HTTP_X_FORWARDED_PREFIX"])$_SERVER["REQUEST_URI"]=$_SERVER["HTTP_X_FORWARDED_PREFIX"].$_SERVER["REQUEST_URI"];$ba=($_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off"))||ini_bool("session.cookie_secure");@ini_set("session.use_trans_sid",false);if(!defined("SID")){session_cache_limiter("");session_name("adminer_sid");$Tf=array(0,preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]),"",$ba);if(version_compare(PHP_VERSION,'5.2.0')>=0)$Tf[]=true;call_user_func_array('session_set_cookie_params',$Tf);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$Zc);if(get_magic_quotes_runtime())set_magic_quotes_runtime(false);@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",15);$re=array('en'=>'English','ar'=>'Ø§ÙØ¹Ø±Ø¨ÙØ©','bg'=>'ÐÑÐ»Ð³Ð°ÑÑÐºÐ¸','bn'=>'à¦¬à¦¾à¦à¦²à¦¾','bs'=>'Bosanski','ca'=>'CatalÃ ','cs'=>'ÄeÅ¡tina','da'=>'Dansk','de'=>'Deutsch','el'=>'ÎÎ»Î»Î·Î½Î¹ÎºÎ¬','es'=>'EspaÃ±ol','et'=>'Eesti','fa'=>'ÙØ§Ø±Ø³Û','fi'=>'Suomi','fr'=>'FranÃ§ais','gl'=>'Galego','he'=>'×¢××¨××ª','hu'=>'Magyar','id'=>'Bahasa Indonesia','it'=>'Italiano','ja'=>'æ¥æ¬èª','ka'=>'á¥áá áá£áá','ko'=>'íêµ­ì´','lt'=>'LietuviÅ³','ms'=>'Bahasa Melayu','nl'=>'Nederlands','no'=>'Norsk','pl'=>'Polski','pt'=>'PortuguÃªs','pt-br'=>'PortuguÃªs (Brazil)','ro'=>'Limba RomÃ¢nÄ','ru'=>'Ð ÑÑÑÐºÐ¸Ð¹','sk'=>'SlovenÄina','sl'=>'Slovenski','sr'=>'Ð¡ÑÐ¿ÑÐºÐ¸','sv'=>'Svenska','ta'=>'à®¤âà®®à®¿à®´à¯','th'=>'à¸ à¸²à¸©à¸²à¹à¸à¸¢','tr'=>'TÃ¼rkÃ§e','uk'=>'Ð£ÐºÑÐ°ÑÐ½ÑÑÐºÐ°','vi'=>'Tiáº¿ng Viá»t','zh'=>'ç®ä½ä¸­æ','zh-tw'=>'ç¹é«ä¸­æ',);function
get_lang(){global$ca;return$ca;}function
lang($u,$mf=null){if(is_string($u)){$jg=array_search($u,get_translations("en"));if($jg!==false)$u=$jg;}global$ca,$zi;$yi=($zi[$u]?$zi[$u]:$u);if(is_array($yi)){$jg=($mf==1?0:($ca=='cs'||$ca=='sk'?($mf&&$mf<5?1:2):($ca=='fr'?(!$mf?0:1):($ca=='pl'?($mf%10>1&&$mf%10<5&&$mf/10%10!=1?1:2):($ca=='sl'?($mf%100==1?0:($mf%100==2?1:($mf%100==3||$mf%100==4?2:3))):($ca=='lt'?($mf%10==1&&$mf%100!=11?0:($mf%10>1&&$mf/10%10!=1?1:2)):($ca=='bs'||$ca=='ru'||$ca=='sr'||$ca=='uk'?($mf%10==1&&$mf%100!=11?0:($mf%10>1&&$mf%10<5&&$mf/10%10!=1?1:2)):1)))))));$yi=$yi[$jg];}$Fa=func_get_args();array_shift($Fa);$jd=str_replace("%d","%s",$yi);if($jd!=$yi)$Fa[0]=format_number($mf);return
vsprintf($jd,$Fa);}function
switch_lang(){global$ca,$re;echo"<form action='' method='post'>\n<div id='lang'>",lang(19).": ".html_select("lang",$re,$ca,"this.form.submit();")," <input type='submit' value='".lang(20)."' class='hidden'>\n","<input type='hidden' name='token' value='".get_token()."'>\n";echo"</div>\n</form>\n";}if(isset($_POST["lang"])&&verify_token()){cookie("adminer_lang",$_POST["lang"]);$_SESSION["lang"]=$_POST["lang"];$_SESSION["translations"]=array();redirect(remove_from_uri());}$ca="en";if(isset($re[$_COOKIE["adminer_lang"]])){cookie("adminer_lang",$_COOKIE["adminer_lang"]);$ca=$_COOKIE["adminer_lang"];}elseif(isset($re[$_SESSION["lang"]]))$ca=$_SESSION["lang"];else{$va=array();preg_match_all('~([-a-z]+)(;q=([0-9.]+))?~',str_replace("_","-",strtolower($_SERVER["HTTP_ACCEPT_LANGUAGE"])),$Ie,PREG_SET_ORDER);foreach($Ie
as$A)$va[$A[1]]=(isset($A[3])?$A[3]:1);arsort($va);foreach($va
as$y=>$zg){if(isset($re[$y])){$ca=$y;break;}$y=preg_replace('~-.*~','',$y);if(!isset($va[$y])&&isset($re[$y])){$ca=$y;break;}}}$zi=$_SESSION["translations"];if($_SESSION["translations_version"]!=424438045){$zi=array();$_SESSION["translations_version"]=424438045;}function
get_translations($qe){switch($qe){case"en":$g="A9DyÔ@s:ÀGà¡(¸ff¦ã	Ù:ÄS°Þa2\"1¦..L'I´êm#Çs,KOP#IÌ@%9¥i4Èo2ÏÆó Ë,9%ÀPÀb2£a¸àr\n2NCÈ(Þr4Í1C`(:Ebç9AÈi:&ãåy·Fó½ÐY\r´\n 8ZÔS=\$A¤`Ñ=ËÜ²0Ê\nÒãdFé	Þn:ZÎ°)­ãQ¦ÕÈmwÛøÝO¼êmfpQËÎqêaÊÄ¯±#q®w7SX3 o¢\n>ZMziÃÄs;ÙÌ_Å:øõð#|@è46Ã:¾\r-z| (j*¨0¦:-hæé/Ì¸ò8)+r^1/Ð¾Î·,ºZÓKXÂ9,¢pÊ:>#Öã(Þ6ÅqC´Iú|³©È¢,(y ¸,	%b{µÊ¢°µó9B)Bß+À1>îPÞµ\rÒÊü6¹2LP2\r«\\*ò©Jb=mèÂ1jHæá¤O\$¾ûºð4 ªjF÷oäâF4 #0z\r è8aÐ^õ\\N-ûº³á|Ñpä2á\r«:x7Ë<ÐØµáà^0Í#2jk6¸µ@îÂ­´âØÎA&2óu§\n®1úÝlÄ +Äãs	©Ä<³ MÒ]lì&!ãb_2»Oz\r±£a7¬Âö1 7òòãÃëiÚÃ\rìÓvÃ¨ÝbÀ«äÜ3èÎÎc2N1\0S<ðÔ=PÈ¤Ï­cå%­°¨à»ÿÍØÃ_accC ãÔ\n\"`@×_®dº7Ã(æÓ[V¥nÌ6¬9äÂh8kÑ/kË¯K,)+Z\"Êó°»åÔ¦\"MF»³¯¨¾'iÊB\r¿0Ì6NRLÇDB ÞMpò¯tûFØ^s1·t!Íº\n×p»7}K´`O-Ìdüâ>OÝ
6t¬¼Pcý_W×6WP½ØpÒb¤#2ãx×#Á\"Ö2ðI]xPÝÉôLïÜtZP*1nª}\\Ú¯Í7Ô«õ ×@}«I1T­/LÓtí>¨Cº£N	ÉS%RªÊ9W¹XèÈj¾X	F±I@·ÆïË©-d \$õª«Rä\$Õê¿
(T²SJqO*D©  .U\nª\$TsÍÆ°h\$Ð Fü70á=©4(Ízw=G²%é¢>nUí'¸¡I3B`9>ÄhHCfknyÜº(AûÙl
4¸4K0ÆEÊ[ÍúB?Ïhô·bjH\n-Èb|\n\n\0)\$D<LhBô\rÆý×¢dq2¤
»ã@yÉ3

è7< kcù°!°Ã>üO	ñ#g¹>ºÈôë2	lù(S>É\"QiS+ÀÏ&~M)%d´ä6
Oì±0<pÈOz}&°²HcÆZØ\$H\$A¹!õìó@@C³*\$Áá#ÑÙdxñÏâ|{«çrëÀ´É\0Â£W/T)U5hÒBZ³Á±P×´_¡%9ÁÉEî@XÁ%)¥Ã2GTT)´H#ÁRI´åÂÜéx Ì¥\"üPÕ±i;/M'\0£\\L©je	á8P T *­\0B`E¬Mz¯s}\r:Z¥-\n¥sN0gg<±±&çÑÀ%!¼ÕËj9ØTuZÙi-]Lôï7ã,bÍRHÇÁ©fÄ\\2Æ²Í±\"xNP0n|9¢²'(ý	 ó8~Ha>JrDþ`Ã¨g\rBIID!Òbc<ñ[ÒbálzUåMµ'KíÌh!K¡ÎØ÷H[Zh´<¢vHVºÙ\nÁ¥l]
¼^ÙxxC-i\n»òBIöì@dVÕKònÚ¨z¦K(T-,9WüïIJB*ó`ÎKZ/	ìï1Etg,ZNHL\"Ó`¤o(l%JÂC	\0ëé0däûO²YS¶^=FË¼HLw]Ù@Â!0¢lÝùOXÀð¤~Q\$N:ðÂÀËóËA.½2¡
Ìa2Æ3ÓÌçù­Ø
ß³UúÍ7°]ñæXÇè/-èL¼]t°fÄ¦å&Q	Á§	wL:GóÓ<áÆ0AjhrJ`(+PÄo?'<)1mdÄÈpHGd¿Åa5ØlÍY\n Ë9egÙ*jÃhI3¤ÀÅë4vYyÈ{H°£Å5,ÙXûoi¤«¸É»/×ó£ÏµìãPC*ní¿¼rÔ{Õ¢nðËfçcÞæ»,0aL2[P#gQÑ®FÆ3®´²ø¥~âåü¼AnlXz¿hY¾Üxæ°§ò+bö\r§d3ªôIn®\r¢Ô-ýfÃ%ÞvU´óíï¿ÎÉ®ÑóÝ½µºD~ÆrÏ¦Ù>Ô,Þùñ)¸5'ÑúB³ý{§î¥À'dçðË0´1KN]x4bdMsØÇ:,\\Ì±Tít×»Á²fdïÚà÷7àúòaÆ\n©Ý:ZåXÕ/-<Ç\0´¶LZ\\p1MªëÜêÉ¦;S¶!LÊ®ä\n_î[OùDæWÕVÞg0^Âì^GûOtÒ]Pó¸;ÏáÛÚû}'FÀ4¿oàð~jYþä;cüÞ
z8ÆÞÕñXµ5~Íãg£ôÃÿ¶ÿ\\)¯à-ØÁª¯þÆFõ\0ÄÔ5P/ 5æJbÊ	ê»£Ã\")*î#bðNÀÛÒ%\0îP<ëØßHÇp:êîÍ\0If¿
ªt&.ºð`\0ÞO ÈZDdgÄÊþ@20n£ÆV£ è!#²,`b,zùìò/ðXP°ýÐ¤6pÿP%j/°¦_oF©°¾r¥õ	ðC0þÐ\\pk	PÀêoj4ì\$Ã\$*ý\$Þ&ÃOìüñ
«\n®§\rRÃ)b1,\nG0\n£yÐî%°>&0¶J°Õ\nÍ<D\0K°Tá\0¥
þ£ ìzCN]ðµì\rhÒÌÑPµdü²ãpÞXð©B#Ã~Éé#\"â- 1t\\M©®øÎ­]ñä±fó/\0`B\0Øj\r Æ\rmvP.#0 ÒÇ6/'V\n ¨ÀZz5Âî9¬üÎ/ì%©>mÒÍ¼³.£Lb&G#0p«Âåºo¼º\0Ø«\$&6¢ób.äÖÄ)NV¢ïÇ²4²rJrV©8´äÄ\$fKC£!+^\nå'¤abòßçîNê%bîÐ¾ÒZö\rà±­ö»2]¦ ¾¶vÞ èriQð³f 6\$â½íÛ(\n¾+jo,¸ohurC0LNé @¯vd®Fº¯&y+NßìR0«`O`ê%êÈ¯²Z\"Ø\"vl« =È2r äbÆ92\n5C0)T²DÃ0+¸Ê°üâÐ»àËëjk°ro)¢ÔÅÄDKÞ ZMLþÉø*M3Ó@ê3FÀ";break;case"ar":$g="ÙC¶PÂ²l*\r,&\nÙA¶íø(J.0Se\\¶\r
bÙ@¶0´,\nQ,l)ÅÀ¦Âµ°¬Aòéj_1CÐM
«e¢S\ng@Ogë¨ôXÙDMë)°0cA¨Øn8Çe*y#au4¡ ´Ir*;rSÁUµdJ	}ÎÑ*zªU@¦X;ai1l(nóÕòýÃ[ÓydÞu'c(ÜoF±¤Øe3Nb¦ êp2NS¡ Ó³:LZúz¶PØ\\bæ¼uÄ.[¶Q`u	!­Jyµ&2¶(gTÍÔSÑMÆxì5g5¸K®K¦Â¦àØ÷á0Ê(ª7\rm8î7(ä9\rãf\"7NÂ9´£ ÞÙ4Ãxè¶ãxæ;Á#\"¸¿
´¥2É°W\"J\nî¦¬Bê'hkÀÅ«b¦Diâ\\@ªêÊp¬êyf ­9ÊÚV¨?TXW¡¡FÃÇ{â¹3)\"ªW9Ï|Á¨eRhU±¬Òªû1ÆÁP>¨ê\"o{ì\"7î^¥¶pL\n7OM*OÔÊ<7cpæ4ôRflN°SJ²\\EÒÜVÈJ+ï#ÅòÜJrª >³J­(ê¶\$(RMèúvGI£÷§»¦¸Å¥r°ìWjÕ|\"véÇ¥< kÕ(ÓÂã3\rÆ1¶T[×nÚ°hÅ´£¸ÒÞ³ð¸ÂÔÃÑ\0ä2\0ywÊ3¡Ð:æáxï
Ã\r£iÁPHÎ£p_püBJ`|6Á-+Ô3A#kuF\rÁà^0ÊzCÓÜªÖìÌÃåsj©Q8º²¥µu,15úÀXrZTÆª²në\"@P®0CsÔ3£(ÉZ(þfý¥²\$¶ÉÚö:äYk«òUô<ØÂ:¸ì0¨ÊûÅÝlSR¢²¸èiÂZ)¦vkR<ñJº#[èq77WSI°Y<Ñ´lúMT´ÑK§ÄÏ#oci@£cÂ7Sébµ!Åjhã;[3¬!{cTºª\\!>6}äTTÙoÒ1lkÀÈ¦g®[½¾·H
­rÇ`yÙrê1¶aÏæ]Ï7Öê(vpÃ½6¼+û²ÕqyjÍ«g< Bld5ï=ÔÐr°ã@Õ\r(oÁ6-3\n~3ÔX°¤ y¨dA¸<\0ê¢ªß\\!¼\0ØÃ9êkÔ:(ZC8a=@!µ @´pu7` 9IÈh²)
 A\n¡\$¥ê\nÐ\\ªj&HhÁòâËKo!¥±+4Jó¼\$(ÆåxÑYtrHJÐÆÒÙ¡9¢@Í(\\¸8 Z!/PÆ£TXdZÜÐ¯¥ø¿`0©ÃCb ½	(\0èÉÀ>¬õ²fPSßÙ{ä%äÀ*âò4\\ È\"WV%ê+ØDPVKI&a5¹Å²ó@¡à8ô²øËõ°ÁX8wa,,7 `\\ÃPê%E¨Ö0ÆHm¼6±é+ò|áv5³kÃkcÈqB¹ìÊ©2¤¤ý¬s¦¬µ(10¨\r*Þê4. Øì¥BÏV¶C4ÎCÉÃGe\ráÊ]FôÚQ6g¨ s^{øÑê6G-º,b_\nÛ£}¤9,³#R`E§ìÁØ	QI-GHU\$ú0£g(cë£Xkekhj	3~
Wu\ráÞµ÷ÓÙtÉYq`ªÅ¶°	°©¢Ôa}DCf»Ã\\Ö<J^Uy5°îohá¤3¯ðAHi©¥vÁÕ(ò|PÅ|ÄÅm¶£¨òíIÔ Å¢särÔËõô­#5Ièd»OÌ\$ ògÖ¨ikk`±üoú-ø9¡pÌlRÇ @Ç\rÐ
5­ètØ¨òÙÖk@'
0¨BÈÎ¯øÀÛµ\"¨YÙ{R- ¢Blâªèªµ8ûî×VO\$ÄÕiôJ+}ïÒ×Fp ¹ÙxnÂ b³ÞÀ@«@ 5«¼#@ ·Cs[\r3Én.¼Ov.hr4(öttUElÁ+D!ç&ÅÍÛy\0('à@BD!P\"äÌ(L¹QOÇUØ*N]T(¡U
4é`pxPåbJ`&GJÙ²_²OÂ%Â%&)mÒºG&)(!\0nq(5ÝèZê°A+ùA°1ÑPa`KóóK»F3\$F¦Ù»ÉÑ-æ³öNù<ZXhù´lMX9ö:ÍTüOá«Å¬KAïEÍA©ôÒåã¤KÍ¤îëlp¶OuP¬YÑzzí\$ÐÉ³ør\$9Í3¢h`\n\0\na¤=7ú¿<¢S\na×Ö*ÔðÉ(|04[×Èµ¤\"ìË7HAÝÚÖÍheäÑ´ÎÿÎÆd6æÆ{¯1ü[?wò%T/I¢æÜÞªj9)K¹¹ÜÎ£ záº¼ÜNóæJp?Fw¿jÎ9PÈ\nÅ4QHùô×åÊäOlr'óÇÖþÞÞ«TfR¬ð¨C	\0éðD)+°Ý¢\$ähSâo¬Ò~ÚÀ¼f¶\\Ï{×U±¨Ê¤ÒR{Åhà¼Åë6Ð(:eE¾\$¬J\r2eå·¤&ÜA:%Îç²h2>,4§
ÂÅ\"¦Î_Mä\"?P\\|#oðÅWÄ£OÒümêG~Ê>	î½Y\"A3ãdÈâ^¸5r?¤J£?À<þò¨!/1*qS\$ ê>ÉE
±Nª£³é)÷¹¥e¤R«¿ÇRn¶b¡F9Ap  òÏ&|GúÂ|¾|#ÞxN.gäHg&/m*ß\$µæ\$S©.Cöu@Ú`\"gè]¨¸0BÒÂ~X·PQM°iç0në\rT® üÅviN\$&Æple\":ìÆwnT-¢ØÄÖnª\"ìz(e@4ð&xÈíHð×»	¤¹,	PÒ÷#ôxí°?5æÈ+\$âPâðl¾«Bü¨Í%5°oOòyM\\Ô­`ÓÍ¨ô0ïØy
v¨â>ÇÊm8ÔÍ0}qÔÑ\r¡Ñ:|íu08ªMùGµç«°o\r§§\rèÙAnÓäT\"bBuÏrîê§~+g åêò&\\òÀ#.MíÏÐ®XþñÈh1hã©âkî]0{çúTCåqÀ1¥j)ìô!±<U<«\$Päÿ\">/¡P/Ämær0möcgNIÅê*±ñIx11úüB\0î	*î*.fÁñèäDÃÀ\$FbäÜ<m/r!&ÂDíü1«î[NaªCó\0ÎDä
|äÎpyÀHcqGfÏSPZ-²mS¬¿)	a¹(pQ(ÈºE¡WR-Â¯)Gù*+*È>ó+mÇr£,Ãgb'\0gôlfuÅNiG9	Ï\$.Ic\0Ñ}OöÒð;b³¡\r+É(N0])rÀ(313'0/32Prubú~%-ó<Ds2³9+ó=3 2,ûZ«Ù/Äc0\\ICðó34S^¢se(3a65	7sA-=8qVRÄ6n³ pé,pÜ!dQ6æ%S5ÎbsÄ7;.g9Q(.vý®u;S§9g?= L£*¢&ÜsYhT³\r;®\$JSï<UøS¨è.Gts:áÇ¯BÐfÕ-ãæÕNE²ó³2ÖätfÌ#5m,ß/bQíEný\"J¤qFË-ô8ç\"\"t'Ã¢iÏ/®P)4>@ Øk¾\r Æ\re@
Þofú7T\ràÈ\r Ì
¥Ö&`Å Ú´.´\n ¨ÀZþô=pBîëxýc7ï+'â«\r¢FòÍ@Âpi 	´I\0òávn&grrE't'¦\\çÇÆPpLï7ÐÒáUP?4	ÞÄ8°£r8/Qt¶=è%+SHâ·ì3å.úy/Ízðêhó?Ñ¢I¬ì:Ð0PyU(@LYTõ_>s&S)À¨P#f4CH³àÊb%	NZNG¢åU§L;^KÂ²hDÜF0\0ÿUgW.\"U\"iÑl0çJpaT)õ¸ªPïY\r\nñL.PðÅZ\nÅ¼ ê\r­Á64Ü\nIc&ÇS£¤øÈTûUc'Ëm¨Ó´..häÏêÐBÀ\rìvãV7e56\r»_RRVªKOôþéh?¶K@	\0t	 @¦\n`";break;case"bg":$g="ÐP´\rEÑ@4°!Awh Z(&Ô~\nfaÌÐNÅ`ÑþD
4ÐÕü\"Ð]4\r;Ae2­a°µ¢.aÂèúrpº@×|.W.X4òå«FPµÌâØ\$ªhRàsÉÜÊ}@¨ÐpÙÐæB¢4sE²Î¢7f&E, ÓiX\nFC1 Ôl7còØMEo)_G×ÒèÎ_<GÓ­}Í,këqPX}F³+9¤¬7i£Zè´iíQ¡³_a·ZË*¨n^¹ÉÕS¦Ü9¾ÿ£YVÚ¨~³]ÐX\\Ró6±õÔ}±jâ}	¬lê4v±ø=è3	´\0ù@D|ÜÂ¤³[ª^]#ðs.Õ3d\0*ÃXÜ7ãp@2CÞ9( Â:#Â9¡\0È7£Aèê8\\z8Fcïäm XúÂÉ4;¦rÔ'HS¹2Ë6A>éÂ¦6Ëÿ5	êÜ¸®kJ¾®&êªj½\"Kºüª°Ùß9{.äÎ-Ê^ä:*U?+*>SÁ3z>J&SKê&©ÞhR»Ö&³:ãÉ>I¬JªLãHHçªÜEq8ÝZVÑÕs[£Àè2ÃÒ7Ø«ùÎ­j /t°âZâÁ.ðñ OÐõmÕ5cCmÒ¨L¦X#äÄ³8éÂQ¢B«Å¤C*5\\ ÒÊ°2\r£HÝFÑÄuGÒ#ÇØÃpÏFÑ|cÆ£¸Ò:\rxë!9ÈÒDd#@ä2ÁèD4 à9Ax^;çpÃ`Q@]á}äy(ä2áÜ\r±\\kÑXÛØãpx!òãn9)-	;ë%Úï^\rÁ©jÊ£äú]U8{Ä²ìòüí»{vÒîM;Äò@O;D¯Kb¾¬UrÑ\nãä7`C:<kT´¢`O)Ë(3J>M+È{PHìhtTÍ4¡ù í¢S¡P3	ô÷8µi¢q~¢¶¯c+3ÜÁC%~#éÃpo	Üí×Þ8+
¿yqjL\"=¤ÊwV²H¬y4ªG²Ùú(:Úº,ýyÞ­\"ú#íóÂw¦DX\nARe+§n@Þn{%4ä×Je;Éd²&yVqèAL(Â!)?FL¯A.ôùÖPÇ¹¼®föx!BÅpýàÛ¡p¼n+²\n%èâ©[{Z½Êqañ`9ëVHçùè!°Õw¬õ¶tÎê4ÉH4(L	\$\\xÃ/WsaoÆ¥Ü¸%biTA!DÈ©4&l6@äéNÂ;æl ôÜ/K~%ÓÃ\0S4\r4ÇhÏ<SHÐQ&*¤¡3Ó|È¡öd4Á/IÊô sª0xáÎ8 sf±2¶LWQ0A»»Y&W¤©y\nMÁ=\nÍ©Õ]zÊ>¢åYß\$ÇîWËÑi,¬´KDP§Ò°O*í|ù2öôwKì.¢8â×	)¼°ïÊ&é<LªXKCtÒh*xÔ¥=\"P´á
R]ØÇmI9(P4BrÕ±5þÀXrIád,`ÈÁ@ eL±3dÍ³8ìéR~CFêì:5V©ÛTbM]¬¬¢þ¨[¡ÏÍqÈiKI:RK§+ê ê7Bx¥ÃzÕU9ø(X'+3ºÒ¶ZËÙ3f¬Ý³º@ÏB\rÍ	a,E²KKA¨XÕSð* >HèÓOIO2¡¡§ñ|;¹ bây3mòµ¶ÕêñãÙT­z°CÚ@Ï³g4¦¨îÇ¸^¹S°å^ÎÑDjÃiêÈh6À@¨pEd6W*C2Ã£AÌ:°æ ­¾\r¼3°+vÆÃ@ cÕYÜP@Ù]'\rÔô0ÀæsÏL&X«<©#	x¼<cf-°ÐT§yp 
ëAóD¦sHAn%æ¥0¨IQDk!:zÄ®ÐodAÈ4`Ò­C=ÆdI	+\$vÙ½Do ¹ÂläëÄQp-4Ð\$T4L4\"sH<]k·Cppcì\"¤vnÃ@iwevaoÑ®GaTmQJÉ6ô.ejS¼é({_\$î	,ºô`ÝÆ\$R±5ºã{%¤\nyK3ÜÊD^yO\nëGXîÒ¹¡JÀ·}Ò+ jñTpXËÚ\0ü\\	
F_BÈDV8ÒòH¼R%\$:LùÈ¯!=òq±k+.4Fx,ë\\X·meJ7 &ùûÅ%ÚJÃi%çw/K±[mBêTßÔ³%s©aròèZÉ¡ÆÒA*`r»&	/)qøO°àuù[A­mJj	×Ïû>sèèZ4+p³¢] FéÈ(°j®'ð7DV\\÷Z=r
ô«VÌxUªm:A '§ýÊPì;¸wYâD°6s Dðx4Äiæu¿ÙÍäF++¶©>lq§\$3~H:hbºìd5ë§EO¶Ç\r ±~ËÓU(ô½*üÝÔj)ñXdu­wXàMìÆ{-û7Pí1WµÌêL vÚ3f¹<Eiêµ<áïbAY¸\"ïU¹Ê¹Ò­et ¿øä^Ý¡áËiÐ\0ÓÊÆ5\\BïÇâ?ÊËÑ°MÏÙôÊ 87*.\0óEnG,YÔnè÷n\$³3Ëèç?¤ó§Ó\n/<î&óÔu¶¸!IAºó.ÆÝàb7 âû#aàü*78Eç?ªê_\">)¶ã
üFó·g9Ú+ü5çÀB#<°ÎV+Èd0Oðî +«³Ã6³HvlM Ù\0ôAê\0u.Iúé2ïå?\"F!.Ö7D©êPFí®®èP [£¥@\n¨ 	\0@ êE\0ÒG&elNG«a@äXdTí4%¼._sÇ6à@#*8ÁhsPªQ(FâÑ«H©IêJ)ä'\"²Iç7\nÊÑ+<ì)q
+	Ð¾]HyÐ²6GøN
Ù\rBÁ\r­Ð9ÅØüí]	cómPèúãñ'qPâ{MQì+ñ2êoÕñD½çúmäQpPúK¾M¸p-qc	âjzPÐÂÕ°Ò5-@Ôá|.!</öä-ö[NØ%ÑLÉøMÂÖôÑJ%±1òÜÑ¨Z	yi¤3 «fö)àH\$mÑÇ	#zÛÂ>¦ô;N.3Ãü÷mºè/*­¤Brâ§Î@Bjà(¾§ªÀ°¬àú \"bâB²upÁ!®ïRöã èî|jñ.´ N¸ª¨t{\"bì1Hïf­+-.¼R®Á%¢ã%H.Ô-%ë0oR#ÒûRVûZsNÌêïÁH´âoòX]MvwÂ¼(G¼O)DJLÒ´ÖÆ±À8 E@à±b/
Öü\r82ÎØh¬AÒ«bE\$§*Å+´ûïÐ×ìÍ\$EØá+H7GLâ¢Ç.R+çF,ÀPxðîT³\0S)gú]H¢¬\r|RtÿN&cÐ.34s8N²¢2vQ,Å#Çn2~JÑÁ3²!±q)-E6N¡4ðQ6ò.²¯0blÏ(mu!¯!4.0èì×r5MóHk7~¥\"³©8sbÂÂºõ}(­µ<b¼Úè`á0>xæÖ&PôL#óe53\råÕ=+=M­'Îõ=ëñ>!a>p­QÔÒðÖ+²Qÿ;ù/4DÒß¥Bç%Ó»0RzÔóÂßÂ¡rs:ríÂ£;ã1®.ÀÊ°áçbwDÎï ï<(ºµc|µÉ^:ëêc@}Blª§LÎå¼8kX]ôJÔ3ó@fÄ[/Í\n	~¾E.Û1VNxwxS;CÁCHñ&Ïh3ÒôfCüé\0]\0èaJB¼äÏû÷C''##qKOµ3óB³òúîd]?DòLÅ(èÐî`õ\0tîØQKú{8R`âgBÇcQ§³µ0¡³8t=Oª\$uDÏi%Q.ïEè)ÔÅMÈx4îïUgÛQÎß /Vé ¾AoP:ar7'Çåîd¨çIª6K ;e²½®%Ôm@tGBSBe9ó{ZÃe3PUNÔôAVt\\TK=:ò}VoçV±~zhÀ?¥_Mµâ×mõÓ@VX4á	^«èË:Õw-SÛ_¯]RØÒ#I¢¶¸\$¬MðBµTÃPQ<2óPïac(ce[c­WTS]ðbÐùd¬lx-?eSV+Ô>³µðNâ«3dôvh+`=¶GböehR®\rP4:\$Iý[°ÜT¶Wa[OÎÿ_2PuÿvlH8ïÿP v±fó¥SÒk\0¥Q;OÌ!VßmmU]ec^xü¦ýn`ótÙ6Çp6ñjU&5sT5~çÐ\\[ë.Îµ5mj§ô,ÆÌmnõ;õeå¼Æ& 7+:·o±â¢2\0¯Ç_¢ ôâ Bõd\")ñBig=Îø@uÈÕbøAPÝwíRrÎ·_iwxu½AÇQ1È#°¨£ µçèÀ.ä
	fQ²:qWO4ÔBµi³|nqUyb¹Ùyì\$ÀØbú:bbèG\nð§i¶S>K!G;\\·¦QØÜ÷IwKDè\0ª\n pI½Ï`kÑ#sësÑVÞB~7Ñ>}ÔÆHÇñÁzi4½¢+qÑpã)ÒVvn>#÷¬Åe@ãöYÖø¤+èN\"tX^ªX;Öþo®¢íD°ùâfQ%JÇOòxÄâwD³3¤T®yÍtkø(Iµ|óéÆÝV#&ïjÛ×0¸áèÆ4ª%/¶Ô8í/çèë²;*LwtÏ^Ê±\$9¾7¡LÒY9\$uj&¸ÿ®­¥ØãjM:Ô#x
K5%Pî|5§Av×³PW÷\0A%¦a öò'2®+3¹mïÕ\"üí£Q¼SÎÈ]¸^ooaî9OZtbHJnu§úåZ9D½ÓÌuìOÙ¼A»¢ÿÇÙ<áu<×´_H\rhç\n´3Ô8Æ//îs<Ó>r¾@ÞÄPì8Xv^AVh2ÝÈ¬Ö¢ö\\ÇtâA%Z5Ý×­q>8\0";break;case"bn":$g="àS)\nt]\0_ 	XD)L¨@Ð4l5ÁBQpÌÌ 9 \n¸ú\0,¡ÈhªSEÀ0èba%. ÑH¶\0¬.bÓÅ2nDÒe*D¦M¨É,OJÃ°v§©Ñ
\$:IKÊg5U4¡L	Nd!u>Ï&¶ËÔöåÒa\\­@'Jx¬ÉS¤Ñí4ÐP²D§±©êêzê¦.SÉõE<ùOS«éékbÊOÌafêhb\0§Bïðør¦ª)öªå²QÁWð²ëE{K§ÔPP~Í9\\§ël*_W	ãÞ7ôâÉ¼ê 4NÆQ¸Þ 8'cI°Êg2ÄO9Ôàd0<CA§ä:#Üº¸%3©5!nnJµmkÅü©,qÁî«@á­(n+LÝ9x£¡ÎkIÁÐ2ÁL\0I¡Î#VÜ¦ì#`¬æ¬BÄ4Ã:Ð ª,X¶í2À§§Î,(_)ìã7*¬\n£pÖóãp@2CÞ9.¢#ó\0#È2\rïÊ7ì8Móèá:c¼Þ2@LÚ ÜS6Ê\\4ÙGÊ\0Û/n:&Ú.Ht½·Ä¼/­0¸2î´ÉTgPEtÌ¥LÕ,L5HÁ§­ÄL¶G«ãjß%±ÒR±t¹ºÈÁ-IÔ04=XK¶\$Gf·Jzº·R\$a`(ªçÙ+b0ÖÈÿ@/râùMóXÝv¼íãN£Ãô7cHß~Q(L¬\$±wKR´ÂÜWF5\",Ôâ_-÷eRÚëÆ­¼SÒ8u*P©å\nÙÃ8§Ää½XTAÔ©JªäåàP2\r²dØOÓÍ>sý#Æøß²n NcêòãKøïO£ÑBPÃÈæ´4C(ÌC@è:t
ã¾ä9æ}8Mã8^2Á}9Ð´8^.AðÛ7¼`Í7¯Íü7xÂ`(gd±7DzÂ·+Â/FQñé§åÅ1A8ÕIËÁiÒ®\"ñ)Eô/Ñ)øT9tUÔ±Mã/i¸è½Ð78<Ú5´~B¸Â9\rÒ`Î£%=kàO³í¸¶ä\nÐ@åË¢¸¸Ý!kR{{JàTùLÑ84«sEq\\ÝÇ¶k0¥]u6`ÂCb}Á6PÊ¶Ãwnxè%CÔÙÔ|d\rò¾åd^ú9Uë¡s@AaJ,­²ü¢àÓ0¬Ìâ­¶¯á©0|êTÕ®r
ë1ìä)sn,!\$D*õ*&\n#ôp¿\n @l>kÐ0ÂHQ	µJj¹Vh§Ù¢uïBh1²rØgqpnÅbaI«°0txQ1&®áúÈ1 Þ|MC	SHÁLÉ+(T,¨µ©Y#y©ô%hòmÅÃwìqEÁ% SÔtHwÆ`°Êá>îM»É7SÉ\${%:&QØâÇ BêA<E®ÁåsD¬Â wNûÓ<¼3`ØÏK8Ä°S1Inyçq¡¸<\0ê¿«Ji\0ØÃ:Lm:)ÚC8aI½öz©úÌ¨·&ä§)
 °ÔY­-Ä@¦haEq+hÎBNÇ©Ss;@Ô¬1îéY°\nf>N,9NæÁ; é±°5þ¿C#?lG²¶vÒÚÛkon-ÍºÔ6ðÓ|éáyGàÁõ\\qÉ5È¹5`Ër/nòÝ\"jÈ[¾¬1{lrM\"lÍÈ¥£nÜ¥8Sju?Tõ¿¸¼ÃÀp\r-D6ÇS[Cjm¹¸7 îÝ°nM¹¼·¶ú¾WÚý_î\rÂÚpmoÒ²åÞ-W{GÒÜÖâTlvÎ³x2´ÐÄ3uFYuaa|wuÍ/#N#I«Ëü5PÙä	²['´C5OÓÉÀOHµ=çÊjj§ðùÈÃ\r²Ê[0Ó:N¢XB£M\nUjuÔÃ³¦H\n\"WCFYTlr&ß\0P\\M%Fä\r¢ÖiÉ)Á\rÚ ÇWu¼='¬öðÊö\0rÈÿ'¶³wÃxwÆê\$Ï%zì+R¹]{ìÙh!òkAÍA´ºã\rÁÂµ·\0×^Ðw?¡4[ÒÛP ¼7ÔòEàê¨sïJ&°¢,/GáD&xf¿ Y¢[ #+(cÅH)¨{ÐEØH]`M½y;f%]2b3Åû»nÊM{©d6JØSzcI'y ´ÐÉ|·gôù6Pã}É¸6ÔBÏòÊjsÝ;_\\z ÏY	D ;¹0/0O\naPI@UhìÃ:åa¡L
<¢ :8EéHhçtú)EºVEZp\\(F´¿ýC\0¶¤)^l_¸¿;­on­<1fp@ã ØÔÆ´¦ïh4ÚöÕ¸V¼Ö!Èñ§í¬j+4D ®uâ2ee-È2a¢vÌ|n­Õ·»óQ¡Ã#,Û±Ï¢\\½£ä(,CÎ\$XÐ´°¤v`ÄÞ\nÁ·*Ãààj(z>9bÙÑÊé
`BÃ§¼¢Ã«­xî÷kDimÎz©î¯¯»²¨öùHrP J+(Ý]*Ò&+½LBñ1{L¶9ùÚÚýö<ç/?Ó ÁyãJÁ\"(¦sèÈ¨¦[ël¼JIL)Q:
È.öÀ§pÏËáÎQLD2i|glHQÈÙòTDc·²ú+\$j«F\\gÎ«M'ÝJ#+)uø÷¯Ó)\$4¨-}	áL2ì_àòQðSÃL.T¢¬ëi\nR±òMþïÜ{CØ îu¥Ð)püÉJf\$\"îÄý(8öëäïåD¥ÇvhüëNÃe¼yd¾F'Ì8Æ2ãä0ä%\rºñ%êÍÉgøÝ¥Ï¶ÝÎy\$ê§PoüyÁLðÈÔ°Ð@åÄºIÊîÃ0J.püîÒTj)ä{B0)O]oÖU<£bR0Êè:óNìåzHôÎpz ¨\n`\roôL|OÀàÇ#ôQùïfÈ®ÌiÈÒP\n#g´àAªî~{Ç´@±<vÞQHÌW½ÐEút\nfñjô.1BwÑFøbvÎï¦âÝÂ(Ëª0p8PFq]z(ïoª¨DÓpZ1tÓ1ðo604
	(G¨ÃLÞ'4Þks#µîqñdQûÑhñc±°/q@àèÄÇÑRp@Ó#ª,äO§j_\neêkÂ'i â®0MÀî\$(-%Z¤QXüûQå#Çzåô,,öâ¼¹ÏÍ Ô«¢qö¦ÑDéq\$XrâÜ£BÉIs'+öñÁ\$¥X%BåL!Ç>/tÄ`yårxå\";Xÿ®É'ÊÜÄÇXå2læ-5Pí*°Ä7O6çV/¦/%Ò`åG2pz@¢jw°Ú¥ðHc2ïZùç\nð-L¦¯\n-ÏjiÑ´üçR#s	2@å£nÅ&±^¯²Z¥Ñ2'w2\r¯\0Ð¨.Am1a'd-ÏÎw¯1ù1M3±V´¦gÑZv«¡5±­JkïË6IKÏA\n2i8u&ó61r/Oç§Õ\rE*Hæêé.#\rs©MÀà]â5òï¸òcJß(Ð4çïpîÓÚå0bÂ0.}Î»4Ð8a=4	 È÷/8S®Ó1Ð,ìa 5hNç%Ì\0Pé30®KàRÒ­¶ó0Çÿo¸ÿ³9\"%øñîñ?ç0èbèåÏ3d-Aó]3ÓyDÏhúÔR1UGÓ1³?FI4òõ!Ôxrk3s¡Fì¥²k6´X3SqEòbV3w6éW&¯>ñ¡Ls§L©Û\$2ûAÉLÛ:ES/0Á0ò¯Ò?I¢¦±XrÕ(¯C\n,CÈG!EÑU1ÑCÓ;¤.w´©B'¿?;MT;gËQ²³èî,95ó¦,åÓtW!t¼}«B4¯UÌ8
ñãò(;4×GôÜU5tVO/V4ÓJÔ~©jÀÅ 7!PÆD0­.[2\\ÒÀ¢ÚÚ¯Z
XRz-jxÑ\"LHð¯tg'U®Rõ²}5[eM*é;@éQÕ¤!Õ_)j}ïr&U¼åòxëC	,Y±	ÅM8û,!ä`H)q>áM]¥ £wí&	ëää75u	C'p#8»/ÕWeuâ¾ÿUhJ³sY`K6c9NõoS¶ruÖyYMöó2á\r5ý]Ög&óVÕWH`-Ö¦oeTêÐõ7XTõV¤øÆhiX4U
Skµ<TJ5Ô¤¯\r½j´hm¯Ç0ðÃ\"CÜMôGù,¨['öð/ôñ½L6\$&1\$hR¤)5i-3ðu¹f´]göÉW!=Nue}iõsývÀfÖ[hZ-1sueAeNÖçhÍÄ5b¢`îhÄlûJéA¶°óAï5l6ÙvOºw×l#\nctÖO¥Ðèc\\à}®bÎR^ ÔUfÉV¯ÑJ·\rj¦æS¹·µn5YwÃt.ÚÒ·²wö­w§ôØñWÄU7Èx÷Í~Óww_w¥O}¢ºJ7ö¤7ÐßWcb²=\\V6Ô[K÷ÁO3U)4-ØAP÷>úw×kx\\)	cÒt2ÿ¢[tµc/Ëí :×·ioiÖµs{xð
×ûs·a~gF/e
/p÷
8ylwï­1ò/vÕsØUðHg¸\r®qlÓ´VéTb(÷'{¶mEö]j6	°sWrØpèç³×ÙqÞ@²Is4ÿdí/*¸ïj
/z3ÎMAQÄô¡QUHTUMk÷OrñûõNyA5|»6áxéÍ¼ä®R*,ÿVBÂR!UóAí¿mSóÙÙ#2Iyó-WR«Ro iú\rVØ`Ò`Ö¸kH£ö@ÞÒÉÚjÂêÎ\r¬ÞO¬Ö `ª\n p^J.¹m^!µGLaiYYù%Y
7+ùÛ-YÞ+õJ!Ùå+9é8çóa7Ó8ï&Ó£òË¡\\Í(D(ayª2%]\n·uIQÑ#>'@GB1cîÔ}ó®êÈ£~7ÿ&®l 2\\'ÿdÃp÷cààG´pì ?\0Zrn§¬ôMC%ÇLÙPòê®2DÝ'T{R£!'cnj!Â8²Ò;VÅ Ú«:µKç±ðízº®øë:¬\"j8± ºÑÕ6u
ø{Óxh¦åè>CÂ<lÔ¦ùà«Æ{e¡yZ\$:ööwQz¿­iL!ÈR W/âÜÂ;Rïl-pîÔB9T)N]'õ Ï024>é¢)ærï©eQ:à\nÆ ê\r·Ú8÷¤Hó6:Óî.³è§oS>¿\"«\"ñ«lzù\0~u½DôhïÎÉ`ÎÏ»ö@cª(Æí	w8­£N\rî:ãÔ?X|·}PËpÔD¹aÑoÍÆwÖ@	\0t	 @¦\n`";break;case"bs":$g="D0\rÌèeLçS¸Ò?	EÃ34S6MÆ¨AÂt7ÁÍptp@u9¦Ãx¸N0ÆV\"d7ÆódpÝÀØÓLüAH¡a)Ì
.RL¦¸	ºp7Áæ£L¸X\nFC1 Ôl7AGôn7ç(UÂl§¡ÐÂbeÄÑ´Ó>4¦Ó)Òy½FYÁÛ\n,Î¢Af ¸-±¤Øe3NwÓ|áH\r]øÅ§Ì43®XÕÝ£w³ÏA!D6eào7ÜY>9àqÃ\$ÑÐÝiMÆpVÅtb¨q\$«Ù¤Ö\n%ÜöLITÜk¸ÍÂ)Èä¹ªúþ0hèÞÕ4	\n\n:\nÀä:4P æ;®c\"\\&§HÚ\ro4 á¸xÈÐ@ó,ª\nl©EjÑ+)¸\nøCÈr5 ¢°Ò¯/û~¨°Ú;.ã¼®Èjâ&²f)|0B8Ê7±¤,¢þÓÅ­Zæþ'íº¦Ä£Êþ8Ü9#|æ	Á=\r¨»úQâè9ÇÄl:âÉâbr¢ªÊÜ«\n@ÃFû,\nhÔ£4cS=,##«MÉÄ¸BBÆ1µS£Æ&ðÅ!¼@43Ul\"9Âp¨XÐÉÁèD4 à9Ax^;ÚpÃQ(¯è\\¹á{(9xD¦Ãjæ(£2æ6£ó¨Üã|ÁKûúR(úFR¯pÃ+;2ðê5`ê2²4ÓQ ÎÓfºb-²W
Ã{,ÅTh®0¡ª(Î9¢1=n5HK&+ö]eô±JL\r#xÆ\rËõ ©\0ZÑ­¯Jý#£0Â:-º%ôºB0êûl;ÁIÁê4`¼0òÀÄÓ5£8É²\nYH¦+Â\rCªjèëj1Ì®£\$NF5ë´ò.5²hvüC£hàÓ±ÍôÓ¢âKÒ<¹Þ°ÀN_aøn=3wêýFôýKô£n#]øfPö¸YPv¨V«ÄÐ\"')ß0*§cÓÊ')xÂ¶9+ï/
õt×Ìßø PÓ|°Æ£@³,ÞH\rã0ÌªÉp·ÓôÀÞÖÞpòÎc­^¬C3P A¼3Pæ°Òóûm¢SöËÁ£h¡0RKpe2ÉXï@ÂFsX)R²vÌ¢ x
ÀÜ±.\n¤¤2ñGtû¸^IÕg\n
QÕÓ²t;©¹bÅ²bÎZIju¬¶\"ÛKuo~}²æÑyx5è½pV`b Tè§ì ÅL¬5:rQ\nF° Oê¿X+8 erÄXÑ=e¬Õ´VÕZñ9E¨¸òq9ÉÒ0®pæK4í\0:Fp|Òê¼Dä©5Ø	T0#G8:!ræGßbê!dÕ/ÄLHk3kä¦½ÈB®í]ÀØ¢?°¼Æ\"pÂ:nUOý`@K ,ÌWeô4æL` fLî´Ò]Ã./Eð)%ñ?hIÈph¡ (w¶¤Ê«^ Ä¢\\Ó±VgÑYÊÃFiM9©Dê°ÕD«fpoò Á¦/òzáLNS&qM\\m\\*ÂNEØEKsfèë2hË:z%ÊUà»CöIkNÀ6é ¨5+1¬6)7§y¦¹âyH¨y3E4¢uQ1Ct«6f¬Éêjf?èn\"-Ültê%èÙQåÂjjY('¸\0Â¤ýxÕ~[¢<A_É\\D.¹IR6e!&OàAànÄ(*åäGd;4>~ÛoZêÒh @ÜÔ.4Öw\0(+Q\n°â×÷1C7-«²zÞl1!L¶b6iÐ	á8P T 2äQ(s&iYO°Â\n@Uã\"Àz¯eî=Ér«¦+í~	z4qÒ¬ô°PvB%µ.Ð¾.×ä88 òÁ
v^0¸×¢(uâc¬¾ñQ8ywY;2m¥ÞxJ>É=Éä[\$ö¦mñ|WÃW
S@·;wrê²n=¡^CNpÖhú°íâ{lÈ¹~a,¡6(§Òo+¨°¡A(1HE
10rvHAT\rù¤¦ßå\rpÑ»·|Ëõ0åÓØz:AÉA7_Ûñq<Ç õ=÷¼\r\nÇËÇù³;ÈDæ2|LÄÌ¦0dò×té»º\rP8îÕ&ªôC4ÆýØ±ë!oÄë7~R(f'`k0ß²N\nSE¯ÊJM£Y]ä|&¶p¼7mÐ®bb<×I{Øô÷0À¨C	\0»/´úèúA¥Ì¡d²E\n,3h10¸ Á)2FQð²=Ãgc61RbQ!ä65¯&Tå'dqVÅ¿àx§\"âí{Ru0ànãèvd>Fê5ñ?äÜ¡r­±ÆE	¡ãÀçs>Í¹'vEÂy\"ç\$Äèg¦úÂ]8'!¯ t._S¹7XâÛ®C^Æúÿ10\\7¬-Ïû7^ã¼Æ>NæbSÉBü;²1xJ9\$%M,ò­.Ñß4\$íxàÊ¡¹©üþ¦H\nlà+  Ãqq8xòDÂÂÕIEKðº^üøÿ`%QÖk9Îº±_±: ù%</ÎËCï?ÕlÿLös]ë#N~uò·Êåßp¦È|É«ñ§p¨åûwËù¤kï~Døþ¡Îüº¯ð_¹Ú ÁnÁliÌl\"·¹k¬ÅúÒ\$Ó(´ãèÂãþÊ\"â¼³â°ÜÐj©ÒR0@¬ÿÀÉ\0	-\\ªC²È\nkÃ!Äpg­hGFn't  P2.Ëð# Lx³¤È¥ü~dý¢Ø¤49Ælùða\núGHû°n{Lüð:'Ïª%ÇÀÓM2ðý°þ\r,x0ý/n ôÝLL'OÈä@äÛâ~èÎB\$Îç.MÍ\ný°Ê¢Ã\r(æÐÖwP@0ÝbM\"í*ý°îÒ+¦Ød8ºâ	OÆ\rÑ\n#Mp<'Ñº± äP®9ÅðtB¬:º'±:gt!ÔSC6mcè¦@D
iÔ×bL 1JxI{p4oÂ 8.güÑj ¥®åâÇ¢FåÑ_Ì1Ø«°Muþ°ý<ÙÖqd\rÆn-PDð£	cNb±£)ßG¤Ç)}íÂm&æ8Ãb ÜQêÖqÃóÉ×ÍzÖJ\r ê&á íÆn¦â(cRcàSB.Ecõ)ü`hòîcM»ÏÛ\nO2í½Q%	Ô%ÒN.ÒÆ,ç&¸0æ ¦\"-ÞVU­´fkg&Ò~0ÒrË#(aLLI>ªÄ%çÇì¢\$É©¨/ûrä!Ç!Kº8ÇÆg	ñÐ%Ä
%îb%Òp8( Ò=\$g­­£*O~M¡2·%QÒ	òÿ/· qÓ-í0² Í/Mf¼Iç!~>%!Ì¯-¦PCi3RSqÜC³2=ÒÙÀìÐð.2Zgg¥c	â±ätËNTH¸®6ãTìth®×6Òón-8\"@*ÂÖ@`ä4&^1FÖ7è 9£R¼çN:ÑUNnél;fB Õ;(úd¼\rVºÓLÚ)\09qÅ\\Ë\"PB	¢ ª\n pMÆêîin,¾jQ!¤\$ô%t.UB.¤¨\"6²çÆjçjzÍVac\r¢|¼P*+#Ã3Ä>óösäø£6cÏú´Äj+£ÙdTD\rãÒÊE\n´tSäúúñt-hN´Çd¶ágXj-¸ûíVÌ%&Ð?t¤%t¨Ëjèö~-UKgT}At´Ñ\$fGÕ;ÀÞè0ÓiM´ÆLâb©Ï#G]ã7
áîÃ	p5¶#\0ÞDL40rÛ£(âHÔ`êI,9NgÆ­x'íC9LÂ8kã\r®zßOc&Åô[CpÊ!luô5ZkÏ1bà`äP\0î.*h1 ¤@Õ «>/óüIâ¬";break;case"ca":$g="E9jæe3NCðP\\33ADiÀÞs9LFÃ(Âd5MÇC	È@e6Æ¡àÊr´Òd`gI¶hpL§9¡Q*K¤Ì5L ÈS,¦W-\rÆù<òe4&\"ÀPÀb2£a¸àr\n1e£yÈÒg4&ÀQ:¸h4\rCà M¡Xa ç+âûÀàÄ\\>RñÊLK&ó®ÂvÖÄ±ØÓ3ÐñÃ©Âpt0Y\$lË1\"Pò ådøé\$Ä`o9>UÃ^yÅ==äÎ\n)ínÔ+Oo§M|°õ*u³¹ºNr9]xé{d­3jP(àÿcºê2&\": £:
\0êö\rrh(¨ê8£ÃpÉ\r#{\$¨j¢¬¤«#Ri*úÂhû´¡B Ò8BDÂªJ4²ãhÄÊn{øè°K« !/28,\$£Ã #¯@Ê:.Îj0·Ñ`@º¤ëÔÊ¨Ìé4ÙÄèÌU¦Pê¿&ÂJûÒ)¥ít9I09ÈË°!ÅSüí2!@Ô\$ÃHÆ4¦Z¡£&fðSM<Õ¨#ÜíP2&Õ:M\0Àc|BD\n0cB7èõ\"þ¿ãºX44»WAÃÉ ÐÊÁèD4 à9Ax^;Ûr?V¥árê3
îÐ_£HÈJ|6®¨êò3.©óÙxÂB)@Ë\\Å+Õ\"£I¢j/E`N¡Ì¨Æ:!LÇ%l.5È\$7âµ21,[.ÒßÊ+¤´­y&£ @1-ÀåùyD\r¨Ú½G±ü)CËÉ­Jl¦M[ÃoBönxÊ3,T\n;/c¨ËP#TÈÉ/9ÕC;=\\TTø° Rh8ÈÃb;\réHØ6\rúhe;L	]\rÊ3&ejmTRñeÊ2RÜDÕVOZîæÄLâÂÀVî22\0¦(¤«àÞ;SC§§ 8­3
{`Êôl¤>û(}³ÒwÑ/õhï[\n\rk^F¨*º¤P<VÌr2÷y£uOÿYI9â¥ÚêÏK=ÌàÙ0MJ££xÌ3Cµ;¡qUO² ÞW	ðn(hÉ0åtF1a!¼¼\$2 aá¼cìÍj  9bÿYÚ)
 ±C¨@?àäÀn5Äeêb;÷oä7*rx¨ßÉø_ä3äAW¡&Bx*µÀÌ<#%,Ó´ÔZËam-Àî·ay\\+rà^KÒ÷ÀFøwÊû&\$ÍMÊièp\r!Èþ@òë ²SÈªxcyþ7t ÔcØe
Yg´ø²µVºÙ[kuoÆ\"a2p;IÊ5®â(
º¨ ù3#tÇ\r50ã ¥J©É8/`Ûr]Ë¤DèTVJyÉÎ\"ÕqÂra\0åJ.!E er§ KrUa£éD(FlÊ7ãØ^Ó¢90ò9ü`É0ÊAÔâÀH(P	@ôØ  D jE©¾Gê!ÄÀèW\r`i5ÆÂI· AQ©ZVDy¹ðï\$Äí;J^xBTMÓ Tv@æÕÔëÈ7\$²\$xw04Rîµy¹m¨t\"	ÌÒn\$²Ò\$çIÐ 'µHR*ADhÊ bHy49 E6ßg=!2Ø£óW\"t§gØ1·Cþn©\n61ÌÙ<zÂT Êxûâ0M¦¬JI5bÂÂl*LðY¢ÊðÌqaôiáCÂVBcâTuöÖ·0°o#êø1w<è\nC`#J©q=VÒÖ»
6A0Pè^\$%%N_ÉIVÕ)ð\0U\n 
@æ®ÀD¡0\"ÝåSÔÓùg,ìÈê¸â8r r¸Ê'RKÉÃ\r|É* ÌB©):çdç0gÞ¤_[¯­dÑÕSÃFO!O\"ó\nE+N¨*d\r*¤ý{¶ã)%úÖoæÂC»©ñö%uÁ1;E kª\"à(+\$w*\$U!X©ÑfÒf))°´M(ã¹O T¨´{Ïá='*Ù@ÌJºP5²9\0¨öÑâM_1Sæ®É¸ñÓ*øÞ\r.Ã\$ÜÓøKÔÂÍl¸×PïCý{f@aÖúX+v,zW£ÃÂMÊ%§97üØÙt@fÐ¹*¹ÚÑµDþu\0ÔÇÚgÚDþôss#SÌ(ªÐ&íqzÀÜbI¡Ô4×whiB%kºC	ñ«cdü)³@ïB=#ð!éNmHÈ3@^k.|æ2³=äó7¢MQõ£2\\ÐÙ0
ÖÑFY¦ó}\$×I; èNûPô®¯þN2ÔB¨os>úH*ðÔ!ÒxÏ»£p	ùYD¼X\\¦i·gàDÕGåû­õ.WÌì×6Ë\rªoþLíT?!ßXEH+\n\0&pÉÓuÕR\\¥\"M<(DÕ¼ª;ÌI¹ur(Á7ã­ÚüÑ¡étllQúá/ULB>&~]TJw@0c@M\nÙ:)ºTûäBCèbÉ0çL!Â)Ì µb5SÒ´x

Îx0éaíµ VÉyÏ¨3GLä,ì	¬ôÛ:¸7Èpß©äZLÂúçµ*y³¹eM|c{§çÇdKÂ¨zÝ<|ÂHWýµp~L9Q!Ù ´ í(V@/:\"'ÿºA9®]SÆ±¼5 RPÒÁZÓ\nbgÂí.(Ã,gt`@Pn
x%êRI/d÷@øÌ`xÌd(oHdSü%/ú02R\r©Ø{0ÄpLÄÐ*áFxpX{æ	Dé/\\v'z|¯3OáÏn|nrØp^h­\0äÙ\"ôá<}\n°ÿâvxp=¢ã @áD?é0n÷ËÒÕ(TÐ'0¬ù	\rWu\núj-Tô°\n½P6Bê.èD0& AZ4Ãì\"²¾ì9CØH\0æC-Ô½fç\0ÈvZÐàC³³E %êVS\nÅF~¹@øÑHqÆÓäsëüÖ@ðÅñ\0½_oúxf2_\r,Bc\rÐUQÅ§°Åñ2Ð÷¯H­áñ0}ñùA¯oñÚq¬ØÄ;MxÕÈzÎÊÃ&jLK¢[±©	Ð¡\rðÉ
5¤«±õÉvdxhë&Ë2(ìpWChñÊÅòº²&ê2Lì9Ä}PÂKèþØÑ§ç àâ;{\$ Ë\$áy%2Wø²]&d¥û2o%T¥.`RM'ÒWH(ñ\"Bª²NÒ\01¥\$cÆôjÕÃõ0baR²#ò·2[+ÎÆOòvÔ,+ínÚHõCÙ+E\0\nnZç¥­H¨s+Ë2ô.Òí«0\0	üæÙ@
R²à0^?\"@¦i!âE ÷mhï³2ãòàæ\"äqÍÚeÈD¢âH/3Òùh÷3oõ±6/LUèü\nê L\0ØjúRÅ|ê&¨ûµ&¢J¦è& ybjB\nt\n ¨ÀZÒ#WP¸G¡3ð¦Þ±6³ÀA3Å#î>IÎyèìL¢ÅÑr-%Èl4z#Ö= è=ïn×#×V1Î´Ól0¢L*èjb÷+g\n¶eàs£n2';£¾\ngpHøG¥dDÝ#î&ÈOóGð0ÑÖõÃdd09±(d,×aNù^ÍÏ6§òTp7u£íÔ]HF,Î7Â\n0cP©(D ÃØ&Íôu1fæÐ(«4Ý4sHí\"ú¢dpÐ q\$D³,gLG\r\0000|d0&æ\r\"jóDlxW\0êgKõJ\$<UBôC´2.Çe?/Ì2\0003ÖÓ´ksÖï°gmFFåòt|.âì7A'~\r\$x	¤PÀ-¥àhä\0keR	\0@	 t\n`¦";break;case"cs":$g="O8'c!Ô~\nfaÌN2\ræC2i6á¦Q¸Âh90Ô'Hi¼êb7
À¢iði6Èæ´A;ÍY¢@v2\r&³yÎHsJGQª8%9¥e:L¦:e2ËèÇZt¬@\nFC1 Ôl7APèÉ4TÚØªùÍ¾j\nb¯dWeHèa1M³Ì¬«N¢´e¾Å^/Jà-{ÂJâpßlPÌDÜÒle2bçcèu:F¯ø×\rÈbÊ»PÃ77àLDn¯[?j1F¤»7ã÷»ó¶òI61T7r©¬Ù{FÁE3iõ­¼Ç^0òbbâ©îp@c4{Ì2²&·\0¶£r\"¢JZ\r(æ¥bä¢¦£k:ºCPè)Ëz=\n Ü1µc(Ö*\nª99*Ó^®¯ÀÊ:4ÐÆ2¹îYÖa¯£ ò8 QF&°XÂ?­|\$ß¸\n!\r)èäÓ<i©RB8Ê7±xä4ÆÐÂ5¢¥ô/jºPà'#dÎ¬Âãpô§Í0×¼c+è0²¦<¨ÑàÛ<J\0å²º	R3\$?Ã\0\n°Ò4;åæÞq ©B.úú8RÔÂDí'¸2\r²Ë@HÉ«åHLÈ­xá£f¶!\0Å=ApÂã~£0z\r è8aÐ^öÈ\\0ÕrTáxÆ9
ã9éHÈJ|;&±A(ÉKÊ1¦¡à^0ÉX­n=}#C{àóS¢5µê](7CkH77¨0Ôaø&Þ¶lÖ:¡í[Â7#0Á÷C*£%0ÂÀN[ÂÃÎeYè¹¼hÈê8£*GàP.'¥NLB`	0øä2Ë£s+eëñ&°B&7\rëûÝj=0ê7\rq3êc;_ø½|\rc\$D\r#´ò[:­\r6	\"\"GÙ_¦í1¤¹ëytgQ/Ì=?\n\"bnË³ ôl#(íÐ1l¢Üã8JÞàtB=9Â!×b;ñAH÷øèÒÝÐÑÞ<}ÙRò×´&\$-*	#l\nÅ£Ç¦÷wî.×sM¨ØÒb 
âø~<;`DÝCJ3<3Êã%MM24­pV¨NÐ@[\0h#DI2æ ¥S* Ó,õS9±ÐÕ¡³~ÌÕhn6Ø¿¢jÿIô\0\rðà@XH»÷ÖA9  vÈA`a`ë þ\0À3`0¯~À±BªEl-DCg°3DD6Òh/KñÁ'!
0¤p ~¡í´Î½Cm0M.	¶dý´FÝ#H¦Ðv8\\Ê1óøML\$7äI\nºªàÊ¯«!e ¦³ÒZYl-¥¹\"Vør\\+@ÞG ië°+pÒÃ¤BÁ}/Â:uÉ9\rEM)¹>OÑørUUdJe0ELé@V¡(b¨tlESDMa\"	HÒàË³ö²V\\YëEi­U®¶CºÛ[¨\nLÉµÈ	ä¶\rË±w=àNÚª+Bò´?ô^DÊaPY\0<yFÒ\$îZ9Õ0ÝÁpñ®©!zI	Á:U\"¤\"°«ve»ãºí%/£¦O¸5Eu[¼U;G|LUHH j\r\$¬¼ºÃÑÚJÂf\$øç'\n1ôùA3¬ÉIÆçà\0@¨B´G0PTJ\rRÄH52&V×Qo\$`2z¤Öi9)qÈIRª\"NÛSñZ¦ÒMí8fÇUDis1ärEbÊiGReÈâ]Nd ò\"\"\"Aç-R^g	]®ê¦,+ID	Ñ5!iô¤Î@f\"OÙ²àÔûóIÆ=n4DUÈF(U:D-åæQ¯Eæ¶,éê\"¬OîxBO\naQäûfÕUBg`iª&ÛY\0{a)x3ÎN¥F¥©°Æó?SÀV((î,7:II9V±\"¾Å¦r<H	°\r¡¾\0*Á¿&LãHHÈÚ
D¬!õZø­´
®¨ÌóBH£úX,hÒE(¥iåÄõVôY&\r¨'cònÊâ^d T¸£NAÆJùä·_Ò\nlä`òRÈ2ÈsËfÁ^¦yØ9òAF^Sþìì\"WùÁaYùúDî ayæ÷fÜì£Øxo?¬òé:FqJ úoX9b E¡M5Z¬U¬¯WiQPÆñSÄpÜSSoÓ'(Üþqi=eIP*=Óc\n	C(¦,)ÚáMKù	éîÒ\0ýsË¹¨Ò¡æÌòúÞ1å%dµ¥õC«}­dì20öäÐõ²Gj-Ø<e'nÆÉ\"QÜ-DPCà(-;ò¥²¡ÍÄäØïSÐÒøgê¿)oÂ¯·Pê|Öø°DÝk.\0eítn5â~ðÌÙÜÏË]äïCËÙx B·ZPQ Dl'¬¨C	^ßjk}Þ'å<_ÃÓ f`¼¯³8øÝ[72Êâ>³nÕ kgyÐiÚ9K§±õm4yðÒ	Ò<At9n¯Ç{A»'XìÙÔ6OÞÔÄð.Çz\"uÎén;bïhÌH¾ù]Ã#LÏÁöòçOVò\"7Ð±
²!»ÍõÔ9â;·cñö3?Jè§ï¨ì=÷Õv_[é¢þÊ<{^ôm¸Êð%Â8bIÓÑ#÷U®ÃwË\$ZÏæ¢x]mQ«¢UçzÅ;qTùúfpÊJ>ûêkØ§>ôIÚIãð{ñ³`îÒØ\\@þì¢QN6\$¾n\0ò82# @ì7§Næd£~í~ltÆ÷'VLø7äÆ5í®JÌ#Ä'P6\"¡¢~7y-j69bp\\Ü0TïãKðak>:RÐpZ3Lc£H*B7lÆÆ°kHßf¼¾\$|ØðhaLô7¢  à¤b\0È4¶\0È'p¨ägøH,Îô\"pÈ\r@	¾l\$Üb²®ÐïÏ\"4¬øh
vÝB²ý¦|h\0Æ\0PälLRÇÐÐÎLÞÄdÏ¬yð2äí\0±~´ Ôj°G'Îd}T¨IQ'0ï ¦Ú0|#0g£J\râ§>'\\|y0tûÄM£ÐAÎ4 ¢\"¶&V¹îÐqJí*OãÄgR7ãÎM°0ììí&ðíÄøð­ãqQ§=ÑU/&ðQ¸ÁlHÄÌPßÁïWæ'° ß¬U11íñóQ=@Ü%mÚÝæD/£~¦¢2øBåä@æk¢b¢BêZk+ÊdH°GÀàY<rÈ?#J^È&~9ª\"\"l±¥zY¤£eæ\rÍÈ7ÐftJÞ'Ë×\"º+0Ã±úßRßíäÌs0zÞì1l¦8òI\r¼Ûå5åÂyðJnR'´'
ý+NVbÍ¸äNH\n²«Ãäj×qI0w-2Æ\$;+ÑA'líCz£2âÐGµ/2Ô#/LCÂ/häh@L®G	ÆÌ¤<Ø¦º<æ¶Fî3ëñ1ç,òß2±Á3s.Ñ¿U 2·-êÝ\0@ãæÐ9²5q2ÆwÍ7³Tm#6Rú¢B¿Aàì>24/Æ\ndD(?«3,õ-ò\rs^RçqM8¢y:+3ðK/:?6òèS¹5õ*rÍ9cJ%sÇóHÔ³(óøår8àUóÉ>>Ñ÷³Ðà.+3¥ ÜáöPóq>T\0Uä,RÖøªFÎ^´*Í?4&Q4+)óüQ\\G R#êþ5Ó:aäÚ2\$ÄGgf=<´\0ë1áo]àæî4f´jíð)ÑhqFb5GãGFæÀí^AO.hÂ2ÃÐfg.\rf¨9ôl24fªo.Öò×G®5b4QµLfíô³â5L¼òQ·M\$ùIàa@Øc¼(gÁÉ¶1ò(
a
^©£ðFdÏ;DLürq%&²\$ôGafÏ¨&Àª\n p³«>^g¤®R]M\rLOhÃu<Öt
dûTB5Tä6-g.ÛNQØ¨Åd\"¢/E:{`dNuæ®Bþ? gð2 #t/ÄxKàl|Bd*Lî ëÕ1 è3O¤\$lª«lÜùL Åâ|S­\"º¦L¹-¸J(20^z³ Üa®}@-Ì÷=\rm^hVì´D}_Uæïü(à&¦RÆó_v	9Uó^G7a£>#Ê(PETÖb4únDn-¸`Cü9FðAP\$p×\"æÀB
e­Ó&²g¬'J\"b\räZ3m\0á-),:i¢<ï¶.=\0´CÆÓ(y°lg_\rî¨ÄlÈÂJ*|àÔuþËé`Öhõüly<'\$S Ü1à@I¢@@";break;case"da":$g="E9QÌÒk5NCðP\\33AAD³©¸ÜeAá\"©ÀØo0#cI°\\\n&MpciÔÚ :IM¤Js:0×#ØsBS\nNFMÂ,¬Ó8
P£FY80cA¨Øn8óh(Þr4Í&ã	°I7éS	|l
IÊFS%¦o7l51Ór¥°È(6n7ôé13/)°@a:0ì\nº]te²ëåæó8Íg:`ð¢	íöåh¸¶B\r¤gºÐ°ÀÛ)Þ0Å3Ëh\n!¦pQTÜk7Îô¸WXå'\"h.¦Þe9<:tá¸=3½È».Ø@;)CbÒ)XÂ¤bD¡MB£©*ZHÀ¾	8¦:'«Êì;Møè<ø9ãÐ\rî#jÂÖÂEBpÊ:Ñ Öæ¬ºÐÇ)ëªð¡¾+<!#\n#ÉC(ðÈ0ß(¤âbÅBò¨,¢EP~¶Ãr&7¤OôV:=j\0&8«\\b(!L.74(úÕ3# Úµ¨C#Þø¾h+ìü#Æø Ë>=CØãHè4\rã«B0¿/Ûú9`@SBz3¡ÐËt
ã½d\$3ú.ó¬ã8^¥ïÐæþ?ÁxD¢ÃjÎ-m¸äÈ¦2x!òN+0cj2=@P¬§ °àê5¬TaÍ\"0;\r#(î\\3RBpòÐ¶¸+#Üµã2æ2!.&·ð7£è´>*Dþ6¹óÅò¿4ÔZ¸iî*Ã(Ì0£cB;-£¬?jÖ°#\"·\0Ó)º(¥dc¥öàiÓ¸4Ë8æ²3Iû¦Ü/ùØCxÓ?°Â¢\rÎBC\$2@Îa¥Ýã`Z9l)\"`Z5¬µv«´ÌÙ](ÈÒÛe%7]»º09¡,'º±ºÀ3\\Úøq\0P ´]ÂÔ¿#kî9K\0Pòì7Ël VóÅ±ÂÏÆÛwöM4Ë>Òã0Í®ª{:Æ\" ßÎÃÊ9(´U3d¡ôµu9ß#8Âµ¸Ê[SC(P9
)8ª3:ZÒÐb¤#«¥
¡_°JVeb²«Àk¸òÆ8¨42I[lª6©õ[¥DÒ\$DRLÈJ«µW«f­T¸Jé^(\"Ø³CrÂÐxÐ/Å´PÒfiÜ¦pÕEÁv4/¥8T2ý4)ÈNJJrmi 2çP¡y:@¹QªUOUb®V\nÈ;«DýAr¹Wp
'%¥VsÎT!8>A ç2DÿÒañYF|ÐrtÞ2%YfJ3Â\nÔ0ps®¶ 4hßÚ¨¥pÆuý£>á\0 R¦­ôüáÉaC<%~ñóÇ)jUK	Ù±c¦m<ÚÉ9p1p2.¥s~¼À²pN¹@\$\0Zî%±>(@SI%ÂCjÒð\"Óª\\e.LÎ¸¡Kiåñí=Ç¼\\2q0'%¶voäiQ#'ÅN3ô¢ÞY¸8)¥:¯Ôû\0á 40ÑJ«²U2BÉQ,%Æ}àÌOÐaL¤`7¦\0o\\3égÏÖ sBËy.¸¾°\nP'[ô8²¤±/f°ÆGÏm:>'è¹QüxS\nA6M\nJB©9 ½5@CkVijª)ÂîP©\\¿'dõ°Ò\"n\$qBVhkLq\rfHâAË8HÍ¡µ Ô+\0F\nA,Ò#ÂSõ/ðñÏ(\\s(!KñÁà@BD!P\"ÚP@(L¶±3°ÔïH0P_2¥,&DÌ++-§rà\nd^IOË&¬¼6/9és.qF!5!»;õeonÔô·¥&j\nb/ú\"jþVÒÕZêEI¸7\nh]ÛqÇYE4s²ù×è&ÅÂ¿U&
`é\"Xu91&4È\r2Ý\$¯èj\\¡Üóha·Cû¨¦_ÍH!i¡u¬éd4¤?6³Õ[W\r`áuÞé¾>\"%\\±3\0]©m.×MQ\$D¬¿·ÓJ	d¬Ñ)KvFaä3 Ôm¬É|³yÎoòlÊ¢ã+¡ÂÒoÜruáã´v^Ï«&4¼³¬ÀÔk&\"«ºâ\\ûH
@¨BHöÑ^F)º´GýPÔg«zÊ>Â;\$ ¿Á\0/*ÌÞ²ÁXÆ1²ÚÀÆcs\0'µE©5Q?9=t\"þ@N®lÆ;k­õN¦(ZpRëÝ,PñKmQ­òh%¦²vº½ì0É¬¶0KÚ mÝa·ö.´ÜDN;´æ oþ)xòBËîFõ¯óBûd÷\rP	G²dÊ¢ ®CËL\0¶Ãa`Í±%lå8?Wß¥s©Ü¤TÛq²Ë9APZº_¶¹«Cá6uè@o²7¼ärê¬ÉQ½Ô2¤Þa¶úÄ\\¨òsÌúª5C>nYú,ô2ÜÏô;|1cK)°À¯jé¹\"Ëtæ´@Í|@_û?n
aÏ«²Å@ºQQpÈs.ðÒ2SDhÚÍ0\n0Éq\$@¥xÛvúü¼£Þÿä rù6ÛøäÝpz/e8æýOÀy{¿Ó&£~½MÄD~Ì¼¬6×u/aêýo/4^§§=_óÌ, M©uYÙ;¤\0ðL~.øcãë@~Xi×ÞÌì´ÏºYBæ3ô}Öofÿs­óîeÑg	\r÷¿ªd¶_IÅ¬9A¶[oÄÛ¯2@\nfÃ¬¯¥Di3ÄrÃJ.lÍlOúðÀÜTCtb\n,xdB¢'£â3°)'jüË4Ëbð%*oEàÊNFÊ¬Ü¦ðÌz]OjïëÐ[pt÷OÆê|otþoH½ädì|ÏoROÔõïÈ\$àÏê0y\nP¨­¯FöâNÊH\$ÜÐ#B\rÀCä6í¦Î\r
4k\$À[I2§	É*eTùå\0ê0ðìú/v\\ËÑpöÐ¢n¥Üx¾oÃò¾ø\\D?Clf1ª\rå bzÎän\\PlâïDüO*
 ×Ð¹ÑJ)QBïÏØ½¼(VJ+ÜteFb0ñqrD®£Ñ;:\n¼Ìw1Ìë,õüQ¢
©Q¢EQðfF0§	­>LQ+Ñ;¯T@\r	±¨ð´c40Ñ\08IÁiÀ)'&EQ1i¢\r
\$.MA«êKìSNfÜ\0QAr`a­@,dØ-ÀÒÔêÍxûMÜ.û2ûkÐd8\rV\rd\rmv¨×®îéË\"Bp	%
´à¨Àp|©Ä;äÐ_N×\rs®tÜrù\"*K´OzÕÊÜ×PZÂ112/bfíäT7®PD+Ã~¦»%æÛþ4Â,5X/­ kôtlÃ)lìCè9'Â1FJ¿Änê®B\" /\$pÄmD½Änú`+ÆßësåEõ0ó\$¯&màïèc)21Äéó1234/æ&#\"¾ò0F±¬våüg«:¬¢2l+>	 ÞëGñ&®Cîôjsk0­òè\nBB¿¢tÃê;	5Ú)æ0-.à¨º¬Þ£ô'¤U\"s0À2±ö£Æ¾+Û<eæLó>/ê®@î-KÑg;Âf·,Ô¤i¢F\".\r@";break;case"de":$g="S4@s4ÍSü%ÌÐpQ ß\n6LSpìo'C)¤@f2\rs)Î0a
À¢iði6Mddêb\$RCIäÃ[0ÓðcIÌè ÈS:y7§aót\$ÐtCÈf4ãÈ(Øeç*,t\n%ÉMÐb¡Äe6[æ@¢Âr¿dàQfa¯&7Ôªn9°ÔCÑg/ÑÁ¯* )aRA`êm+G;æ=DYÐë:¦ÖQÌùÂK\nc\n|j÷']ä²CÿÄâÁ\\¾<,å:ô\rÙ¨U;IzÈd£¾g#7%ÿ_,äaäa#\\çÎ\n£pÖ7\rãº:Cxäª\$kðÂÚ6#zZ@xæ:§xæ;ÁC\"f!1J*£nªªÅ.2:¨ºÏÛ8âQZ®¦,
\$	´î£0èí0£søÎHØÌÇKäZõC\nTõ¨m{ÇìS³C'¬ã¤9\r`P2ãlÂº±ª¿-êæAIàÝ8 Ñë£Ã\$f&G¢FC/0Úí¡²ã\"Èë¡DéÐãuB`Þ3  U.9ÃðÚö»Ì`2\r¨\nÂpªCTÓv1ij7íÛcÑ0îÅ\r{ùaCµE225¡àÂÐ¸c0z+ã à9Ax^;Ür5X¯p\\3
èà_fÕ2H^*!ðÛ)pÍ'1Ê@ã}1mØë³R:C«z:º´S:¢½b²´;ÒäKêþÛâ¥&.ïËã(ëY²ãF=B»®ØCÊH¹d½ÒIÅ«ÄÓ5>,8 ¿xZ\$ÀNM×;G1©éB·²l¸A¦(ò@Ïz4¤X3¨Ã(ÎìÛ:¹f6­J*å\$í@Rüóbõ²ÍÍÏ£ Ù%¿­ë¬@:O8ÇE;byý2\rû¶úê´8ÓN1tø×ãîSôOL
õcÌÛ±¿DuÔµsh6×1Êõ£Çzá=xÓ8õÉ'aÐQTÊ\"NßOÛkXÙ;jÒ cxÌ3\rf SPØ±Ót;+^@å{¥c`ßTU ÜÝvØ

ÁHÈ0pA-ÅßÓ@È	P a4ÂQ< \$ä6àúóí Ä1øwäýèä?×þP`o=¨à\\\r`0@4A Ý	C\naH#\0¨Í1àXEëXLH1² Á|R2Té<>-»¢_å0ÿE(:pÊò@AÖD<AÒ¯\\Ì¤rhù2IjU¬¶Û[«}p®5d¹è#`½Ì'uôx>;\\¬sÙù+ñ=úËc3#a¡âPkqH½ÅHoÑ¡\"NdÔó Z©×iOGîN\0Âdûý¡j­u³òàëXGð\\¹ä e])ø(	¼>waÀ·´·¤ >%í#\0VI5©Y	`äN[QO7 ¶ÒfN¡N2-ù`ª@P¡M_6æXs7åö²^T!jîCÒâø ËÞsRC1ÔVêñ_hö¡ÁÒÒBÉP g\rô#t ¢²9#Cñ¤ %8>·LKÙ±VgxC\"gøTÒJrGAAQ Yðäh¤d9\$ì1£âÃ}.±ªQj\$ÓMB¼§ÓÔE§|C\0)ß8ehëÙ|6Â`èS¿ª	U
êâèY-v,ó¢\nôì(¥}ØãØMÄx)ñ@ ÕÜ=%\"vA\0FVYþ¡tÊ§æCAH!f+È[7	m£^ÇÞºÓVÖìjàF/Í qÄ¨­£Hh\"RÜ
\0Â -jÊüÎ²ÊSý51p=My¶l^ÐG(å\$¥§KP¤¤\róºÇ~÷¾AoUÒ06¡Ê¯bÃ+ñ4¬¤æÕ\r5çºÄÉ^'=DF\n@ÐrTF!á q5£a?øªñ\rÍrfPdv^*\0Ï	.A8P T¸ì¡Pr9zöø0¦¤¿bJRçÝ5OBáhOõnOI	ÇâÂ£×àDxÄù·Wdóxgä3°äk¿ÄpùÀóöpìR0m\0è¢¯0JÕPøO0\n\nÆ4§HØuÍ¥9¤åd}Jµ0éÓ¾TZÀ¯ÖÐØ·7Ç\0@\\pFd;6Ú.ù¬Y:\rq:k´6K»ÉgÃ>GWªÖÆ²Ê¹çBfMN¦|&tÐPï¤ºce¼4e£·)\r:9Ô±«l þAiö¡!+\\Æ8ÌÈãbwdì¸2&L*FÈ\\x)E%Wf¡¤Ñ¢£*ÍB*\nhK]eÑ2s7n²ªóÀM\0~23:¯%ã¶ ¨C	\08É£fnÎkBÊá\r×¸JK}¬E\nÌ)áWÈ®\"mf .ÉY;4 lÍ#6ºA0 Úx\roOS¬Î#÷¥È	èý%>ºdzÿaê}ªÞÌ^ú4/0%ÊÙÐæÕWrèÓ¢¹>×Ö¢ðo%qõÈíÜÔé~øv³<Se²>;¯yüêOýÔöøg]'[M<[nABsÆ¿\\ÒÎ	3i¸Hz¦)d_T#mèLa
\$Ö©)°ÐÜh²Y	Ì2ÔôfÃæ]G(<åqlí:æ#RúþÉÎzÂ&\0¤;LÿÔ;(wýW02±dSûû'FÉ\$Á²íã\$Ïçcø#dìÙ£â¡-v Ð\nýoì+pÜpþnX0,þÌjRµÜ¸9©\\¥VM\$iÂþjjGlÄ¨A àNBÊdrëÜ5åL0ðbm,ÎÊ\nðl1FÒe\"¶wMÔÝYï<ÜÄú ¨g£÷\0@\0Ë\0RÉìÍå°Í¯ðt,á^%-°(¶zììÐ0®þpcÏî3ç¦ý/úþûãWkP\r°ÐzPóÚcìþhÖ\nN@¦P°ó ìöOÎì¢þìîò&@ùOçxî1ê6îÑ&ï	rßMVÆB0ß£h'p°Ï´Åí÷,kpõÐÝL\r±P%QT0jÑ0ÎÏà¢dc¤®\rè0\0æC¯¢z#¢>6<HBS èEª #ZBj\0U£Ký-_/@A	\0ðFâ²öD¾Z¨\n½°¦\r±G|
aíùloGMìßTÉBá®=Cb@Êb\0þ±nóÒ!Ð(Íü÷F'ðøÏò'Z1hs5#R,;ìÿ\$\"\$rÒNärU­%²D­P\$\\­Pø>§SCà#`	J,M¬Ð«Ph@òº·p10ä2Iÿ)±5q\rî?*°Ìxìþk¤¡²jÑÞÛ©,2¼pä+g\n\r¢Ï©'#	pZ#dæ\nC\"`ÖlðK&\\j#õé:ý°îRþo²5-Pû/ÆG1W\",ÿ1\0Ý¦A2S.y²¯Ü¡1±+Rc3Ð[,2å#Çá.:±[\$°Å50R!JàÓ_46nVsI6
g3²[F¼SrPäå+5R+*FFD6Y9nS9³m+f	!`É*îB1 ä´#Ö\nàÒE&æ^Ù,e|þ\rä2,¥<ÒÚÆÓÔØËbf	gän®§kÉ¥6®ï ;N%4\r#L'qFíhf\rW?®jä¬0£°üªNl\0\$`´FÑºN`ª\n p4 ÞEt6&nÅ3Võï#=ñ@Fqj#´c@±q(Àî´ÐvÐ\$îöÌ>2mîß#R×pmÃünù3ºç´¿Î*tcr6)IÆ»\$'C\"ZÚâREH¢#'ÐT,@R\nn-ÄÂFvLêP:0ãMÅ#ôoàW@PaÂqâH0#NðvÌ°Ï/ú#© uOçaN±\\ÏÐYOÔçQ°#³ØG%c6Ä#¡\"rúkS£UÔpB/m\0(Í|)mÒ#`ñUèM¬`\$¥f0¯\r\r\00031BM­&`ëµSM®âtQ­-#<RC¤Ø

CNãIO&\rÔø°¦ivcã,S­P(¬¨âÓKa\\5ÆrµÖÀÞ¿\0î¶DÛ2ÏPÞc¦ }O%0#I7à/b";break;case"el":$g="ÎJ³ìô=ÎZ &rÍ¿g¡Yè{=;	EÃ30æ\ng%!åèF¯3,åÌi¬`ÌôdL½I¥s
«9e'
A×ó¨='¤\nH|xÎVÃeH56Ï@TÐ:ºhÎ§Ïg;B¥=\\EPTD\rd.g2©MF2AÙV2iì¢q+Nd*S:d[h÷Ú²ÒG%ÖÊÊ..YJ¥#!Ðj62Ö>h\n¬QQ34dÎ%Y_Èìý\\RkÉ_®U¬[\nÉOWÕx¤:ñXÈ +\\­g´©+¶[JæÞyó\"ÝôEbw1uXK;rÒÊàhÔÞs3D6%ü±®
ï`þYJ¶F((zlÜ¦&sÒÂ/¡´Ð2®/%ºA¶[ï7°[¤ÏJXë¦	ÃÄ®KÚº¸më!iBdABpT20:º%±#ºq\\¾5)ªÂ¢*@I¡âªÀ\$Ð¤·¬6ï>Îr¸Ï¼gfyª/.J®?*ÃXÜ7ãp@2CÞ9)B Â:#Â9¡\0È7£A5ðê8\n8Ocï9)A\"\\=.ÈQ®èZä§¾Pä¾ªÚ*¨ô\0ª¹\\NJ«(ì*k[Â°ëbÜÆ(l²Ê1Q#\nM)Æ¥älÌh¤ÊªÂFt.KM@\$ºË@JynÅÑ¼/Jîò`¼ð3N¡¶B¡òÛzö,/Hç<ëNsxÝ~_Ô£Àè2ÃÒ7á¬)6Tª¼`gvN+o©îMÙÁÏªæ ¨;ñ¦«Úg6vv6N
ÓXµ¸¹\$\$ÎûÍn¬Åë ^¤É±ÍìÌgúqOÃi6
¢*ó02\r£HÝ8OÔBPÔE#Ç@áÃpÏ°OÓ¼ó=Ï£¸Ò:\rxëB!9ÑÔX¨Ð9£0z\r è8aÐ^üh\\0ê´àNc8_û¾ò9xDÁÃlç>êÃ4æ6ÎøxÜã|ß²Kv³Ï\"\\±Ùz\$¸ú§ï¯gç}ÖOd>/¤S±³Rø§Ðy«ç\nù\\9/ðv<N¬Ñ2z9ô©,ºB¸Â9\rÚ°Î£ @18Xøþ­ ª°of´E#>l]©²jìË±ZFDÿ¥ [bÖCoiÞ»ôNì)åD=²Ó\0v)q#â@ÄÎÉUH¥pzÅÒÈ¸Ì½!4\n-ºÐHÂ¥RË¡Ã.Lù!A6)±º
iÕ¨¼ZB4¤AWÃíÒ!9EÖ\"Gx3Ó\"tÜuqYfMuÆ@	\$*ü)
HbD>Ðj/\$*|0Îýå=ÓFs7\$*âB=tö^q(è5Ãæ.Háö
h­pI'ÔcºJ9%
Å¸hd&X©&`I¼¬¥-Å8gdõÜX8Ï×ÀB}{¡!õÁ°:\"@\$©J,ÅÔÈ² hdá¢½£»ÏsA²NÐÜ\$1a%*éá3ÊÑ2ÇYçR\n¯Ð±ÙbÓ¨4h& ÛÅAÍ1Y»a-	H¬:óuÂIkp	S¼­÷þYg¥.*5åvÅ\rÁ^y3þ6è\$äj4ÌSKC©å¢âAE] â°Â¥bD7
j¨ÐÂFLdýÄº© {ç&
qjvdÐCÊ «Â¤2ÛHwä\\R h)¥A:`ä«elíMªµpäÞÃaÁ¬7Ð@ßÜp®Ä¸·Ü{¯ÎP99g0ØtuNxYRÙc®0¢]VGpuKQ£è¥½ÃÄ®÷â^´´±JÓWê! Xû\"LYÊñP3ØÌêØgÄ8'áCq9ÈW×&å\\¸nrì)0æ çpIH­PRä³ÏÝ¡ÈLd,}]Í?PEIâ÷*)*´ÆÊL;g½/°)b8
Jòi3\$CÛ5óùþÂäpÞÝc%3%âI\\B}l6iÜcóO¡Á8W`Ú_aÌ.»0êØ f¸¤6ðÎÕ±3o\r\0¸'Õ÷Á\0cp7Y Â
6fÖiÜH×q?*ÕB¸Qbª@*´
a2!7ìOÅ}cR)ð¬[Ì@\$\0@\n)vç¤=ÔrºIYi;
å¦rØWvi³d@ÞÝiÁ¥~|`ÝR_J7·LP1° ©d»:B%v4æC,qpt	º5ØÁ@Èºä7æÝjs4ÇÚ¨gp¸«\"bkÈe0¢ÉÂ(]ÞÒ§*%Å¤Z×>H¥¸+o)Cí!Efb1HÝ07eÑLEàpïEÊ0Úü´TAUIC³&U¤þÄb-´ñ«¹ppA_(5n´ZÅ&áüÕ¨þ¬«GfJv°w¯JQ)Bµ8 \n<)
I'	<hvÉ/uàµF÷>ûÚÃ3{*ð}qÂÚÐà4CÜ4ç¸xIå/äë\r½gÐæë»DÉGfb©oÔ&m¢¨\"A\0F\nÚØ#§\n¦ô4\$8ýuýÃ{;dNV1Q\\oùéZ»© î.\\H¬V:!DZD¦-¡:Fsb~E\$	!äÖv	¤3@¡ôñ#ÏæRÏ/¼ÜÔ&Çª»k¬Æ^É¦Öx¨r¡_*Gq»êV
i¥½»mÅ{¬¿7O5¦ÏÛÍ=û6÷è ï§¶~´áûÊ±u#Ü2\n£K©)Ì(À¿ÁÛ²ËÊßCÂõØMf*'j­/àéX\"ª*LÁ\0o2ã°]%¸8Å<ÃÈÞæº'çþ*¯Ë®ËI¸8ä\$¢¢¢4§r{@t¾NÌ ®ÐDðBIiÌ-lèÎÃLh¯{Îf5el#ïN{¤D¦ÑÄÜälJ&.æ\r¶\$bÒ÷áÚ*øM¸/+üf¯ÿÈ2ð¾Õ\"èþä°KAý°W®®E	©¢Ynwg¶¥Dx(æÀPÚäBRpE.)²
çª¼§ëÛÐ&a\$F[édª¶(ð'Ãê¦	/)\0ùo(¢ÁïFïïB*¨¶/æ5\nJÐïÐjùI½E7	õæ¸FiËIÂ  ëT¦i\" -§Ð\$T
b7Pôõ®>¨Ft­O\0G\0ÈºÌZçÅ @\n¨ 	\0@ êN\0ÒP&Àp\r8P¬lkÀäae\"²ëÃÚÛ¤-¤¿(j\0^2~Lä+X~ñüV´*	DW#\\ðálàª¯þcd0\$ÏäJ´+z¡±ð7 dt\"£RER\r'ÄâG!ìÑ\"!\"r*ÕbÚê4/÷#ª&
,¹D¨<|ËE;1VG¾É½*,§\"W­\$ï\$ÒlËÈðr9%¡J2òGÄ(²06/gñ* ÒW&²­+¶Ë1z Å¢Re¸%¨!p¦üR	+	bÌÛ\\WI÷\0Ët¤ärÃÁbÁ¢ä[ê\\ N¤ròEöRN=l>F,ÅÉ~wFH¤c'â(j*îä2ÆBï¯dÄÀÊRÓFÓ!/¯xcíæT.85¢'lÊ2HÎ2ÅÔhØÔÈ¾|N¿ÏÒ'PIl\nd@/b|óz¾-ºÂÅÔ4BÍäæbì®8S	1Ã!HFÇÈJóx\0GA9Ïô!G<ÓØEÑpÓ)-=ák>0¯Ò¢¨R/#ð(âÒÐÂ@îk¤^þ°· ÜCãA\$\n=/Ä+qzÅDBôBBG»B
\\1ÉqVA´67\nõçt¾é{Bh¾[ÂÜæÒ,·øÂ\n`UtF\0N@à¾@~½:ÚòBö¦TábIt ì2¬Ïðð<*´0¼Ô5&F
lö]±²fLLî,¯-@SIÏ`[\"LþDþã(ÿ48ôi
N
ê(Om©>ä \\goDi6:3óO/Hþv´3DÔÁ?hIHes×NÔE*D	.tE\0µGÕS%RÕ>¾ô-K°ÑRSôðÕ5q\"´?Ä.r%2ÉP!k%êK&\"G&sõ&Ñÿ\$³VVÉ}(²£%UyWÂ§X3\"j ÒuTé¼1\r, ,,ÃôJÓÛOM\$q.-²wuÀ·1UÃíUÔó]U¹]½9o\r\\SguýÕIDõJíþBê.²+1çnÚáÅK\"£¸Ý\nð¤FH¤OËòä	4âtÆ!ë[\r*D'³sdÎN%²Ã'ûMV\"5±\\V.=ì'e64¿3¼ðUÚÂM ëO_/¤5ßµÇ]AtÑbQrÑ\$øñ+`ïfäúÇ¢xNw^t»^µK`µi\rUË>tïRsãkÝ(vTVKõ_I5ni;lÖºt¨.&km55]!èÁKt/0Öé^â­póq4C\r)s\0öm÷RÂMr©CörÓÂ,÷tÔ·Bb+0ä/u²®¥¢EdèókÃë\\#ð-£W5\0Â¨Æ?6·Y\"«YtëA×	RËV·ÀÖÁqíTÕçUCuGqµÓKsà×HEÒ{úúþJ±=Bó|WEnWÂ.hP+TIín×+µA}g<Ù\n¢¦d²0«Nr,t·d0ôJPÎ\"BÌ3y1<­éN¾WKzöït£l¨vj?¸<7U¶ÇyQU\r|Ø;©·ê]GM8?
£T&x7\\ø#\"·w'4K©qwÊüyOÝVA:ëD¤áxÖë[X¨COoUpøB«ÏØ§h«8QV	×É
-³0be´§}·±oquxà·B\$\\±|w>¹4:eÈcxyïñâMíóeØGµ`´F\\Írçrø²¸×Ól8Ã1zncÍã=6K÷hï\"§û|È[ñ6¤rÈº8êß\$Lâ,¹e,9hEylbÅ(³ÍZÌ4eH¿YZ«K;Y\0£u£#\",8ý?ÇÑ+,¯\"òeZz~Sû=²ø
\$>Ò¦TÀ Ø`Æ\r\rrnTëëGTs¥QyÑð2½sUê?#É)NÁ3PW¶HÀÜµ3\0C¦d>È§\$l\n ¨ÀZ='&î\"@sò£9#õ±£-Ô\nGoù'blÏ¤p%ÄC§ùo¶¿E´>øOéÐdÎ°L¤tbìÞç°¿ï©uZ§6 J.RÀS¤Z.bâ.nßµè¼ú\0«öÌtØ0¡L«uÙËÚ¦âMDºÔËhiÂ@Nª&WV<LRÆC3EÏjëó0Qv,ÖÔCç¸ÞtrÝ¨fS\"vþ;¦Ûû>\"	²;Y(ê`¤tuptÁ³zo´9\rmsß´Ïå³ÙBF
\\'âzª÷þÙ{M]´\$<G1Olö½JÙR.p?3¶gÞè7Àü[?¶OzS¢FO{M±iû:à;±ueÏ»Guh­(îÁf<zEJÅÐ-Í¨2RU§Ñ#¸®¼JE¢·n.9ñYºïZÈAzÌärÞd#\$0)³:6§ÓôçP©Pû\"²@ßG´\ràìN\0îÒ&Ø<8@­ÑLÐ¸¤.Y£½k=	l;¾SBECQfX";break;case"es":$g="Â_NgF@s2Î§#xü%ÌÐpQ8Þ 2ÄyÌÒb6Dlpät0£Á¤Æh4âàQY(6Xk¹¶\nxEÌ)tÂe	Nd)¤\nrÌbæè¹2Í\0¡Äd3\rFÃqÀän4¡U@Q¼äi3ÚL&È­V®t2ç4&Ì1¤Ç)Lç(N\"-»ÞDËMçQ ÂvU#vó±¦BgÞâçSÃx½Ì#WÉÐuë@­¾æR <fóqÒÓ¸prqß¼än£3t\"O¿B7À(§´æ¦É%ËvIÁç ¢©ÏU7ê{Ñå9Mó	ü9ÍJ¨: íbMðæ;­Ã\"h(-Á\0ÌÏ­Á`@:¡¸Ü0\n@6/Ìðê.#R¥)°Ê©8â¬4«	 0¨pØ*\r(â4¡°«C\$É\\.9¹**aCkìB0ÊÃÐ· PóHÂÞ¯PÊ:F[*ú\nPA¯3:E5B3R­£Î#0&F	@æ0#¤#?ÐÌ<×OÓØ¦û4®svöÈ®xâLúw*Oü;\0005ò`7®#s ß%N9REª jÒûC£|7À á¥£Æ£ËR[¿\nD;#¤¦:Àä9Ápl,CC3¡Ð:æáxïm
Ñ¥T7>ÁrÜ3
ëÈ_cÙ#ÈJP|6­ÉÒ3-ÉËâxÂ&´`Ü<ÓQDcK>#´Ë£è
Ê¬Â°éSJâ,Ã7í¤ª'£*-2³+¥+BÕ=£ @1+Àåù2Qã`ê6ÆÑÂ9KÎ*S#	#pÆÆIN*.0ØR\nã8`P2Âc¨ÙËC2Ì@:èÑ-Á=±L¤i&Qîk4e<ç9©*÷TÚÝ¨coµ;(<UNí6µX#®]/ÄüÄÖÛfÝ&êÉ¼Ü°ôõ¹¨¸¦(Uá®·qZebxâUJÐTÅÒcxª8ä/XÆ7èÏ`2½hnÒù}-AÓ3Ø Ò4ÈLK=)*Ü7b(ñ±ËÌò­}ÞÐ`!&£w*²Ë.jíÛ4Î%)Þ3Ï%Á>Õ\"T#Ûm<*\réèÂ78;­ÀfjÈ}Næ
Á!0¨YrßX0RMÀk2A)
 u±<8\0¬ÈCcYWeäÒðØGUâ
Rä±z ÚÕ3;ÄeÇ¤z\\ÃK5Çâ*J~xø¨jÏ U|û!eDG*Yug­¦µVºÙ[aÝnªV~Wå\rÀ½¸öÄ»ôm8Å©|¯²h¡ß«n8HÑ£@Â
\n&L-£ô8 4ô72d`ñx%K¡.£ IAÀ-¬æ©¢Ö[in-èÎ¸ä\\ÉÌ¼§XÖ»C>y!À´éAòi#I)a#T	Ì\$h û9¸~(b2DeæÓúi~#H?FÄFbYDaÍ,\0ØK&Q>ÐÕ%2àÂ¤\"È^§fêÁ\rÅ¹p¤ÑÜ\r%ÌÌó<peb\$~ÄTð¶8¦¢\"³\\\08oz¸\nJA Æ9ÂÐH\nË@\rËm«¤ühÉÅ5¹¤`-á¼;¢h£!ÉÀä\\1È¤6¸s\"å¤átJ&É\$djC oÖò\rÁÁb´%Ypw&¾`¦ËÉQhb¼ån`â g#IOÉ%\$Få\$	°X1¨@H\$\"Ó%²o3\$6X50V¼²å
KÌc· hHØ¥*ª%êÚÂlª±¨Aá<)
Hc\\ÉlàÅ¿²	RÐd¡èÃ¤\"pNâk%¬í¾¡ú&j91®Q7R©=DÑóÖ´/-}nC¸6Å´`©D-q#yDaÙCÕc ?,â©XÚ{8häÐ0vC\nVû´B»'
 ¥¨mU)_6v¶\nÁ(/c8
Å@Ã
ÉDÍÅÓv`oQ->òbúCQÏ&Ç\r·QOá0¨
¸Æ0àÂM1º;uPÀ2E¿4£¾EIønö8vßä4öÃ½2 ¤À¬ÐÓr{ D¡
cíKÑJRé]©B*r¾¡T\n=!êD\nV!OLçDEáóÊZÆ1½=ß}!ê7zª ·ç/Uê\$,9-ã<ó^ó±C
¦Gi¯>Óí«¶vÃ¸\n_ÌcEÐ0Äkj¨.±ôÅ¬»u.å©LÂÒsØ­1\rH>H¯z6L´t¶}bq,%TqªEMCuô\$AÂb¿¶úw¢®I«ÕL§ë9å;0\"ÏÛ«zFþóB T¿! ;rÞj_MV(åÓbj}ëù,¡©'¬F±(!ì¸¶høL°ofl»2döÚR#WEÜ01ðã\\
¸»Æã\$´3TvÎO â<æHÿ*ãÜ³#òhcÍJ:#é£
óS~Ê:H³ª×C¦hB)y¹(rëIÉåEÇ¤á¾óß[\n!ê½ób5Ö¹u)½]æ7óÊ`wyfº#,ÞXa¾¹Ô§e\$CLæ²-Æ\$¨bÜEy%TÔ1K¢kÛ\røAñ¥KslÓg÷##°åDQôgáòÛK{QËýMæ¶:`c\$|EW#(H½×+^ÃûÿÉT>ÙGªJñ¤~?áì#]ôËìøÏÿà¼qZóV//ÂýhÎR_®èmµ\"%ÑÂ¤µC~I¼ïôÉßýì´%& Ñ/Ê^\$öÖ\rp©`lã0gÏDÖãVægFxCP
çÃ Rû£JÌªÇ+Ü÷¯Øûxd1¨ÂO¥ÇSµpJÊÉcMjúçº{ï Èï~wM5ðvÓ'pC«¨t	RÐÃªæn¬èÎNç:!xÇÈHæ. äPì¨üå8çC/\n/3\0§Ê¾]PW-d7oðÄÙ.²vl	BÁÐ*Î\"Ü×bô8&òoBô:Èf« æ^öG ÞBÂ\$^ i2CH­p#F\$JËãpú×ãHP\"å>Î¤lûm.ñ'¨àÜFPÞqCìg¯Pm|-Ö£vØ¤(FÍV%ØúÏ¹ðÊú0m|ûæbÄòJ­ÚÝpr÷Èuæ0)­Ü¤æÏAL¨qq²îâÐÄD-&pÃ%\$¢B§0DcìÜÌ¸9MÕ¬ÈtÜíÒUQ¡f8÷ñý±¶åíièl*ñ¾ËmÑ Ã¶iL¤zjúlörÌ¦4r&0rqpw¦²üÒH
\$PîKqO¹%FBì1É2W&Rø¯¹\"\\!jêr.;%÷\$q÷O}°Ú³Q'ògíÚ­/ØR¢Ù¥Ò*Äa*R³!/'C*í¬ñqu,r»+GpgñÂ9íêD²©!Râ'±¼ø¨u.²&/ÀÐø.JD¬ñêqð7fi\"LºRæ\nsêÈS¯KØþÓeÃ\$OÂP.§.%gq	Îç¢fãs@Èa4p¥2L\0Øjz0Ê\"ÿÌ»bæB2¤#lH^&»Hn²iÂÀª\n q0bÔ&Rd° \$'4³÷j\\îçâªH:èo Òl
Ä8ü1n/È®ô¡Å)cØ8ÃÈ©ój/-´w±ñ#j¬TrT)ìº(SjÜ^?4FÂÜÂ\nS¤ªI®(3Îä/ÏÉhKãfÑi*ó6Î¦¢cJIbô¡&=´08i0É\rZ¡2÷ÂüûB#C<i2J\$8ÅTNùÂú#CbäôJÄ0uÇ²½ÂõD¦OÃvpl8pÌ utp§\$P 0Æü J.CÈûÓÏ:¼ï@êgl>qqrCfÐÂJ!ü7dµ*Cvöiöô¬\\Me\"wÐ[H¬[¥E#v\rëÔâÞÒ2ì,H±±>¢X^P:\"là	\0@	 t\n`¦";break;case"et":$g="K0ÄóaÈ 5MÆC)°~\nfaÌF0M\ry9&!¤Û\n2IIÙµcf±p(a5æ3#t¤ÍÎ§SÖ%9¦±ÔpËNS\$ÔX\nFC1 Ôl7AGHñ Ò\n7&xTØ\n*LPÚ| ¨Ôê³jÂ\n)NfSÒÿ9àÍf\\U}:¤RÉ¼ê 4NÒq¾Uj;F¦| é:/ÇIIÒÍÃ ³RË7
Ãí°a¨Ã½a©±¶táp­Æ÷Aß¸'#<{ËÐà¢]§îa½È	×ÀU7ó§spÊr9Zf¤CÆ)2ô¹Ó¤WROèàcºÒ½	êö±jx²¿©Ò2¡nóv)\nZÞ£~2§,X÷#j*D(Ò2<pÂß,
â<1E`P:£Ô  Îâ88#(ìç!jD0´`P¶#+%ãÖ	èéJAH#£xÚñRþ\"0K KKÜ7LÉJSCÜ<5rt7ÎÉ¨F¢\n/ÃÈ\nL7í<)½ìÜEÍðÜ,ðKâSðÉ@\$h°7­«ÁBSÞ:È<¾¡­.N/Ë÷B¿Ã\0þ#ÆÂ'NÐ@ßµkîêÐËVT	,`@7ã@ä2ÁèD4 à9Ax^;ÛrHë=árÒ3
ð _±6@^)ðÚ´¥(PÌ´¯¨Ó<xÂ&¢²FÞ1ºë8*~Â¨£Z¦¢,âjúß²I Êþ
°\"òÖª7ía®¡­@Tö9·èHä5 P¯&ÑîÒ, ðò¤æl:,â³Äê.ò<8;ô¾70Òm*óK×û6?ª\nH@Ph#® 2C`ë»¬/áS¼ñÏjÀ	ã¢t2CF&%Óä¬[2ë£ (\r#Hä¿Å	Îx\r#XÖ£.\r
ÆÚÐØÓM¨¨ÆÆ0íØ+yk,ÔecnÞ'êlØ¾cÜþ2Ð;~6¿\"³E
ä´Û=äj%+Ùö¹\0Öñ\r QJ­j4z\$°J©Ï¤³÷ÁØ.OL :°Àw^ÅìZÊ²òjR7Ã26ÏTâ8c|¸P+^ÒvªÙ\\f´^²vYI\0ÎFOi\nC\n
`Ê\n)6½/R¦S\nAe 6¼{IZ*0Æ®/G´×ÑRý8/è?eÀGE¨n'¦£\"vöNAóN%Ï\0ªÉèrYA<¢VaYëEi­U®¶VÚÝ[ê±qEÊyùMñ<.°}±Ú_+ìÚ+
îíIHJhl~Ð°¡¶@§Ã)5&æ÷¬eÒÓppD,µÖÔZËam-Àî·¢Bá\\q}r§D(ãì`ùè\nÑÃ¤kÉÉ/àÞAÍ;þxà©£Þ½IëH¦&7¨ò)\$Sô:}J¤>%*Ö2ÕsÁÊ!%òC1¬N%\näãÑlËÓ7\"*Rø k<4ÒL5¥@§¢ðFP d;ÆD¢BJÓ:4dpÓ±9AÂH\nÝ	¡YaR¡H@(!§zÙâº!ÀÐ#I/Û¹0@þ+¹ Ã¼zx5ÙLsß¥AQ¹,ùh@:VòÐöåâæÈDrÌÃAÅ-kQÙÌåÞt'ézÂ[ÍñWaÉ!â\naÔA0ÿ52tñA\$,	)¤¦
ÎZF³Ã0?¡øØ&S>=¡=:í?ëA5\n<)
@[Lcþ©ÀÎö¶Ôb\rpà·*Ï)+³Â²¬û?ZIPh\0´Á± èe+{=¦¦=L3~8 \nnj &¹;Á\0F\n-ËG¢Ýå¥{¯¤V~ÙKÒ.§ ÇSÃ:¡å-AHÜño	á8P T­²ò@-êIìüË¨òNßÒlèLª)þâ\\Y_ÄÌª2dÊp!Ômm¦: ò>a	[uÁß\"EH+Ô«Ô6âàÔ¼ÈvL	ÚU,ø\"tq=ÓèÅµ¼wè:ý&Dr;VLÿ^Þ#Å\rüø¶èÝV¯² pL4ãZ²ùûMê)³àtR\rÂÚÐµß+ÚÖO)@@Ø^²Ñ\n­~³´¿Ao.9¥ôËh«ÑÓðÑzwaáà\nppÁðæñðØaªSjËÞAÍeé=¸Gº[ÂID(±ÛòC	Ë3AÄ¾µ)jÔvy± -já/güàTâÈ8(L%¬Ò\$µ©IV­½*@¤B8G¡I-9ÑxNk¹ïä5b.½þ<P¦}0ÄXÈòyÚÄ\"
` SKX½s3û½!P 0+Ê\$4¯º+¬½*s¸%ÏcÜ®M)¡ä@ðAÁjÃÛìµ+¢_ÙFYA´ìÚÁAøJ+¹h½½\\ê	TC¤Õ¤\rø®3\"&Gô5°SCX&K8îxíT.Syg.`Õîs£ÀÉ9ý>!ÜÂ6Gpy!\$dµôdVJjñHý0b­\0H¹â«ù¿tkÖÝ>aç¢4òó~ëKxP%éLþJIãl,@è×ÝÓé¾kÑÑ¿S2n5)%î\$³ça\rø|;*u«1ÏÑÕ|O­A-Á2Äß9¿+/	f²¼Î.;ÙNd\ró³Íb¨Äý/r~¯5¸õß²#Ø³ãU2 Ô)iÑä¿}tvÛV>!Á4õ\$Ït½R)7èdÔkóÊÖ¿·Ý(\nC§âÞ~'VFz£ÛèOì}¬üóHéti¼hø÷ÛQ\"QFKA:ÿnGjôXôLòÆ'Ä
3\0j?¢<G)\nÈ.`/oý\0ïhç÷Lx~w&w8ýBüñrñHz|6d^ôö\ngÊwNóOnPW°MoZ/¯`ã®|/à Ç­©Ë¼éçý&â°Tã)ôãd«¢ÕB9ÐÆxJÕ¤ºt1Ð ?¯\\!¦ÔíRÕüðB%	Dô³£X¤'E¨3cÞ*lBìD)D
êH&Q+ þ)YPÜà:^ri.IÐ#øî0ÒäR¿¥t4\$VãËc%¢uâÔ^°	«¦,í>Z¼/ÀÆPk~;eübD¨bÆ00^kp»,eÆ*bæ3nXôpêµ1c+\rn5\rüb120\r²RíýbÐÛxÛK\rñ¥Ñ«ãM0É1ô­*\"±¼yÐ²mpßÀçâ\rºÛà¨Üf¼ð\0%é<\0àqî±òñæÁy±¯\npÚL|Ú¤ãPSòæ/ÌÅqÅ®y­¦å\"c&Èú%Qï3ò7!±bÃÓ\$ñè^ð}#.(B\$!Ñ¨ç'Ò=ïK(gqR1\$b«\"þ{2h\$dþQ!ð\n(°-\$äbhrV3ÒºþMXûÍvg§(#-tÕçÚõ1xÌiÿ-rÍ+Q®LÕÒÍ-¦Q.rÈ×P×ÍØMR¤Ñ°E¬(7Ò«(/JQÂ²Ý)Ppç\$Ý20(:x	\r\\,Éì\0 &ä&²xg^­Ã°y&£ê#5\0\\,*Pä£6bfeSk\0öàÜh¯òãþíbþ	°6ÆTeW	MûñÐõÃ0Q\"dÂ\rV\rbfd!¢·Ñ¾?©¤@ª\n pMh\$£´&©J@â¤#ráMôÌØkfçh/#'BlàÒÀòÞÚ¢þû³°°Ó´î(ÝB£Ù Ò~©]êlW¬n\$>dÀÊnNZ#ã·pe²°ì>ÖLkL6ù3wG(Í*ýàÐeÖô³vËÂ´Q¤²¬*ïOGpÊ!\0ÞI\nlgH1òÒö\$Ú C23jBx\$íDô«1Æ\"5Xm¯Þ¥¨é'9IJä(¬\0©Z%/ðÀ*ÖüB9O'_Ä<á\"¾à¤ãMumÀ\$Æ~,äü&OâmàOÂ 6¿Ì²±GÔÔI#L)ñ³ÀÇ<'JJ\råâÔ5z/Íb0mâ\rÅn%*7ÃlDüÄ^+ÀxâÞ	\0@	 t\n`¦";break;case"fa":$g="ÙB¶ðÂ²6Pí
aTÛF6íø(J.0SeØSÄaQ\nª\$6ÔMa+XÄ!(A²¡¢Ètí^.§2[\"S¶-
\\J§Ò)Cfh§!(iª2o	D6\n¾sRXÄ¨\0Sm`Û¬k6ÚÑ¶µm­kvÚá¶¹6Ò	¼C!ZáQdJÉ°X¬+<NCiWÇQ»Mb\"´ÀÄí*Ì5o#dìv\\¬Â%ZAôüö#°g+­
¥>m±cù[Põvræsö\r¦ZUÍÄs³½/ÒêH´rÂæ%)NÆqGXU°+)6\r*«<ª7\rcpÞ;Á\0Ê9Cxä è0Cæ2 Þ2a:#c¨à8APàá	c¼2+d\"ý%e_!yÇ!m*¹TÚ¤%BrÙ ©ò9«jº²­S&³%hiTå-%¢ªÇ,:É¤%È@¥5ÉQbü<Ì³^&	Ù\\ðªzÐÉë\" Ã72ç¡J&Y¹â Ò9Âd(¡T7P43CP(ð:£pæ4ôRÊHR@ÒÓ¹\nÒ¤lÆ¨ª,¾¥²ïªbÅÎä#®é¼©5DÆòZÂV3úC³U\nË^2zK3 Ôø2\r¯d\nÂðÌ7Ãñ@0c1I½¶+B(;# Ð7°àÂDcK
\0ysÊ3¡Ð:æáxï
Ã\reApPÎÒ!}ÓuC ^(aðÛB`Í\r°u(7xÂ9QìÐÁÈ6W]£¤3dî\$¨jBÁÇì»ÞåªÒÜî3MÓ<Þ\$¬kúá	D¿U3W§ÀP®0CsØ3£(ÈògeP©j%@ý8o¼¶°°ºÂ½\"%l´>ÛzÁIódë£ó2HlÙb¸´ÒÔ} \$Ì¸¥[~± ;)2DB:
3S£¨\nÓÈS0å*B0È\"¼èTÀ z+¾ï+¯Î6èsðYÎèFÝÕç®nÐ¿5@)\"c\$%,Çu.µ<;1ÞíZÅÎµsùÖXeóFdÝñì§¨Úæ)Aêû»FVêþ9ì\"õ»O].8«7þõ)Á³«û2|æÕ¡]|¤ ©2ûÜ&\ré¸\0 l6È\"¬MÊéIÁàÃ`_ÁªX	Ån©Lx#Ä¥é¼HaBjf8AaCä4Dý\"¢BoRÛ7\$ª(HWK<(8p¨ABÃ>mØsãbµi\r¡ÃÍ)É^3ÈW`øC\naH#\0èÃZ\$ó9H¶ýp.XfN¬`CEÉ2v0|ú3¯ÈóD\$¬âÂJ¡ÉjAP4\0X¸rÕlp@±ÖHn@ë´1©U&ZïÅy¯Uî¾WÚý_áÝ°94ÁCa(YDF6ÃÁô´cGµ±ò¶Ò²RFfí¢ÓnWÑ0`xæXc©Ø5É@Ø¼~`V	& ÈGÔVNª»6J9+æx¡Úî^Éz/eð¾âþ`\nL p\\Á@na\n=H©5*ÃØt'o¢;£!/Aò§~0ÁX5:JÅF¸©Áöè_d} èÂCÉJF¤b N¹R1\n-Il¥Aà\r°\$(<\r¡©Ì¤\$s«Uk`ëM`oç²®ÑBPì5å(t¶!±\$@ø×L¢¤¡18´\\ìYÖhÐ¸Â6l\"@P	Ba¥j2ð(Ü1\$ 0Rq¬0po5ÂA[-Îºi=j3ÓÅÐPÊCA½sS4O\n±Æá£qY	U¢UE/ Af8sDkZ× UÄÅCpp\\«¡\"fLC@iu=duïMP¥·ª¡JSÊIK)¤4&VNLÊÊ8ìÍ´ëRôáS1N:SÊãizjî4W\"\r-Mg¡0ÜÔ×^AÄ:¡8Hmò¹eÛt\nêJªiÙ[d2º¥MÔÄTÉlã0½Â2j	B3<G	²LcÜBG\$·ñ#4\\RËI'°ôrô¶×{×7P#þq\"J+ÄáÞÌ8M6,­UÂ°+¤Þq¤M÷*³Ã[	Ùe³¹RY¢ùê´)£= Íu§1i ÓlxNT(@.pÎA\"ÀÊ¥ËmqÌV%MEÕJ¥M	´ðÌ(;uÕ¶s?CÈS£\"?D~	^!ôÓfps§¢^u'Àùjt®0ò8n²2¶øà§µë	+\rX d;ÄGÚ²]]®u({_c¼íaù&g¡ê£^Aøº:JlÉcÊÖ\rÄ¡B¬TØà¹*­Ö½@¢©Æ±Y+\rÔÊ²ñÜÅ\rßÐg[³Z?Í¹½£¹¼ÌÌÜ#IGzê&ø«Ú¼ágÄ@À`L5ªLRýíN)ã¦ðÆ;fl:`Oe9¬lo¶°¯å\\ë£wâÌwå¯(Ï¶w4Y`ÖdÇ9¡Tæ¦üj5|vSzPªtÕ])?No}b±aæèÜLùNjOÁÕñ>z	f¾vÿqÅ¬¹Ü*ü@á¥-;]}Pò ¬tuÓ¹aÝ 50^[\"±¦\$m^ø¤ÇàH/H67HåâH[Û&r
÷FVUQ ùLNXM]a°óL 5!àý!ôÈëËgÂúODó&vê­ÉyÈy	Ûå/kÖÚ;[NHàÏÄQ!¹eï(Cöã¦[ú3ÙsÍ¦g¾.ûUb¾[;ñ	rókß»áMPèù×Îysj!\"W´& ^âÇMªSÃÈú¢-,*'Jôö©Ñ\0¦dÃÆ¼NJgã×ð9GþtÎv;h\ntÍ?2Ð0'nïBr\"<dï8Þ¼&ð@A àHà~ß£JÌdt(x2cMK¾OBlåOâUpXÓB{ÎP\"NfG#rÿ'¦ôãÀæôåF¶FÀ@\r&àSÅ>Ù­`ì­|fÈö­elÙÐÐ°ùB~mnPà×®`80IÌ|ÍÔçÌDö§¶âëI@¢çøºñ%qË§¥ñ¢\$£è~°K¾nñ%Ð\0hdËltçººp2.½ðe-óiÃ¯x)Í°%qU{I4daOkd¡¢Ä51ýÑ#Ò£±\rB%C,:Q S&ºÌÊB?\$aÿp°°®Qè\nN7â?®*M3|é§ÐdläHÑÿPüeQòmqLÂ
±{QìíÌm©­ÇL²ìPI±Ør\"Ç1!!¡ Qözr.§ö\".Ðì20?
dbþÐ¯øI®\$Dî¤Cöp¤¸ù©ÀùòÔf°@ú;\"ùÒùÒ\n9¬D{®o(¦.N\\LMìÒD<²Cµ*NÔT0%ÍúÊgâØ,kò´ü9R×rGæk*-)p©ò×+rG/2Ð¼2ÚäP³r\r.ÎxÍñ-24õC&pN¥2\rmêµï³#1¨w0Ròé)³1	ÓJ\$é#æ6G1\$@mÒ¾ºÿ5LcÒ:êS	©¯5ÏË3PJÞ±ÄÉ\$ÔJî\$úÙ4äºó' tÄ§æs±\rªOQP1ïÇ72`ºQäÓÅ`t°ëBpkg\0S7ã^Ð!\0n\$1ròÏ¯þÐç×·Ì.Ìó:mdÄüÌ´Åäª è@Øl¸@ÖTêó PdÛ¿&gHÀª\n pj<Ç/Zñ¯2Ë©§o1çà3K£ømL½ö!bq@jFÇ/ñ0£º\"T mtÛbäb!'X â\ntY\0ë·FfÖü\rÞI¦âã?B®ÖH÷BMú2ånÊª8âV¤Ê@\$Ã¸Ñgq5|øÌ¨ù-rhâAD6¥Vqe^,æb*àÐ¤ULÊV¬°ð4äÑ¸ØFÓ°â¯táM&îÝ°PUÔ×!õDÔæÔÃ~ÞØu\r\nLK n<ÿnpäÐ5daL[P0X,&þÑJ8zt7NR)afw?CmKjéSV´r{r¤wâQ*\nx\$èGáZ1OÂðW'U&CµÑSa9'ê*4ê8BÅðÜQNèrêTéCÇoO¨ôÆî\ràì@àî²%!K²æìÚØz3JMÈ4~8";break;case"fi":$g="O6N³xìa9L#ðP\\33`¢¡¤Êd7ÎóÊiÍ&Hé°Ã\$:GNaØÊl4eðp(¦u:&è²`t:DH´b4oAùàæBÅbñÜv?K
¡Äd3\rFÃqÀät<\rL5 *Xk:§+dìÊnd©°êj0ÍI§ZA¬Âa\r';e²ó K­jI©Nw}G¤ø\r,Òk2h«©ØÓ@Æ©(vÃ¥²a¾p1IõÜÝ*mMÛqzaÇM¸C^ÂmÅÊvÈî;¾cãåòù¦èðPF±¸´ÀK¶u¶Ò¡ÔÜt2Â£sÍ1ÈÐe¨Å£xo}Zö:©êL9-»fôS\\5\réJv)ÁjL0M°ê5nKf©(ÈÚ3Â9Àæâ0`Ý¼ïKPR2iâÐ<\r8'©å\n\r+Ò9·á\0ÂÏ±vÔ§Nâð+Dè #£zd:'LCÁ\r\\\\aÈÓ\\§5ìÚS,ÅÍim.'*Ý²ÁBj&@\n_	K`å\n£IxÚÇ\n	b\\/CÔõÆ)Ò%\nÜ?JD\nå<Û`2 P6Iàà<cË\\54³D÷«» C¸93J\0\rMB×(\$þÀ¡\0Ò6!Iä	ÑãY,¸\nM\0ÛWâ:4C(ÌCB8aÐ^÷\\ÕË\\7C8^»
é\\H;Ý ^)ÁóÖ¶\rXx!òj+%;ª%@-µN»@Ý SÑ#£rØ53û¦¶áóø¿1¬Ú½¿P\0Gm<.êhÈ×Ã¨åiNZÄ\nh@ÂÐ\"Ìi¼òd÷ÆÂE)0êí4±qø Sj;\rù:: P÷\rj\$X ã=ª3è£LYMá¬3?R%P\n4ï·9£*Qb(Ü°ÂOdÓj(gñ¨ÉjEØ/ÓJÙËPN\n\"`ZgèÚÜ±	KÛ1Ê;\\¿t'Ì1,%0»*Bþôì@Ï´<Rö©&Fqó§Ø¬ôøå\n[Îì1:ªß#XÌ3P(Z¢@q+ÏR°­0/¨Ë45èÛÜªÕ©H¦\rÎKÜÑLpË¤¶\rÕ%L ¹\nt´KÅ%RHù'ñ+Ö`s¥AåÀ¿dI|¤ñóÒ<úcî\rÏÀ¿#Rý^á°,<¿µ@zßùH(X\nSY\\	4P,ØÀãf)÷&m0¦0-nd¥\"\\al>ç¬ÆhÞ&j¤7P«ö{°%!÷ÚF¨i&§Óþ{\"	=oEV.Rt[;P4ëEi­U®¶VÚÝ[ë;®5Z]ç]+¬7ò0mÚÔ
KØ2Èk1j\$EsV)êû_¤Ô\$ÆÞAH8n>ç½÷Gÿ^ñB
®l»\$F|-Xj8ÞtBG\$\$Å¢Xè¢Ö[h:-Å¼¸ä	u.ÀÊnC%1y¯P¨M	)@ù8Ô¦Ã! :¨É¼ÞPÊ´Tä;143'\$ñm/Xi¹Ì-
EÀ´<Ì#û;ªöqÕðh¼gD./eCø;Äõó«ó2ãT9l2e6!,Gal/&¥ê&t×Ï4ð}Y4Ô°@PBTQãÄAN*Æ[ÑàÍ2\$`(,­ Ê]±(\$Ð\"PCHhAáÁt'j¢ÈüíF[¬2~PLÿ*¤æNw£¡99%Vu.eÙX3*Ü[Sõ@t´¤ur¾ú¢Í1v%ªóm(EÜ±cÅÑ®\$þ§ÑLm<'jãÐ±*§¿CÕ%Ø´ê'½.Û ÒÇ ±\nÚ¨Yjs| @xS\nµÙH]¥¿wØ×0W>Ö@s³DvÎÔÀApf\r!&®Pé{AZIÒV\nD­ì\nnEëÖÂO0T\n\0èh8jY\$\"V!¶ÉbVKIy1%ä¦±6>e\$æ6¢Âp \n¡@\"¨Z^&\\.£U'´ä\0¥uÒIE
úDÂ(dä	ñ¿3TuIËÈ&Ï9\\AdÒá2Ê(Ò&éK®Wi«\0ØJÐÛÂ@²!«CÃOÊ\nÿjl\rÐd³ïR?¸TH¯ÐÓ¤~üàE~b.SL'Li¦§W§@¨÷±¦£è[3©Nwk4äçNb6Õ¤æ×Xk\0'æesÆòNÊºX>S£\$ô¹bY±6*cËÀ	!¹ÁÑæRçö´ÉàÙìa®{Eº@äíñVbðVÅDÃg\$42wç]Z¤íGÂDÌ\rj!J´lnIZÚG9´\"¾ê©ò1ØX*R6Ö
ÏÈÒÐdÒÊ %áçrwkö@,S>WsÁx e@È^Êø®àA°<ÅçÜaLãèC[É@HKã|vÆ@C\"åÜrbwHÉ°Á¼ßPÐiê|÷6äÖðÎÇ¹tè¼¬×rÚ eh	§1\rÙu.ji®5ÈÖ¸ùÒRø/úÀNo72úñ\\ªyA`dæò¬.ËY¤ÐßØ{q3#¶½W¹44Ñ%| 5úðF¢iï\nÂ|üMùû-°(*\rÇO¬::¥ßVÆ£]O¥cÆ äóópZi9Ü'Ã¬Îù{/ÊÇ&§òsòÓPêäÙcÛ{\0¬(ßIì«U=¤*. ÙeSS¾WÅ(E2&L³ô±O²uÊ\nMAä~wQN!>i9Z\\Óe?±±}J,ÖzÔêð¨ùì°©8×Mlg@àgjaDj(\$Ú\$nûLxjøSÌ®©ðö,¼Ê¬H²¨¢piX°5ª/Ä0&tP*KÆÔO¦ø0ïªA¯{§1 øpD	cD ¦Ü§ÚK0ÍnB.fî*æàÜ|ç0ÐäpæÐDÙO@øð.ú0´Ù+6ôÆÿð[\rDlHjï®!HØ@ZH\"ØOÄfã@\$i,(\"@-ø¢ZË¤g\0àÒaÆl8¢>C\$
R®B:'oø\$|¹ÅAÐúLêBR@¥=cÔgQ À­\rmp­ce2ØÆÂ{O:ÕmÐ{&d5O©0&±o0JúÐ2Ì\rTÕãØ-Ò¢P¼ù/®Ý\0ÂÝBpÃi-×0N0GJ¹ñ­'RpñºUhdÂ&	îi¢&´&ÂêãQÃè%òP äéèöpdúñêÜÑ¥ñõïÏ®×\0Ìk´9MpÊ\"ëzöÁ §êkQ¾VSrÅ¥Tâ5\0Ðo\"\\IÓp¾úà§#ÂîÌñ±\$M\$H)Ð2×ª\rr>ÌãÌg&¤2g&v\$xö¯\n8\$÷­qdk&çU)MÚñ1|Ñû«tÚ­¡\r²&1¶Ûr´ÚæÔuM©*¢ð\$±¢DZMä5Rp~Lª4ØÑ§.HÇ.5Rø
6cîé °CvÑÃÊ\rer#(\\(.Qzâò)1ÌÎ\$±Ï¨ÆÂtnHdP;Ã3#Ææ0ªht\0
È¨Q4èÃ5&BU/7@JØcn[Dºò8GK©*îÊ¼\$dEÑEàª\n	¼0{P®4Åe:r[:°|ùcb?Év(\"jg;blªÆ0§FPÈ=/X\$\$Û
H5Ð8LÌ/cX5ËªNmÜ\$¦K1\"O?¢ð2ÆZQ6&FÒ¥Ûï¤í<
òµ¯¨-Ô6Ë+;Ê±Ç´2úJ¸¾®îlFMCLÙ*1{Dªîâ¢±ù¢7ÑbÆRl	?£^6,Ò	 Þû®~MÚ%&ùÂ&ÿiÐªl^jL Ì\"ML1ÌjdZ\$@#nã
QcrÑRp¥,ôô/0âÚÈlzWÂÂWP(@¬vÈDt¬I&%+ü5.É\$²i\$ä2e2Ð0ÑTö\"Ð®@Qà#à";break;case"fr":$g="ÃE§1iØÞu9fSÐÂi7\n¢\0ü%ÌÂ(m8Îg3IØeæ¾IÄcIÐiDÃi6L¦Ä°Ã22@æsY¼2:JeS\ntLM&Ó  Ps±LeCÈf4ãÈ(ìi¤¥Æ<B\n LgSt¢gMæCLÒ7Øj?7Y3ÔÙ:NÐxI¸Na;OB',f¤&Bu®L§K¡  õØ^ó\rfÎ¦ì­ôç½9¹g!uz¢c7¬Ã'íöz\\Î®îÁÉåk§ÚnñóM<ü®ëµÒ30¾ðÜ3» Pªí*ÃXÜ7ìÊ±ºP0°írP2\rêT¨³£Bµpæ;¥Ã#D2ªNÕ°\$®;	©C(ð2#K²ªº²¦+òç­\0P4&\\Â£¢ ò8)QjùÂC¢'\rãhÄÊ£°ëD¬2Bü4ËP¤Î£êì²É¬IÄ%*,á¨%ÊðÜä*hLû=ÆÑÂIªïcËa\rÐ)¡KqEÃ«K±J¤s 
*IK²72hÌNÓÂÓàÀk¶­V.ËX(l+µ2# Ú&Ä47Ã¬<*/Ú¢8@¢ÍRí ÐÙµG
\0x¨ÌCCx8aÐ^÷\\0ØV#¨áxÊ7íjGC ^*ðÚ%Ì(oÜã|/Ê60ÝT5V*­LQzú0C£q21Lc®Æa\0í\0å5~0°é8,­HØ2cc&ûP®0Cu¢£\$ø1 C ¤ézj:!ãeO2IÒ,è{*ÈlÙS Zql³X0¬£ÊÑ\nº22oÔ[Iç£.Y0®ìîñÛ\0003ìC=rø\n[¶B1í2YËãy\\B ä®[S°ï4ûci2	Ì¶ª}BØëà)c3OâP6fÔ2í&U/b½g<£}¾O£åiz1Tü1Õ(ï ¦Cm26Ä0ç¯±û=`ÑìT½ Aæq¦5UB&»çÅ@ÏU#üc\"³¢!ûyc\nO³è}O=ö%Ð¤ÞùCO¤´ÀgÎ£!ñÝ¥¶y|0¤è\"3°ÆÑ²²r%8*X>aJ*;g]mW¢¸H&©ÎSk¦Z¦E=4¥ih.H7ÂU?	á*Ð¶âFa«7àÜJ]r<ÇqE ¨ÃZû)
 yË*)'T+\"U\r¨n ÐÍgòE0&h2dÐI\$°¶XIø X0ü.>I\nI]\\i
s.
Ôbî^ÉzHÅîÊûï=Á°0})ÙÿbH)E ®°pM\n¥p©hÞjÈ4MÊÕ}«tâ¬9GÀ©âP¿JÓHRÉ±Y&¹C*ç]+­v®õâ×õo ¹|/¥øêÉÙ`lú³æÇ/MT«Ï*b'E¶§ÓØa&½Ùâl¦:¼uÒõ¢\rÙÛ51Ô¾^dbòbZn¨-ùçÈrÆé¥O\"WLècYáÌ3âbËé[*ÔP¥4nQ)*¸£3×Ú3%±³leÙiI)ôÂpÃÀ YN1è\0PU¡¦+æ09bÜ nò%ØÇÞP+óiN08¨²AA*¹x«Ã
dØªCI	df´
zJÂCppE«y4 îMÉ´Ä/ªWrLÃAihÊÌBK¨mÉ óJLÈ2q²7OóV;@&õI\\i\"¡§5&­'èædÈQ»KæUÜÁR¥^ªô^Ë£é\n¯!¡ÅKæµùÁÅOQBO\naPB@@àu::©¬TºTjß1?åHØÜv: 5 ´W`ÆH bÄ<|Ð| \0äàÕ-?\nÔ{VSV^pÌ¸DRÊÙ0w¡1·\0*	æ¦(¥/£³(e·¼>ä¥CÄ%:^óþ¤Ia!Ú*xNT(@.(ÅA\"ÀºY|¤ôì5hAl¥mÁ6©zNÝÝRá<80â:NAµX7â ¬Ë´?¸§P!Ã-\n
9®?èþ&W
îñJ\"¤¼\$R°B`±ÎBï§Ãµ\nÃ¥°C§°=ZÝ]Sy	RÀG¢öKþ%1çg:çR%ÜÊl\0¦ÖäÔ4\rÎ6Á
d©SØ:OD\$»Ôc8) ¾Z®³+e_l#Ïí¤j¢¨§ïIElè~±\"\"¸*j\"CçúF(æ67ASXsìÌ©:äÍÑÑ|O9|êhíÐ&P4îc\$ÇtòÙ¥ÈðÎA»{)3BÒ1%fÛäèåe¤TæÐx3âÉ±\"ûqã'å/~|\$á»ÒpfRrW²÷ÔìÞùMKqbÑ\"C²0­.ém Ç_õøS*o
@¨BHñÉ¦JÝBYd¾²PäeMÅé5äöÚBè*EÚP/`Á ÊÓÚRé1ÛÛT¾ ò-U+LÔ:
Fs\\-C±?öÊMn.³ÐåûSíÛ·>ãÜû^!=ß[Ýö(`iØ\rªõOÅ>þ`è¹:jUÝvpñÚwY(5øaQK»|ï´ïÐT_GÛ½/q¥þÇ¹ÕÅØÏu~´ó@åa+÷S©ÿ~L*Y !§±Ø9NhÂØ`dhÍ¦úm´+PÄt¼ÿ÷ÿ\0ð^ç~Au¦Ä ô­¾ÉÐ# ¶F3û¸ \n	\n(½ëÌÖ?cêöñV'`Ng¦~©NÛí\n\"¯\0í¯,þ'°)1o0ã´-\0¶ Ýé'gjO0,-Ö+Ãò?jÝÈCï/jôPf¥#'ä°È'gæl¯ÞmbNâ\nrÆäh ¹Â¨\"À h¶Û\"`5££\n.LÉÌÇfÝ\nhEÄ¬#­ÞÐ2ï8ÄBâVßlkl|àPÇÇF7\r»ð`Òö°PCÍÁâxÍ)Ò¬øèÐv&¹ÍçÖõÐvl0{ñÏ°Spk*\"{ðúÐwgÆ|÷q +7g½¢ëa1D\$<¢N?®¨åÿÐ0òï¯ë®Æ%dQ¦©SP.HOZc±÷OBhÐÐ`Ä`Ã§\\á¡P±±yÙNðTáiPlÎÌxáQ°Ãñ·PùSBÇ¦®ÏB8ßîüË¸+àCO:±¬È¡T¥\0é\r%Â(L6@.Øs.r\"È3ª!F«í*ü­CÌc-Ï¦ÄÃÒâJ RÏèBH3Ç.Ùäò.íÞeÐ2Î,¿QÌ&_1Á'ñÍÐ]KÊÝ1»pn\"ãQ'ð2nbgQºÐpÿO*dÙr±qeS*²¯±lQVà0
rÍ,ï)Îq-²½*Òá	°éðW
ìHÄÿÆ¨2%*&Òº20\$	ÌÝpa(²µñÔ3Qu(c(R2D¥rÓ\$-Ìan8aÏàïfÓc¾dîo'BfoE.ST=«4æ¾k'Ô2§bRñÝíxã)3#7C»7)2sv®±»£&æD#8n5Î8N\$t\r\r3ÑBrJ-QE3Ó²kS©-³¿;0rî6ã³·Ðg,â.8LN£9s->N4âSì+²<S4s>sÛ?£'4?sêýà¨ÙeØN_-ìNø\$¤@¥4 Sïi£ò¸FNwCý,Só\0Ô*JA<1\"'@?qJås2LÃÆp¢.¹6\r8®Pvh6wk6õ4p(&þ4vüô|*\\HÌ|1æ çb!Íª4¢î¹¦É?ÍSJÉzPLÿqeI ,@ØlH\r-x5r-*\\m¢6ó¢si\núè1!²R*2ïÎ81c8OÌV\n póOrÁâïNèñLýOQâ,ê\$BHO%>Ýí°oK3FUç[4G\nvµNC¢@d¦}+°vn>\0ETÀD5¦d8e*4ÜÃ\$ª\r'/Æ~lO\n'ær¢hÒbº:3ä(OÃ¶ö¢4½RV,C²w/Nbc4g,Ì d|!5©Qñ±ÓI,ï[¢[õ#CuÇ]¦Ô5ÐU[h;e&´Þoî*2~#§\nq\rd.¤ËÕÌÙÅ:ýçB?ìmâ\$%UaðçbBc\rmúª\0ÏD­Þ'oÓÌêÅsÌ,0þ\r
1à¬=5jMK2èã¢Üè°ÌlÊ+¬ÏMv±±)bºË0\0uÔ1àÞ `îrbÚÓU@%ÈóB-¦lØÃæD\rÀ";break;case"gl":$g="E9jÌÊg:ãðP\\33AADãy¸@ÃTó¤Äl2\r&ØÙÈèa9\râ1¤Æh2aBàQ<A'6XkY¶xÊÌl¾c\nNFÓIÐÒdÆ1\0æBM¨³	¬Ýh,Ð@\nFC1 Ôl7AF#º\n74uÖ&e7B\rÆÞb7fS%6P\n\$ ×£ÿÃ]EFSÔÙ'¨M\"c¦r5z;däjQ
0Î[©¤õ(°Àp°% Â\n#Êþ	Ë)A`çY'7T8N6âBiÉR¹°hGcKÀáz&ðQ\nòrÇ;ùTç*uó¼Z\n9M=Ó¨4Êøè£Kæ9ëÈÈ\nÊX0Ðêä¬\nákðÒ²CIY²J¨æ¬¥r¸¤*Ä4¬ 0¨mø¨4£pêÊ{Z\\.ê\r/ Ì\rªR8?i:Â\rË~!;	D\nC*(ß\$V·â\$`0£é\n¬%,ÐDÓdâ±Dê+OSt9B`Ò§3êÔª«Ý\"<+0ÁR¨ØòÁI\n¨á]7­()IÍ01©A\0ÆÓ-È e0Àì@ËÌØÔ[ÖCoäÑHº(µ]Á®0X(ÐÍÁèD4 à9Ax^;ÛtiU)Arò3
ì\0_Øp^*ÁðÚ¼ºãpÌ¼§*r*ã|\nc*@1r*ûV?Xu½ój9­ß£{¢·\rKta¸z\\Ü7ò&7Â«\nA\$Ô¨+¥ë>£ @1-(åyk8QC`ê6¯ Tnæû\0¯O#\"1³y+\\X2ú§T`P¬ºÂI*¦2Õ+É|ßwê*ÇÐÍû²@P3³c<i%P¸ÆÇ¢ª¢\r¦®4ÜÊ¨c@èçã,ó1©ø¨\rT¨&ó¥O~DQ mtÂWQ¤á°ÍëÓÜ ¦(TÐÊ[3ªÊâ£N Uå'Ï/NÜ#¨Ë@lÛ¬9ö=~w)Î§õTX\n\rCUÉbJIY1â(ñ±ý¨Ë0ü»ýIxT¬ø\"\\_qÙP(6³7ìû*Ñð°íGL(L°C9ÄÒgtìðë½µª§ÖÛÇl0\"BWØé*¬©U4¸i\$¿ÄtH_ûíD\n\nÀH A+LÂ½¦tÃ\\\naL)h(lGÀ¸PÝkØp¿×XTÉZï)fy+ô üz\$&ÖÀ¨p1Cäb BêÝT-Àä±ßY(d¥d¥³ÒZYlu´ªNÂÝ[ë7ò _Wu@ú;ÃÖ½²2F&\$« ÙBA\n!%hÜ¡õ¨Â:_Ca§;õÉÖ\$ ueµHÐ´VÕZëemÇó×t0	Ú=.û?2\0 @O
Jp­&¨	I)g¼@bkôáÆAª1ÈpB`®\rþW¦ªLÍIK*!Ò­Cf3À s±8Ã h&ó|÷¤DfÊ!A±<>@«ô\"g­B¦¨D³@( AC{ÐC`RnMáSFlâ@ª)Æ°àñ\0gKR(?¥\\ÕlH!Ý-#*\0`èaFq!ÄRÂä,=\\ºÑó±2*	âo£®bb	TR}®Ðà°VAÊô4\"©~C:Ðed|ÁÃXxT5Êä¥ù?(.ýµ¼´:éMGÈH¹Jk{FMIá|Ã³í\ràFC³XÂØýxÑvWCì/EÆèW¦rMhP	áL*52rþ#d<MÖ%@mÉR:òÄ·cLÜáÒF(.êÐÂÚú\$DÈAc:jE%®6ý²4²W(F\n\\ë¼²LÔ,ÉT%fMBha±¦AÈ¾§ÀðÃ<mg ÙUd:\n:ÄT¶\"lBT\n¡&´B	á8P T¸ `ÂRÂK\n@.À¤R9LÍÙÎ,A@4ÀBË)¡Õ-ðár[6l×\0åØ*Åâ¡%èºdãb¡{<*£êOûÙ5²lóªSâò©Ø d(ì«:õà½{Ká})´¿ÁXJQK;gPðsRKOI8ªRðÞ­R[O/I½LÓT\"ÅX'vz!©·TEÄò©Eh¹Vg´©³Å×£tÒYÆm»ð±~/Ñ¯¿º`ÙÃv\nU3«¸Nã4.¡\"V±¨VT\$iTÊ»ÇÀaj|1m9?Uâv©·8{1ë7,oÆ:\$¹ºæ.JSÛV­Ä½·¨ @NÁäÛ×íÅhsmñ¢7Ñ2Ò3^¡t.îÈ49ÌVÎeOSfVNÌÌÍ®ÓËÁ¥
SàE¾,
%ÚøôÂ­*L¹/FI\$gU&§®,9ûqLé7ìÀ^Ê¹©\reD·WótS«øºw3É8±)\nÇfðØ5U4pÁp	RüÇ¢h:LçôBuåé¸ÆÈ±\r:zÙ£ó^º¹(&Â0ô4]ÕµçX·/X®£Û:2²}Ã£ÑµGÝ×vq}ñ '5úb|ï0²Ð¯1'ÈÿÇØ.Ì!]`ýËÔrí2¡x÷{ñ)§x>Óã})wÆ¡6fÖàù÷TìÜ4FXyjK		ý¦êK·´qg=0ì§JüJÙµ£EM×NL\"<P&þÚvoð«¿¡ö\"[7ÄÓëý#w­)ò^ýß¨Ä&}Cÿ¡¿]jTÊ´ôÕ^K@Ê¬¬ªd!@àDÂök.kbR\$§%.løÆOñ\\¡Oü]ø#>)LÆNâB5­Â1¥j¤pðJÛzfÆp0 PH Üp,x¬VgÌÀØo¢9#\nzç~ÎðK\"¾I/ÐÐ|ulÖf7°zÏýtÂ]	Ë,òO\rUPG¾wOãg`Øð bÅFü0ÃËÞÖã*c]o¤ `@a\nVë.5NëÃêPÛ°áDªéNwÊ°éÎ±Îþmâ\$+æ/°Ç\nPË
D¾CâþQ!-çÉ\\¾§~/-ÊIæê¥h,2hã8]bo%(iÌEíÐ%+¥j·_ìÓ­ÒIè|{Pâj¬\rÊªf§<OâdFQ%c~c#é¬Ý-t\r« y­ôÞ\0ßæ\n\"\n\$\$ïÍQÄÙ°¾þqÆËî0%1×0µÀÊâe+±ÃQè¥æìÛèk1.7\$ G¦´OH~¤fÚ`qä¾7<±àÝ0ÌÏÊæüo¸lP>!R2!R6ú±Òû#NÏð\$pk±¡MÖ75%2\r¢XkÊ&Òf(oªgPRwëÿæ¦B£>ùñÌþb×RJý2vR^Ëòc\n)r¥*²£ gå)R¢â1\$Â#rÒÆúÒ°¿q^gm,ò/pF¤MúÞâóñ.-øßÅ,¢ÞÃÑ/rWÃpLÒç/ëÝ&Ó	/KÜ\nfg\nâß\nh2í2C:²øS/2	&\0ÈáÐæÓr62¤²B­Øff÷X\rîÆ(b4.}5cZBÁ6FPd1æ`E*\$å-7¯¶hîºéèçÏ¨ÅqòFDÂ\rVhdj0C6Òj.ÎKCH\$Pò¢ çr¤pTrXpÖÂ ¨ÀZtëbDò.îñèæ£DþÂ.#\$r¤ÂB|MÉ\rQ¿%L_Cb;ù;Ï\n=ÏÒNÒÑË0ßÉ-'n4 A;cò×@ätJò*@lÃÆxLÛt3âK8íÓÕ\"'\$<(ðBÌª!@Äða­\"ÌxC´x¥\0àDACHHMiÐuG4ÿ\$ðÇÂ)HðDÌÔ TxIñÖOÒÔ¦S}IlÿslvRl´OÿMQpoB\0A õ/­ú\rêJM2E ù#JM6ã*)06Ç£\"\".ßÃ+Fâd1ô|ÉBTX)ôÖÉÂg´mâô;åó+Ê®¬:#~\"\nyh)ÆÎB¾\rÀ";break;case"he":$g="×J5Ò\rtè×U@ Éºa®k¥Çà¡(¸ffÁPº®ª Ð<=¯RÁ\rtÛ]SFÒRd~kÉT-tË^q ¦`Òz\0§2nI&A¨-yZV\r%ÏS ¡`(`1ÆQ°Üp9ª'ÜâKµ&cu4ü£ÄQ¸õª §K*u\rÎ×uI¯Ð4÷ MHã©|õBjs¼Â=5â.ó¤-ËóuF¦}D 3~G=¬`1:µFÆ9´kí¨)\\÷N5ºô½³¤Ç%ð (ªn5çspÊr9ÎBàQÂt0'3(Èo2Ä£¤dêp8x¾§YÌîñ\"O¤©{Jé!\ryR
 îi&£J º\nÒ'*®Ã*Ê¶¢-Â Ó¯HÚv&j¸\nÔA\n7t®.|£Ä¢6'©\\h-,JökÅ(;Æ)4oHØö©aÄï\rÒt ùJrÊ<(Ü9#|¿2[W!§ë!¥ëTØB-iÚq5éÜÁÂLd¡.jÅÈtCA¨f¹L×§³êö hÒ7;ïsàù>³ðýÆ1¾3\0Ü3Ó¯sÎô½ohî4@Þ:¾£@þoô\0åd4C(ÌC@è:t
ã½4&ï
ÏÎËÁ}i[C ^)aðÚñ=´Ìñ\r¯<Â7xÂ@HcÞÏ3²h<!\\ðßH2EÅø
IÃ¢èF¤Â\r%ÀP®0Cu&3£A(É!1<Õ¦³ÄO\"03Tð¦iª©\$ÈtQ«ãpÛPk\\Ýaäw¹n ¤´Z{ÑPzµOk Tæéi9-÷¢qó¢kx 9ÓÀ¦kÃ¸FÈâ!¨Û \"	Æ©,Ñäíz} éê@¤B¢&lPI.×7uû<óÚW>ÞjÛ¿§ilîà\rb\rÄµøóÌÂÒUçk_\r-h!¹Hëµ¡6Ñ}6¸.Ðð<¿	Í<ªk	Éº7sXC ØÀÇºê¦\$È£Þ%?N!7À§ºw°lê[y§p:V¥û5pÇÞ	²v8²é²¸@h9©ãÌ«^ÿºõ¨ P Éz \$L\nPH%H	éÍO	õ¿Ôu	q«5I)@äÊ	i­-]x¯ÂXd, î³tZ!Éi­SÞC¢ç[`ø<ÒL'WJë@D\$sNNAj¤tÒ=ò`^ø§Ckß³ äì/ LÍ,êý`¬5±ÖJË<ñ­%¨¢\\KÉ1-µºò	)O¤ìQÃ|A2pj&!öPü:nj1è\$BÿØ!Ãle­¥¢ÂÖKP9'd½¨
@Ð{Tô1L@UÀØí}q ÚX¸aÉv0ê§Õf²|6ðÎ¤äâ¬\r\0VÔ)Á\0cW¡/CÂ.øGC\\D!ìsâ\0\0()`¤ÓHF¢ÓpÅQËÀÞ¬ÃiÁ¥'yP¬ÏÑòIÌ7«<våBs°É(ó q3sîÒKõÂ|s?K{CCppV\nÌþõ³'@iríIu
(ma:ÄÉ\"#ò\$á5CMLìR-Hð ÂX%(dÑýhzðÉ~ïÅSTR¤qàbzK[*'t	Ç\"Ì5ÌDDô\"ÉI4yäÕºO\naRÂJCA~UÈÌººd2U¹ÓÂ9X!#¥,¯2câ%W~D3äàIÁhF\n`1,¢N~HÈ&§sÐÆtÓ£W\rÐÍO0?\"=WÆföµ¶Ôk¡ë&\nÇÄ2ÔN\"«[eæ£ÀG¨¡flÓ2NÀ{.LI¤¹°úÌ\$FíÎ],v/Í?Xò_U\$5ÚOdÁ¯'5^Ifë½ÊÝ»Êý£yÎÝÁ9ºá)=r\$À	p©Ð2£E¡-Od¤¥ Z´ÒZlXCÁ¨`µâVñíC=-iá¶Y´U19¤ö&@î­1~æéÈ'zIìun
ù<óVÌ\nDo§¦JßC·FL\räw Ø0.,Ï·ã¢@PÊ5öüCçwâ# O÷&j\$jLÎYX9U¡VòHÃyk Xõ]S1v½z^ûîã\r+\r Ä9HT\n!Pð^Ô%©½\"9#¡deü\"\\\r7ã@ &WL.DZ9 Ò@Ipù³]#@È±*Fê+'¤c Ói4áE£­a©A¢\"d@`:!ºå¨Rµ]¨ %È(Ì¦BL+¢±·×Ìí\rQmt{u\r-ÔH°±Ú
]\rmX|e´1:W+-ÉéØL	7íð25Oðè¦«4@ZQsõ
2ps^Qâd6<[³CÄK\nÁÙc/´	\n09ô?y!ÊÝuB¼Ú0m#³%¸2YR:ËQ-ELÅ¡ì..ô°D<!Á<.ê(I§ã´ßgQPO	«¡/B²KÓ»×[»tQ£ÌaeÌp
7M¸vî8^ZL\rÑ/ëXgîí××s2]ûrsåvo§¾Ýþ&x9iÉ&åÛ÷ÈsvÎ|{¸@þ7M!Ôê·)-mÿyò«Ø¾±ê<ZìÓN2à2V»Þ£~5ý³ª¾rëûõîËñæ\"vÊbkÚjð6E¬ÏÇÇEq6½Iõ«?ÎêæùÍoâ>ÑÏÖµ¼X£ó.Þ´ööÂ¯{s5¹1ÏÞC®Ó0(ºrñ+ò'¹UÃïÜ²Ì«tü­ú_âL\r°¼«¯\0@ïXÕ°ÇpÏ:-ðA'ÏBLý°öÎ¾fP7\0íûB ý¯9líöÐXn(CÇ^ÉHn#n\"@môìI Æú^­ÎÒj0M¦ôPð:ô0~0o-fàoæ¬áTÊÄsØ/1°µ,G«\n\nÃ¢cá\$ã¬ B 9«J0\$ô7òPºðÖh.ç(Áîds.hÿ¤0(Ð0ù#t 0Åo/\nG\0°¸^ÄæÎª°:jæ¼I,ÑK®¢×°\$ËðRÌÑ2Ëð+zÍ6ê°1°^õäAQDä6-ÉAq69nP:1lîñÂ0n2~æÊÓëø&\nÜ´væÌ5ÂZ:lÖ	\$k® #ìUãlî°ÖÍpD\"R`äàVQ,Vh+\\0E6ã6ÄÔ6Ê´±#\$Ý88k¨ªì&@V\0Ì qHÖG¨t£P@qÆfq&æÇ.}pfáÑ\$)íÔcH	qW-qú2DÕ­.%äx}@`c:Ü1zÂð,Ï`FL#Ç\0'0ÅÞ\$ÇiIú\$ÍxÔF\n4é.æ0Û©ÿ'²ÖjRC2
'Ròr/-#ÆbÙÎ:îyãO\n2s)ä/P y¦hä ýÄ®MñÞk²L^°\\üt°¯Ü2gpÑû+ æpÏ÷EâodØ.2!(â#lEÈêVñ/¯\$â]í¾Pm¿0\ràì;àî\$ºjM²#bÇ\$*¨vRea ";break;case"hu":$g="B4óÄe7£ðP\\33\r¬5	ÌÞd8NF0Q8Êm¦C|Ìe6kiL Ò 0ÑCT¤\\\n Ä'LMBl4Áfj¬MRr2X)\no9¡ÍD©±©:OF\\Ü@\nFC1 Ôl7AL5å æ\nLLtÒn1ÁeJ°Ã7)£F³)Î\n!aOL5ÑÊíxL¦sT¢ÃV\r*DAq2QÇ¹dÞu'c-LÞ 8'cI³'
ëÎ§!³!4Pd&énMJ6þA»«ÁpØ<W>do6Nè¡ÌÂ\næõº\"a«}Åc1Å=]ÜÎ\n*JÎUn\\tó(;1º(6B¨Ü5Ãxî73ãä7I¸ß8ãZ7*9·c¥àæ;Á\"ný¿¯ûÌÐR¥ £XÒ¬L«çzd\rè¬«jèÀ¥mcÞ#%\rTJe^£ê·ÈÚ¢D<cHÈÎ±º(Ù-âCÿ\$Mð#©*Ù;â\"â6Ñ`A3ãtàÖ©å9£Â²7cHß@&âbí§\rèè1\"Ü ÁMc\"\r0ôÿI%%4D·ÔaCG1	B®8: P6¾ ô=))-\nî¢Àá\rJPÂ1l-7é
sP@;ÅãCOa6ô@9`@&#B3¡Ð:æáxïu
Ã\rl
A°`Î¡|:9Ãñ^)ðÛ5«¸Í\r­õ7xÂ&â Ã`#bKê5¥Lk¾'*ìi æÌ/nóà/©Adë¾aCRB««0\0¯ÏrÞ2h:9æ|¢hD5PÃbCO&Éï&ÊãËú#ªä©È53ê\"£0Â:¥!\0í£(%¶oûø; P:ÀcÓ\$iÀÎ3©<ÆíëFúÔC¥\0\npeX¡®·¯)XÖÂ\rÒà×*Å ÒR0ÏXµ¶»Ë¶â×£Â7Gâj]ò2C;G÷MAEÑ®Ve¨«¾)ªø*%\$åÎ]ù©v¤ZL_áÔTu{êBdÚ>8Ò:ßûè6Øß:·£ÇÛ¯ôu{µ]Õ[Â Bz¥¤\\3n¤¤ÇcPÃÍhoÁ ¢nÜ¢¨>¡P7ö\nhÁxCcfÐ{æPi`Ã	wÉ¡ÒîÖ((`¤1¤J¹£f¤ 0¦10J\rä=!f\0K-°23ÓÊîbP tçÌ0¡¤jÊãºjBN<÷k\rÚj\r@4ö·\rJß\\+r®uÒºÃºí]äh/%èy\$NÍuA¯°}\"2Èa,,ã·ÖL\n)FØ5%ðè¶©¶9Ê¹XsÈ.S¹8çñ-UðµÙê}¤¤\"%¶·cÒâ\\t.¥Ø»£ËÕ>§õ#WàsÏ¬8i2\$>NFHÍsrN\$3Cjld´!\$2 IÊ!ÒÆ`è¬räUÎÉZ5#DÎN1ð3dÀ1ÈÄ´iè6i#\$ÏCf°b¯M=¡L2ZhàÓ¼d\0c§\$4±æMÂqw/1¤dÝ­!2}ªóèâá/kþ5ÈH\nRs¬\n\nb+d|5B§ìm fÁñSnÏ_i8Jñ± î\\¡ì?¦!dÿH>\nl¤C2\nLCX°Í¦rZÈ
gÆiëVê2Ùêß'dôÿ¼b´gTòR\rå)±,°ã¡%õÞóa :EÜ\$òiÕÊZ5È]ÈRme(3 ²AÕº{­È 1±*i*Ì4Æ#,ÖPP	áL*b+#Î\\ä:¬+Ï(å%-¦×KOõ)<sþUð:¿ vÄrÊUè7lLªsj£ #JvìÙé=}³hZåzF.s¹¶ÐîÌy æ°ç«ZPYÒ9nlÇ¡l|ÎiM07¦Mcáaòa+BC¤M(87¦øÛÛtUÆuÑªò(»\$çÐÆÊØQ)\"Øì<ß¢\\;Uzã?åFPJz{§\nÉðÄÚòN{Ð·G¶­rÑÂzáìã°dÁ¾\ríô+òbÅ}bÖÅÛCH*+i&ÍÅµNB}-æ&ÍÝÁ¡ªà»©ÙCo¡L¶êû!Â?2Óô¹dH]Z9.Q=ø_Ï¾#Tt &zm(w#¬t¤¿FRHn.aârët^{!¬ïd¬ Cèl6êpDÀÁ²½ÊT6Mü\r·;ÞÖÆûaífoÛûmäöqº¶@\n\nMh»æµUPÍyxmÙ\"·50U
5{Xã/
@¨BH§U!hÕêCu`ýõ§)W[hèwhÐy_hDX94{É92½A÷w\$xÔ	-Ñ­¸ÈZCk[\\:q¢îVW .8ø5ñ®^rÕìaæh#½p9ÑKäüô£óòz-ãnO¤ó#Í\n¿65\\ä0ó¾¦ùñÎêôgÃÓAª%\\» MùJ7Û¢òî8rÉ¾m=§ãÒzÕ-á\"Q
²ËmÅCÆã¿ uk­¦×¨jÐr3¬Ø2#¦¤UÁQG%1»yV´vö'qý|å {wÀPC;×nñb)p'°Û'ËÚëSã
Ï¦GËàÁ% a W'Ì¬g
ÉXl5Øå3[û'ÛÏSïu<crÇÓ/l¦iÿÒN[öxè`~­\"õÀe¢Û ëgì?ÁR?%þ c\"üK\r\$cÂãC0úÃÂ! aæºoEpb\n+C@.X ÒÅÌâÄPE>Ä,íz%`.ívçz~Íã¶GÍr×ffjLihÃÀP(ÂRÖp' ÊGþý¬¬ýð]ÇÉã sÌNIóÌ\n'¼Ìoöÿ°°¬¦2-þ¾yO	®óÇª~â°)»°ÖþfÐã¯c0?-æk¯l2`Ñî¢çÐê®Ôè (dw°ú íîÎ<è±Ð÷ÑU#eh¾ÚnÀ¬¨©	­Qq>Ø&El±LÚWÃ®AC»Â\niàNl8CD/xd\n/C0IÆFQ|GL`Ö[BcRG\"FÍjÙ\"Z¸lj±[CÆ÷¦ÖÆGô±eQDíJRàÒ5£u±W­¦wmæf~£¾Í°jO`Ãq¤Ã®Üg¦'0\0cÑP Túr)0ÐýæÀ2øæ9!ÌlÊËå`ëíó!-Q0Ôr\"íñ#Òÿ \$l#ì;òN#òHÿ2*dÀ+@ÈOÃÁT¢N2§&Â\$2c:B¶úf-R4FÒðÇ ¢s)d\$¨¾næòonþrVÈ):-MÑLrÐQ\"ôz`\r·+°Øb¬É,§¶\nÌ L£VC%ð*í&Aô<ì«\r#/Rå-pÝ0Ë0ÏOêq¤02°¼&M1Röra-ÆL>0y)&- ôý3-3Sö3>kòÈc¾þ\r¾Wû!F*¯MÁ#ò\$3ROr¤a³g%S;íµ5Åq4§¦Ú¹%­òúlvRÍþI30*\rúHî6ë9E*ßÄÆà3j?Cø3rkETY	ßãîrrm.#WghF;,Ò`Ê»ïÂ/îS<ìÐk=2ËÞÌóÓ>b~¼:î\0@¬V%oëägY>hOºúÎÓ
ALJG4ínSAt%îÖ÷&*\rV¶°F¸YFÖ\rÚåþÒÈ\\EânËâV Hd\n ¨ÀZêtPYñ«ôCcÿ>Ñ\0gÙHHT}H¥H-P#Â@\$BH\$¸'ææ;frYOâJÃÀ\"ôRß@¤TÁCôï 0äHRãþ¡zùãª<cíÒ;«0D.áRøÆÈÂ({%\n\rëÒ_êÊQC¾	ýGcÞ;z@´;FSAùc§©jß&>kC¸Ëñæýv0Ä\"ÛêÕâ~¯~<<3iã3©óT\"ûTd¬'Â,ûU@Ò5G5u@Nâ\n5Iæ èÃ¦ºÍ\\·D+<r+&û&bÝµ2ÒEv±nV	®4Ö°rØ¤ùMu;F&Å­â	àáW¦\" #þÈ\"?<ÎR<\05fHßÙS
SÆÎjÝTãÇUÂ¹0ÂY¢Ö5ó;í\"¬pÞR@î6B²Gó¬\"Ö²\r³Á¥ÝHfKa\"ãÂÖløWàt\r Ú";break;case"id":$g="A7\"ÉÖi7ÁBQpÌÌ 9¬A8NiÜg:ÇÌæ@Äe9Ì'1p(e9NRiD¨ç0ÇâæIê*70#d@%9¥²ùL¬@tA¨P)l´`1ÆQ°Üp9Íç3||+6bUµt0ÉÍÒ¡f)Nf
×©ÀÌS+Ô´²o:\r±@n7#IØÒl2æüÔá:cÕ>ãºM±p*ó«Åö4Sq¨ë7hA]ªÖl¨7»Ý÷c'Êöû£»½'¬D
\$óHò4äU7òz äo9KH«¯d7æò³xáèÆNg3¿ ÈºC¦\$sºá**JHÊ5mÜ½¨éb\\©Ïª­Ë èÊ,ÂR<ÒðÏ¹¨\0Î\"IÌO¸A\0îA©rÂBS»Â8Ê7£°úÔ\"/M;¤@@HÐ¬É(ñ	/k,,õËäßÂ#(Ú×%l¶(DÑC­N»Ù.\0P£\\Ý8\"Ñ(ä6§(ð j\"ïnù¢³ð¡c`½§H@ölpî4´lB6¿Oãüâ4C(ÌC@è:t
ã½\\(sðÜÏ@Î£Á}2þC ^)ðÚô1È@ÌôO\nÊã|¸ÒÑàPi£H?8Á²ØªÁ¤«VË»Öú¸.@P7HI2d:Bºd77¨J2\$Ô£%ãdÄhøÜË@PðÔ8\"V4xé #KÐ\"TCê6#c´: U¢´\0PëÜö3Ô)L!Ç&<@ÌBïMºüÜ¹«Zë® Qr¢(ãÈB](Ø3úT8cÉB¸\$¢¢&Câæ¯m[s\$¬×jì×/9¢ël{\\ð×nLÚ¢(Ë3Õ½T ûË{u³¦îï69¢ 
ºmPáid8Ä¶Ã±)7Ã2ÓY¥¢^·Ëb ÞÈæÈ@¾´M3búÞ3¡9õC\nFåî!\r¸ÊaJ[Ómj)B2¶\"	 \\	cK(6õm ÎXó¾/ë)iC½éûXÙÒxì[Âû½]íÏQNr²)@SÌUCQÔµ=RªÕj¯V)üô«epyð@Ë* }Y8ºbÃzSÄèÔÐi%©½.5vXxrjÿ©Õ>þÕ\"¦U\n©V*àî¬ìV¡É[«¤IeWë\$³0Á >IÉ4õðÃàókw§ä3<RqdÅH¡CÍIº4\r!ôàÂàb22í<\"P÷Hêø)e@:Õ~ÝO_ÎÐ ©3FSÃA&\$t8YÃJ	BÁD`sK¨M\0	Á:eÁ- PRL*Ht2Ê¬ãA½3I½s2WÃÜÒ¨D¿¼°%¡² `	hª
ÞÆ FTS½(&bã¨~IZW¨ÈÒ2J:¦&\0Ç6,¤K uCm@2Á¨Cj\nÔ§' j§D{l¸òrôÐ\n@Á¤5*KBI& ¯
¤H4ª8±Ä\"÷;Ø~0nÆ¿\n&ädÍ£ØO\naQ¡\"ùÉ¡1=/Q¢æ£Êp1)ØÒ¢v¨CYP!å7`ÒH)MâgñC(Kåíµ ÷%p 2Ä#I0NWÁÀPêR\$ U \n	d1°ÆYEdÁ<'\0ª A\nVÀ@(LµÌàÂi_õúÀIChººªÔ+úà«æ
Êúgág,ÌéC¬âé¿*S¥Ú\n>r'f.Ï-(»9ì%Í¼¶cJµRÂZ
\0 ¬aN5ÅÁ¬J*ªIÁ#¤´)	Ìúe\"`ÝØ:B©ÓZ¿+U¸.\$¼¦;)[ÂLb4K¢tÎ«°ë=\$æhL¢	'²Â©ÊÑjã6µt°{ýiM×Ns©Rå\\É ÝYJïj©ø1¯ l%ÃÁ½¦\"ªy5§Iò2%FPR6ä!uÓZzÓkî'°¨C	\0µc6æxo>9þ>'#e¿Ø8eZøà,®ã(À²»µ,6)Ç~`òý%D¨ñÌ\"ÿ(ÈnD\raÕ®ÄâNÚ	´(µß¦¬M©iì»<öq9á;Ë]?³ÎÈàEí3äLÉ	êÐØ¬ù=Ø«áÉ1!rMÔ¤Pä1]´u>:2\"­>2ï9OâFQC¦1\r(Ìì^ÃA~.«²U)ÚÛ×Rì2AZ»á\"öb|YÓEß¶BIò³_4=.[Sn2ëXu^=ãÝUÁ¼w^äµL¹¯¢[a}ãDuFWÕÉ\n3;Áó*BþM/L¼Y½ÄJ&àHqÔ¸; -yï°Ó½¯²\"^ß`ËÁWA¬h\$|Ùvæ­½§Û{ÑlZÒ]i%Ðtü_ÉÉ´¶Ç ï®¿bÇ?éònQuè[[uÙÖ÷å´.k§¾®´s´ÀxÈ»´9ÔËb'2ù|fK~3]Ý¹º±ázÌûû=Þ²wùUÙw®÷ðûø~«Óûb_µxúâ\0@F(1|êÄ¼´8 \rLÆO'¢/{ÇÍ¥ÞMÈê~->¡cL©¶Þr0O+9¾ÝM9èù¬I0¡F°I¹3ià{>ùÚÇ@îß
¾jä(> 4õm5çÓ5¡xß\"ÿ/Üú?x½ñÉ(eÆÖÍlÿ\$ôX½½dÃý0Ê*¦j¬;\rAàiÏø-NØw¸üâ[o¶ñîÌñP ýÏ\"m'`#æLm#&·8p¯Á&JM/Á¥#æ\0åhÜ#ä¼0bÒábPÿïÌÚãÕ+kNÂßÆ'Ï ñFÒ¹
BØÏÁÿ#K°iÂnûÞm/Fåoè#pbDÈÄpfçÐª\r,;«í0·	.Ä/>Ã°¢ÌF^\$h^Ø5¤ÈÇc	°L£¹Ý\r¤OpÁLX ÈLbÆfvjÄZ9,»Ã7­hÔ¢hâüwæ.	5§~í¦ïÍ¢Zd>\rV¢ð´\"ÂÊ©f4|ãDugTRZÊ¢Ùê§x\n ¨ÀZÂñR#ìøî£		pp'\0=, wD`ö+^qÝ Ì,biÆCêÙÌ;dÃ&ÄÂP±¨\$jÎÂ,7\"@²Eè(¦!\rÀ	Þ©E
«B:¤(¦`Kð ÃHKoü|ìÚõÌZøhÙ\"Ä,¤Ô\0ð'&hí ÍäûbsíðøàðrûÞ O\0ØÝ-äóÂûIJÔJ`Ê±@ÐØ±btÇgãjhNZÁX^lÎ~Ëë|àê#\$/Â\0¿C\0Iø&00iø-Eù V;Å£!IüKlo\n?ÐØiBHÙKô5 ÞL@î2CpÑ\0ÈFggìâFjr1+ðBDj2\0";break;case"it":$g="S4Î§#xü%ÌÂ(a9@L&Ó)¸èo¦ÁÒl2\rÆóp\"u9Í1qp(abã¦I!6NsYÌf7ÈXj\0æBcéH 2ÍNgC,¶Z0cA¨Øn8ÇS|\\oÍ&ãN&(ÜZM7\r1ãIb2M¾¢s:Û\$Æ9ZY7D	ÚC#\"'j	¢ §!© 4NzØS¶¯ÛfÊ  1É³®Ïc0ÚÎx-T«E%¶ ü­¬Î\n\"&V»ñ3½Nwâ©¸×#;ÉpPC´¦¹Î¤&C~~FthÎÂts;ÚÞÔÃ#Cb¨ª¢l7\r*(æ¤©j\n ©4ëQP%¢ç\r(*\r##ÐCv­£`N:Àª¢Þ:¢ó®MºÐ¿N¤\\)±P2è¤.¿SZ¨ÁÐ¨-\"Èò(Ê<@©ªI¥ÍTT*c*r×°L°äìÅ0Ð û¿#É½Ô1B*Ý¯£Ô\r	zÔr7MðÐ2\r«[½­[Þøäø#ÆÃ¹Á4½A\0îÌÌÐXÐ9£0z\r è8aÐ^õ\\0ÐÊ´áz*¾ÉÜÊ2á\r«C7ËBrÝ¤à^0Éh¬Õ7®ô=RmØi±hÓk¦\nåü¼/Kâ`Î*w:ò½¢Mbé/ÂrÈ;#Üµ7àP®ApÎ£ @1* àøJ¢\rãbH¶Cpíú!Ç©Í6´+XÇRcWèR#¨Øø6C`ë\r\nwÔä/Â3Á`Î3Ôni\rlú³¬cpãB|ÌêKÒR£H´èéÅBc3Ã7A_¢vfPä¦¥#ÝOo`@)\"`0³L+¶ÚÝ×MâÒ®SS]úpÌ¶!Ôû-6|{º=;¸ Í³¬(6ÑK 9ò+÷\0002¦ªê¿q´4\"M¿8ih¿dòû É\"	Þ3Îø¬\$67£Øòã±s3dÁ%;tûÝ,jÖyxe7MÁ@æ¥¢ Þ5¢¡\0)B2å#KØÂÖÎ&b`ï£LÇ;,\$cRÑÍÊô7\n{G§cªeñ«Y!ÈÑVûÏ0J|Ü b5	TT*¥X«²V)[%r®ÏalY¹`èBirÎZUHvø­@aSì äMI\"^ïù¼¢©éø?E@<!åH~Õ¢jTªµZ«ÕwVjÕ>AØ?	zQ@ëa¸ðàHÔ*È(#å2Á	9{0ú§¦ÄÉhL\$' t>WÁ0æ2>JÍ1UCheI8F¥ù.dÁ@2(ÁfçÅß·GËRáÐ4æDÉ­4ÝÔ¨íbÑ\$A\$<*CE(N0çü \"BªRA\0( ¢©§)*A%¬`7'É¤Mm3Ï0g\"jÍQNQ7yG2â9NKyïÂFü|y­peó	,XáÁ)Å}Ã¹©o±Æ*Hg¸d§\rêEKë\r/((0ÌeV2E½Ö ¢BÃÉ&,CÊøÐjMZ¤hh@Û\"¢D1±#j&Éö3Ô7ÐtHßD¼	áL*>@¤ø¤yÝJÆ¨«ê&*Ul^ÊÈ1Ñ`êè%4lIZ)&c;i(6`©/Û&NF6RTzCéf¤æ ø~\0Q¹^l'à@BD!P\"´Zü(L¶·£ÙBÄXõ±Êp9J¿Zj«a¢haB7\r-MÏí>&¾Ô£Ô@U?\r«ÜÂ£eÊ|çÙÏ¤óáD,tÈlÛrài½Æ:\$TÜÿ	ªÛ\"¦?#^\\0V0Ré\"*ØÉNeÂ
Òö_dØ¥}4&ä¤ÍQhbb½§46\\Ë«,[ìñÏD®¾¤4£:ý¤7G9mÑw\$Eo©G9pw[rÂ
Kð½øn/D©¼.õÕ<0Ù
\njá>´Yýªrýo+ªøZ6`e1ì6ZLò_´6¿p`©ÞÉ=âZ~b9¦_¡ed«b¦Ð2ÒÁ4-§.\nl\nP 0)3ôV#é7Îr<]ÍæV±³à°bÒX^v¨iÚRUP\rJÌ.ì'µ>Ã3¼ðæôàsúsº7èMQsÓTXú,È[,Ù!µ²JÃ(g¡¥RÖ õFªFJ]ýsqweGTê³Ou©÷Y%U| w!¤=öJ,F\nc<ºt%~V3Ö¦IÒ»ì¶×\0äðeGoÐäy¶&«Ú×^¡6\\KÈ\0Ît·yäÄD]ö/Ð É)
ÅkÅrª¥ûrÙ\r¾:paÆ\rªòoráÓlôp!,¾ëÎ¥¾£xÞmX­Êõ?-Ç	¢äÀ/'6.üCAX¶f¥¥-d®ÚÐdA[÷!®nìýå§Û¡5¾hÄqÄ1#võX¶  7ñLÒ`\nU«ô§>¥)¸jÞ)R\"Hû^ÜnªWvÎÐN:­ê¿	ÄÝ}7wÇ	Õ9&J®wQ-
, \rÅtYpËL³¢£æ.Z;Ç\"
ä|aèÐúfB½8vÊ¡-ÉkÂ»[ðõxÈ3ã@ÊîùzäÏÖúþêü#ùë¾@9âFmÈÑS:<EòNçV#	eþ³(c¹Aûê\"×ã&©UêÈÃnËeUü(~eKtãêíqc{ßoÈW¢FÄõ5|â&\"üÇl\\-O²%¶JÂ`÷%ÔópµNÔ:[b÷éÀs ]¬¤Ú°ð\0ÊhÒï/-ðg0ãNohð_ÐRÙì2èlÊ ö«@#~K×¾u¬óÏ!n@ó¯Ðïóð(Ã¯#¦f¾ÐN&4\rå
Íb`xâ¾Ì®¹Ð¤pªGÊâC@\$òKFþ.üãðe°Î[HäØepÐñu®ÚrË8pòb£æ'ÄB%mLD¤NL/axCþDv4#J@Q\nO°ßÐ@úÑçDEq ½UcwñÑ	4\n~ãQL1s1Ohyä.fìÑNh«*\".Åú\n±\r(y%N­qî¨x	tC\$Ïêð¡¬Åbù¦~a¢ÖÏ0ÞÑÑ°¹å!b©©ë¢üa\"âä-Ã\0êLCÂþ#dÍ¶ª\$ Xï*_FBÑÂ1l¨éá.*þ`\$c\rV¥¢\rmÜÔFR¢\$ò/ äbOTAËf*iÿ `ª\n pIr/FÕÍ2&\nÖ>×Òô§!%ÏRK
Ís,.©IX1bP%G\$ÅllGÔé2.;¶y0-r!(ìÈl\$*F*b1\"mZ%ÀÞ«¥¨G+h9Îy&d/ÑÚ0B1l,ÏsIl!!°bÆ,­<%Ê'hç.%Ú4é/©-²õ.10òCÒï0N9/s.qIäâ@5c(ûBè{*j7eÁÃöÿñ:gÂ`Oß-ÂÜ/d%Æ¦³e²³VìpÜûî¶Ê¤:BèFìöºBE©³6³-
¬³²ì0§î6rêrKP\rëTykMnænó110@î\"+ÿ  ºÅjòg%ÚÛ1@	\0t	 @¦\n`";break;case"ja":$g="åW'Ý\nc/ É2-Þ¼O¢á@çS¤N4UÆPÇÔÅ\\}%QGqÈB\r[^G0e<	&ãé0S8r©&±Øü
#AÉPKY}t ÈQº\$I+ÜªÔÃ8¨B0¤é<Ìh5\rÇSRº9P¨:¢aKI ÐT\n\n>Ygn4\nê·T:Shiê1zR xL&±Îg`¢É¼ê 4NÆQ¸Þ 8'cI°Êg2ÄMyÔàd05CA§tt0¶ÂàS~­¦9¼þ¦s­=×O¡\\£Ýõë ït\\
måt¦T¥BÐªOsW«÷:QP\n£pÖ×ãp@2CÞ99#ä#X2\ríËZ7\0æß\\28B#ïbB ÄÒ>Âh1\\se	Ê^§1ReêLr?h1Fë ÄzP ÈñB*¨*Ê;@1.%[¢¯,;L§¤±­ç)Kª
2þAÉ\0MåñRrÄZzJzK§12Ç#®ÄeR¨iYD#
|Î­N(Ù\\#åR8ÐèáU8NB#ä¶ÒHAÀãu8Ö*4øåO£Ã7cHßVDÔ\n>\\£B¨CÌåú8i\\åA\\t/Ê>¦W³ìË3Ç) FªgD¯ä[×5ÜÎ\\ªyX*åzXáÎMEª9o\\qq# Ú4Ð@A\nBÍt3\rèå#ÆÜÕ£pÎ7¼1B-`î4¸6\0ØD1ä2\0yÊ3¡Ð:æáxï
Ã\råzAt3
ã(ÜÄEá¢\r°[YzÐXÚàÕÃpx!õc\\Y\$~äYÒ@=á&³9\$ '16Z/¶«¬%vÁ±lI@BäÙ]GáÌD\0P®0Cuè3ÉA(ÈOª½m1LÅYÒhçCZ¹Fs´¤QMg)\0ù\$	psOÉÒKG4éÈ²vulsáÎZNiv]Ä!GGVO ø»s)1Ýy	.ËålÃ1ÅÇI*[È«ÉJî P:cwQÃCÂ7B¢&#üy=Ç&\\-=»ïºHæ¡_WDy_V¾Rl;ú¥ýÑ<ÚßÒÓOô1<xÏ)çjY¬ÑP*Oy\\\$pN­UlGË\0QJþ\nAfÊî9JMÕ»Á!ûÈûñ~jÌB§\0 !tNyÐØ¤4Ì!)ðÌc0V+°ôÌä o5í7@U`u`L3=@@xg^ÍÃC8a^1¸ @¼Ãpu8@ 9zÄhæ¨ü@ ÂFVª-òÑÊ!è'8¥¡JCH¨nõÚJDGVÁPÔ #tÑU8u`¬xÆÆC¯U¡{1³PÇ\"d2¦XË¤òflÕ¡EDK=ÒÙ¤0fÓQ0d¨¼ÁPÜci'Â~¦%p )]r:	vâ-´H2(@¤gPÂTìå±ticÈ1ÉPÈY%dì¥vZË×¬²LÑ3UTÍj¯g¬ü\$Ðàmk6ü)êÄ\\¼á5´4>\"e\n3\rBÌR92	1>'Z.©\r\"HvFICXÀeÂ¯=ê\0Äk%ÁÍ8ÔR`lê*½h±38ì4ÀæhH s®
ÂÌFÉ#dp3Æ²bx@PEÕm£Tn:ÉD:Ã0¦\"D¦2Ä\$]5Ñ5^½C¸`Æì×fmM¸epkø:£
ØÕ\ráÞÉFñqcRDºj.åÅK¡ía!Í08È#C\rÁÂ51FtÅw8¡4FpÒÙ68u6©4NbkM©¼GúáXQ>(\$Ä~î*ÖtË´IlhA¡Â|Æ%JI(¢!	t*Q7&õåA\$vK_HiQnðq¦ådAf\nØ `ÇL²èÜÀ ÂT}Ëe(j I¸!G%»ËÚº)e4A«Ð,)JF¥\$0A>§@¨©®ô]LA6é>@¥szw´ôXeÌ\"[ð@÷` Ö@F Pa¹Á£&À÷ð9´^E \"ÀBê!E;ªwÃ];p\0U\n 
@³¸ &\\ü^SÎZG+·¢Ëy¸çã»1è=b(æä|E!AÚvÐGKG\nÚj+s?\rTý/AïÔd²\"#«aN¯BIÎ¹÷C6o}*ilbu´\$oP­é¯ÏYöÂ46N9ÄP¶Â9\nÔTÇqÄ<Mmé+@P­v·£#Vþä*%RÑá+& Ædsçä(6tväp¿BH£bNÅ¥ÔW&^5ì5ÂáÃë#ä]D\"2TIlcTàUZ «%CHeåQ­6º¯`ü%ÕØ#1+ÍÀ¼HÍ©ü6Çp¶ÔsñWÂÊ¼¸~zþµkÍ­{L@¨ö¬øæ?õ\"bÚzkYkIÿÅãÔB²]ä|WyÙy¼çt \\r)\nó°lWà²ÚiÙ\"õ»l¼úC	\0 Rná¬¿kòÊYÕËbêíÌAyRLàÌ7ãàÂkÄ\0Mi6o!Æo¿±!µ©\">Öb\">Dâ|XÁÖ#bk7ìÉ^íK±>Ïã@2ó(;¤«ªQJ¼\"µ÷f­U¯õÒiH\$­§í¨oºî«°üfBÂª~Y\"ÜR?#ÐeKøþüMÞÿÏ²øÏJÿòïæmA@T+!Ê&ì§c\0âþüâÎð¡bO!ZlÌÁ¡b6öÁ¤£°2\$2ÜnäÖ#à>ON¼g\"mæâò\$mÌÅÀöP\"@ç0v¤#,3nÖÎb0~ÁÊâÂGPpàÍ	çîõÐöPhBGnø°¶ùpº- øQîâLç2shZA@àI ~Z%ª/ÁGíô£îâ#¸°ñIìwQ£ÍÄ]í sCæuîrI²mÆ\"1æÄ\\qG®Gyº®¢òYâ0ì×'ä[phÖp©	pÕ1JÕq.Yð¢&ð ¼/ÖèN[1ZÖöï¤ý0¹hUÑgQ`Z§Ç\n¥gö#î?kº<3Ñë±Qöa\"ÊáâÂ*²®àìp¡¢1n¼¯VôÑ²lqé,ÙG±¶ÍÕhônõïqäéf¢pÂo¬GrÖ.#î¯«ÂmG\"´SÜ¢ZI  ÐãªÈ4BÎÄñXènqq*çOz0¯~Q0d®+é²RA#Ã	\$/~¼JÌ¾ME¦n\næNÉ%Gìë.XkùÑÿ\n¡å®^WÆ¿Ò£R§)ÒÙQ+1+n\\kÒ¼=Ðk\nrÁÒ½1ú?Q||Á¦ª.¡jAÈC(Á^ÁÊcò ¢oÊÃgÖ:1ÄZ±Ë\r2	.#íçÉæÉ21É2s§Ìt¤éòÞ%§mÀ#èç]3k¶n\nÏ»4E|Ü3K,¦îÙá.Q±WÁc2gë*òÏ é7Sx\$Î³8Ï7qÍ7²×ór#ó\r!s)837Ê#WÄÒW«MÒ59;\"?;q¼ÒË;ñ¦*W-1q<ÐMSÑ;Äã:S°YäMès®R® êÑOÓÄì.«)ñµ=Â©@?@ÏÓý@°>Ô#Ap*ÓdOgF'®î
jïµ@#ç>îòõ®}DC³4	\"© É1s\$]è3ô0a0=aFh#áÐF¼\$ÈÓ@´ðÙ¾nxÏ.òò/ÓI¦wEÄuLr¡EägIax4/O~Ð}hp\rVÁàÒ`ÖSäa ìªì±Î\rëðÈbÌ¨\r©4C*nµìò\n pT)B¿9Ú §ìa§uHC+R	Â°~Î\"×áÃìB°Î:d^s69Ãð\\2mé2h6UP2#&!on.¡lEL)aT%ð.|êæ¦>õuz Á~=cÚ#TÜz'ô1ÂõAjÌÁ9°° {C
B/Ð°#v§[¯S\"N÷\"8+A¬àÕÍ\n3ÃA\0¨Tct5#V¸FlSààæäÄKZÆÐò2¨ógLG[ÕdÆ¥ò0ÒÜ%ÅQ6çmb\"ìÅÌ@3B»`\nÆ ê\rµ:MáÔdÄÕ¦ÎàB%h5TS\n\"ê.òWa\$äLFºürØÑvZg=\\Äæöyç]/0\rìÌãd8S§8óyá7pÕ,k°2¤¾ÒÄôDÅOk¡\0";break;case"ka":$g="áA§ 	n\0%`	j¢á@s@ô1#		(¡0¸\0ÉT0¤¶V åÈ4´Ð]AÆäÒÈýC%PÐjXÎP¤Éä\n9´=A§`³hJs!OãéÌÂ­AG¤	,I#¦Í 	itA¨gâ\0PÀb2£a¸às@U\\)ó]'V@ôh]ñ'¬IÕ¹.%®ªÚ³©:BÄÍÎ èUM@TØëzøÆ¥duS­*w¥ÓÉÓyØyOµÓd©(æâOÆNoê<©h×t¦2>\\rÖ¥ôúÏ;7HP<6Ñ%I¸m£s£wi\\Î:®äì¿\r£Pÿ½®3ZH>Úòó¾{ªA¶É:¨½P\"9 jtÍ>°Ë±M²s¨»<Ü.ÎJõlóâ»*-;.«£JØÒAJK· èáZÿ§mÎO1K²ÖÓ¿ê¢2mÛp²¤©ÊvK
²^ÞÉ(Ó³.ÎÓä¯´êO!Fä®L¦ä¢Úª¬R¦´íkÿºjA«/9+Êe¿ó|Ï#Êw/\nâ°Kå+·Ê!LÊÉn=,ÔJ\0ïÍ­u4A¿ÌðÝ¥N:<ô ÉL a.¯sZÂ*ªÍ(+õ9X?I<Å[R²óLÇ(D%/ü(¸·iÜäÐÎÔ¬tÙÇÚñ9£ªH«0í?§Ý©ÍjAc)Î¥ÝÏWÊøÚ±Ùq:öÝ«#.©+tÖÅö¢Kp36bÌ×qÅAÞlÓ\0ºëX@ hÒ7£«wCÿRÌ¨óp¡.ÉÝÛB2ZnêJ(ö¢JàÂ\rÊ3¡Ð:æáxï
Ã#â¡pÞ9áxÊ7ãÂ9c¾2á¾@*N¦xÂ8*­åÝZvë»õ+¯ ¹M®Î6ªÎñíAAÑ[þÖC¶3<ãmöÛq§;ã]c9èæ·6èãu)RºCR4
a\"C%þ´ÝtýOXSQ@64ÑnªÅKjÑ\nNÖÔµOµ*©9'^Æ=áÐõwÅvö5¸)íK['Ã´±?ñ\$µ3wÎþIkr);ùCÕ(ç§c?Þ§cy¾J¤£Òdø¿%EqHåCÒ¨;ïñ)WïéL(\nÅ'²ZZr§ë]/dþE¢êùI''ÅÌ,ÆÎ·>Çäæ¾ÒVHS\n!1v÷X#q@J¨ãã
RrlXA2çt'|¾H^ÞÉ¼2
EHÞèhµ!aJ
ÉùfC÷R¹B~kº¬w.ü\n!I[l
Îþ³\"Uc!8úÑd	wË.(Ê¡òÊ\\KÅæ¡Ø®%®áÉåÌ±Iz²v\nUÀ°Z±RA²A°èAÂ¼s\\Ù»5¤ìW¤ônßzã
)W5FqkØ~aw ¥ìUWÁÉþ?¿Sþ«Á+eGYH#cNuâlb7h¼0¦3v\$Ó¡ùDIYt\rÓèBYIÇ,ÎÇCù9%*&¡fQ\$¬NYF@M:í>\$å87Òaí\r1i±)¬/\0®¦LN£Ú@¹O\"ZÒ(ì¹3&hÍÃ:gù 4&%;Z3HiM02ðÜC i¢ÍU¬8I-*Ê|5Ï)®µóN§`y£å,ÙÏç¼Ê²VQ4¦Ö@çÓLf)( Å°âJS)QíÔG×µ \nÝ#ÎrK'Ôµ\$¨» ÷+'ÅUt³6jÍÙË;g¬ü;´ØÑZ;Iim(<FèÓLjÁÎªªhdÁe¤ ùáU+:U
97êB«R¨uÏ6Ñ·bìx[«ë
àIHòM.È>TW,©rÂää§R\"A1ß¥
#Ó¦ªV´â;¬@)öl·3»fãr¢EH/QÊ}0£ÑÔ	)¦¯¬¨´LåqU2R½¶Vo£õË:ªWó)`ºUd[â9v#Ïu/à@\n\nø)4ëmÀØSÝº#õ>>.º¬éüZH*ow¤äÒG	R|bm°8Ý{è·%½i£k¿0ë²vµÒÓYxÐíË\\Y
{¬óE(½@r<þÜ}Xª9aÇèÖË;s\rvÀ»J¡\$¶\rÔZQc¤~'v¢T3OiA
Úh°rÌwÜûâïÌâ3íäcìB±V/1m9ç¹³|!r5nb~xS\naßLop9%Î7lÐSÍ5£#
%éÉ©²VºÉ&*Ô|ñ³ãÄÏÌ@L= ¿PÈ)³B-Á§:`9Ç
V,²\nvl-)U^ Pbêgh«ÄtLò[i¥}DC8¾'.:{<?·[/+ùDF\\ *¤gªÌ}tÅòÆP1ÓÔZ-¿Ù´ä ü³ôµ»@Ù7n4Zú(.Ù±Hã½{å,b»­8@VØÔÈE«DºÀò\$Ì`'Jîl-¶#Æ¦I¬>/¿£\$-qÙÂ}C(\rYÿS§N,X¹ Èå¨N¦Íô_µ¸é-NèJÛ½ðt¯H×U\\ì-T¹¹éaK{2²?øUsò¿·xU@Çh	ÓmVq÷³4;û¿l±°Ë¨,ÑÝFÃwÿo¸\"î%¢.+ãÖÇ~*h-S,Ìwëg1èWÊ|4^r,{z©µµÊ~±7xúáCrÜ«Æt)*ß¼A)\n/tóiÍ­=w×|Ù=  *W\$vÛõÙÜ)¿n=a³±Î;Òñ@]DÁ9 ßv-ó#åÏ?äðqÎ»wÞAýlL³*W¹ò?2a§·ä¾ûìÏùdÁ\0PA\nP 0ÅâlËR¹UDaranUº¾Õo8pðm\"¥oäuªÆ¥ @âùÆ¯Àr¯æª­|´®^<?â<pÎ:+ÉTB²¤\rÂO@ÜHé¤¼Þ'{Ë\náìÃp&*¬p^üé ì¹©äü£vJ°>'è«°¸Mf«+¸l*§>'b°óìãîZºíw+\\)EJ½Å	U
Æî,Xí	íð6â»dÈWÞ/:YÎw\n0ÒÕÈ¾ÿ°)FÆö&òÐ\0÷H/(8ÉBëÍ|EÎlò	ìÃgí	+	\r¥ÄI­ÒÅôEV§¿ðâ-\\ãú4ñ4=¬bTÈèÛã]#c ö¥rqNÎTñ\$9zãNã£NìNüÕë#Ñ._°Öébr#ÌKm¨ðÉ8ój|Å%Ä)ÎòEªx*)/®\\oèy-û	%ü+â\"ª¯2.ÄÄ}Y§ò\r#4yë
o1®NÎ­èõoÆì±(4o­2òH¯ê4ïµ)\nªçzÆÆµbª¼SÑ[Èâ¦Ñ@pädäQ,è¾Ù\n\$Ò:DÃïã\$²0°²Pª©#fïEõè,ïr_&¨	&L¨ÒßòI&r%Ð0ñb\\í£)\n¯´í\"ìÐo/Ä`ìPu<¥ÌÚ.7q1=\nÐDè
ô¢ôçï&¢ãro)2Îè-DUb²e,Âi-O.{'.KGó)ì¦±B°Èçè½£{¯êÖ\$I
*Aí	¿\"NIáçPåò§3wÅ½ª¦?âA\n\"J²³\")ñÞ¶ðr]-{2¤ØEÒ°j)Hd¦:Ï­ùM.÷.OLÔÌ\\w3Â½È#±è¸hb\\Q*öÍÙO´¶Í8È¨Ò+-ä41Hæ¨S#2lø²ÜºëÓ»í=rÆZ³Ë=çò¯Í>eú§|Ï³Ø§q¿/!?ÓòûX»Óã<3Ôït\"@,E0Ut\"d´(Ü3]ÎÙ?¥+BBCgîï'?ÐâZd0´S0(zE\"7a5q6ðÄõ4bÇF´å	K+k@b#rH*£Hfí+-}+²rª.Ò¯I´AªYBóè(SUK'§?Cw:dJoHzÿCðçFCpzBLÅLðoDÔât_1siGó]Eß«)+Pq¡=Û1
\r~T2ô%4å>ñ¤QôSQ¤GQðô.`@U+6oSKC³÷KFÊtUµ4x³Å/yU#K5&ïu\0007e/Ow!UCRTôÔ¢öo=59XÓ15o/YðH5o'NööuÿUL10õ°}[TÑDõY(2Y1uæÉ0§ÙVT5ØüPù^5&g)L]É6Á´-W#NþFËâÆò-µQJ´ìv´÷íìE
FP\\ETS&0aN]#N~TBÛO´)Æ÷G°x\\R_Z5±G0rÉ+H¸Ø§êøE*³*ò \0Øq\"rP¹5Çö}M°T×@(wË/2GPAîºÐÖ\\,\n ¨ pÕM\\Øê]k/^!qv°©6£Ùï¸Ïï¼ÆfÞ¼hh²µ´qLEÍ°Á2µXÉ4æÓdPðÑg0î|)éU5Ãfv×Tvlaè®ôi<êz~aÁ{´<o¡uèT8ºõT¾pq5vüíeÅtmi	p?Ìðe¾R©Èt+M/ãþ¸§#»1yëî¿Séw¾á0Çxl,é¿j![j«Q:\rMV2Ý^w£®¶AåTØlÝ5bì[o¤â<Ç·lo»6µc;sÜrI|ò½âðÂÔFNM],½Âøí6üWC5È3ÌpyW÷iVålxR¸w¦KÕ'Ó*²®(Âùòbtã®#{è|N0ñNÀcÚO¨1G7MHç3,k|ÞÅUdxø`æ/ÎK\n)É¬°¨Ï\0ÐóxâR·jd2\ràìb î@Ò­Õ;PÛIrÛÕ¾ùøÅvJ¦%*FÎè `";break;case"ko":$g="ìE©©dHÚL@¥ØZºÑhRå?	EÃ30Ø´D¨Äc±:¼!#Ét+­Bu¤Ódª<LJÐÐøN\$¤H¤iBvrìZÌ2Xê\\,S\n
%Éå\nÑØVAá*zc±*Dú°0cA¨Øn8È¡´R`ìM¤iëóµXZ:×	JÔêÓ>Ð]¨åÃ±N¿ µô,	v%çqU°Y7D	ØÊ 7Ä¤ìi6LæSé²:¦¼èh4ïNæìP +ê[ÿG§bu,æÝ#±êôÊ^ÇhA?IRéòÙ(êX E=i¤ÜgÌ«z	Ëú[*KÉXvEH*Ã[b;Á\0Ê9Cxä #0mxÈ7·Þ:8BQ\0ác¼\$22KÙ¨È12Jºa X/
*RP\n± ÑNÁH©jºÐ¬I^\\#ÄñÇ­lu©<H40	ÙÀ
J¾ö:¤bvªþDsÿ!¾\"ÿ&²ÓÖB DS*MjM Tn±PPä¹ÌBPpÝDµê¥9Qc(ðâÃÒ7Ó*	ÖU)q;+¥´vÂ­!ò<ÑuØB&å/ÇÓ¶­e4ì\\[âuDDÐ\\T4TUHtèEº^uì©;dH¤	ÔZÀev
â\\Üv¥­d# ÚûAá7¶1D8D@0cyM>á\0ÃwBÃ0×ãKÔÞíQC XøÐ9£0z\r è8aÐ^ù\\0ÝWd'	áxÊ7ñ8çÅaxDªÃl\$×¾Ã4\$6¸ØÜã}OTµ=SA[aBXJåi¼å\0©^1z¦Yj¨9[O/9NF&%\$n\nãä7>Ã<9`ÆYsÒþKÀ5zþ^YRL»´ÆuäÉØS¯ä\"b£ê6D°Â6£*þBiQ åAØ/ìº!DÊåQP©*ufîýãö³j²Äµ.o	2r¨ZÒòõ767ÔB1#sæ(9TÎï/:Ï£Yµe¡­jý vE!ÖS¹ñ _/Ïôw¤@z][O¤«ùÅ:ÙWF%§¸ÙÌ11BQ±6A'\0`ëh«-T¬EW\n
YV¾GÌú»s`)È#NjWóQ3ÅØ§Õ,ÇtM0y²g¸<\0ê¦Cªù_aÇ\0ØÃ9öl<:(zC8a>À)·\0@ºÃpu8  9aø»b@0¦1Îd@\0\\yÈ	\nj&&ÁFJZBH¸d%a¤6\n±Öt¥ªüàtÅÃÃSAv±VÅ³cLq2DÉ\$s'L¥ô6£Ã£>f@úS³ÓîÐÏTBÎÙç¡!xb¹Òy!Oü Ô0qT£.f5àX¢,bJL1v2ÆØëd!Ý²PÜÁs(eL±K)
4§4	!´8ÚÊÃ¤°Ê.w°vâoâ¸a\rlá øw<%´F©\\&¦\$7\r½|J8(ly×!ç{q!d\"¾|Dy\$ Ö\nqÍõD!w\0Ç4giraÌÉ#4jÑÉ 4IPÓ\04<`@RâòxäLF2S,x³ÓÄ¬Ôäßr¥~ÏhmÁº­ÅzCzrPò÷¢A¼;Ö8¿SETbú?.zÙÁ½_áÍ¯¨¨N;8\rÁÂ-0¦^Ãw94EpÒØÈ ¢¤×¼ÉNx LÎýa£ÈþñIe,,dMêh¥xx@Ò¤2\$»TyËê½@s	!ÐGCÌ(¥¸¯BÊç¹È7¬P8¹Pæ2\r²2o.ÛCGC4¦´\"svPBO\naPóÁ1h³*Bw-b°­§áziLåYWTÒTmµ«î¤ÑÔ,QÂ/QjÌR&Tv_*h¦·t\">BsTóiÁìY+Ð°n¿Â0T¨5¸Øb¥ÐºW9ä&_ÄÈ¸bØ¦Aç\\ìO	À*
\0B EXè@.Azäy&«Õn,«K%b±O×V¾³Eýùþ Ä	¿;|b_ãqkó,È,÷°(%¶Í¢_<ÜªÖ{æ¶é|ý\n9l*±@{pQîçóRa óÁ,ísÄHòÝ²À(°Iz³2¯}°*&t\0ìÌhþ)%wE**>TÛMªTZUÔ¤ËY/FÇj¥nìZ´\n1gÌ4§-V'dZrÁL2·XÏÉûÍÂ¹8:û¡ÆÊlfâmÃ(wi­>\0À°%2ø\$ËakÁ!b«_SU;Ä¹¦¶'ôûáÇãWÝòéòp8Ë_öÀí×=§¿/-¶+OÎÉø@uy\0Tc¬QÚ\"ÒöMIådhç¸\ncºV\0ä\0¨BH5:Ú}Æ^u·ñ~¸°S¾#ÉÛè¬Án/t©ÞÐÉ*ÛH¬ñ0;RjLõSÔDI&Î|£¥\"ù2«°4èÑõÓMg?·Z.¤%­nJÝ×¦ÌLÁé\$ô&2§Ü¥²ZKÉ>)GjTãCÞoVjÔî¿6G»h¡¤ùÂ\rã-^²ð©,NÐOBÿú/Bj©_±\"e°²Ù±a\"³WG?:V\$É±2¦\\½5õ@óáûëeüäÅëQ°°Ýâ-Ì÷PT^l@ÍÏ§6çü÷?ýî¨i·6M1}e­ßÏ×¿Oòn«J@ÿ.ûïò1&²W
|nãää§fàH4B àI0ð®>TÉj*ð*/ÂÉ°¤æÆAÝå ÐáÖëF¸þãLÝmÜÞôKªÊä\$æ10\näÍÍíÏaýXJÐt¾\nÒN
\0úÿæA|2¡.óÑlîå[Æl¯þýðÍ­!\nN¶ðRþ°óGÆÛ×ÐýÎõÚðÎ¿Nc°ÝTþÐÔú`2¡r×Î8ãÎ@Geâ°ä*n3ï±.·/ÐßldÆßëôÏÎ\rPöß±\"ÏKWPWñÑ0Ð¬Ì	ð\0000fäãÎ)mD\"V+Á:)pÂN ìØÑâ¤ã%bU\0,Ë^¥BÎ¤!Ú÷â<l¨âP=lLÀ¡3¸\niB¼,+Á+1íùlþ0Ý8ÞFðágç-ÈGÁñ-q\r¥ÃMKñ®ÿÑMMan*Oúý° ÿÏ1÷²ðîJòléÃ0D%©s\"ÌX¬`;¡\"j{#©î>+rlòLä\râJî;\$îVè§<'
äÞH£%§:ìc 'rR%p2'1xVD¡\0:P¿bÀ,!R)Ñ5Cã*gjópíQìïr¶V[*Þi\n@®TÀÄÎM.4ýqë!®öLÔKb<³N
)/¡2¾óRèWDÉ/ÚV;,rÿ-s)ÜV2~ôá,\0î)*Rú2Sà³#ò½.Má1ÐàáÓ<)ì'/4Ò\"(!DãåäQ.¤Éí¥-30ÅråRÎ@C\n]GñÎÆBvS-¬ç<ÁéBÒåÆÓPª¶ãàFü#Ò.ãÈ°ÖSÁf³n\nn¸ÚÓ¿#&àÐãàûo»3h\rV» Ò`ÖQ_ç\$r@Þ¸`Ì¦( Ã Ú\$@²h¦\n ¨ÀZ+>ïÁíÔûøü#Ã\$jïôú0sM&«P1ÔP@A ÓAe¦däùC,3ÎâDÿGÏ	ÞÂl
C9`HÆHm¢DÄ`+ÂÉ\"\n¤Îu>øã¶Q¬ay\0(Ghç8³IEQÊú0Â%gÇ3ÎWÇLOæû¢ÏÑ,\n
 7£X5Ë\$¦VQà%ÖÛÔRØCßLÏ -lGLuC\0äí¤lp^{ðhKÁ.@a8u®\nÅð ê\r¢þ)# âTLJám#Ç8¦Å®i¡jáènTÌ8,'ëlJ¥¬à\\l1'63ÐG \rì\\ãj8²s*¥ZNbPËopL¯@òEnH`tÆaB>\0";break;case"lt":$g="T4ÎFHü%ÌÂ(e8NÇY¼@ÄWÌ¦Ã¡¤@f\râàQ4Âk9M¦aÔçÅ!¦^-	Nd)!Ba¦S9êlt:ÍF 0cA¨Øn8©Ui0ç#IÒnP!ÌD¼@l2³Kg\$)L=&:\nb+ uÃÍül·F0j´²o:\r#(Ý8YÆË/:E§ÝÌ@t4M´æÂHI®Ì'S9¾ÿ°Pì¶hñ¤å§b&NqÑÊõ|JPVãuµâo¢êü^<k49`¢\$Üg,#H(,1XIÛ3&ðU7òçspÊr9XäC	ÓX 2¯k>Ë6ÈcF8,c @cî±#Ö:½®ÃLÍ®.X@º0XØ¶#£rêY§#z¥ê\"á©*ZH*©CüÃäÐ´#RìÓ(Ê)h\"¼°<¯ãý\r·ãb	 ¡¢ ì2C+ü³¦Ï\nÎ5ÉHh2ãl¤²)`P5J,o²ÐÖ²©ÔÐßÍÃ(ð¹ÉHß:¤Å â2¥nãï'¬¤m)KP§%ñ_\ré¬¤ËÃtvôK`(P£HÔ:»ëø  4#²]Ó´û¾-BÈ6¬ï¸A(0(çÁ!\0Â1lúRï×Uúÿl¨îì0Áj\0yf\r0ÌC@è:t
ã½Ä5}b9ËÎ®!|gC ^'AðÚ±²«8Ì±¥hìîã|#£Æ5¸%(¸Ê¢\"ë!0ë¥Xäí¯+ÚúÞ²=Ã¸ä¸(sf¥¥ìPÂ®-B¼m;èhJ2K² 9¾rè&{gC¢ìî)`àº!¨óK«ü¡¢êÐHÜ1¸Ô¨é1©\0êc©`ê2X.¿Õ\0Ö1ÓÃ~ª3¸Úá0#*¸¯ìÝn9B4¯Ï*WG­RTðå BbUé±34h2 #Ví£`ØÕÍ`Æ0Îà¢&­,6mþ+ØäëPã÷c+çYát´ILe\"_8á£ÃÆ4PØ§±¿åù®`àÒã\r2K¥þW@ÓK6Îî(h6ÁºÔ\"¥Lfîzß©eÈ
j>íÌB¸õ	ýmg8dQ±\rá3ÅbÁ¡)UA¿
@ÞEXn.µ:Ux¯3c-á¼³'U¢Á ÙÈ,èlú³å`¸eÌ¡\$¤ñË;A%á)
 iÃy-'PLÐ±%%ÙäõøÜù5NØ\$nrÉ Jb¤¼þÁ%@ÑX5\0Üy>\$½}ò]A®
çÝh4îJC\"²ZfIk-
´·òà\\AÝr.bºRì\rÀ¼ö
ý\"Á>®Ðï°Lûå\r¥XKÙÔ`{¤ÃÙ_%pË2²FIU\"²]è=x`ð\rñz±íj¶ü¶Öêß\\+rÇ9ZíNIÑ;IêùÃpkÒX&t¼j@¬!´ÒÃjRb	#²\"ysæèàÄÅN!hÎ4Uw#ÁÇtLäÊÎÚÀaÅÌß«x>a£\$P|¬Nó`aKÀ®¦¤Xb&-eµfM@CHo£e¸¡ä0eÐÜ¬é-.£° £èu\r@PCNå1¢Ï6Ëâ3
½ ´KÍQYn7ytC¡¹6\$z ÊÌ½â4h*<Ãâá\"*öPõòWY¨6Z3îj^\\Û,«j~Vj(ìC)\$\nÆøÂ#9¶IÉI+%¤¼¸;UXj;E(º#³°I´¥TdÔÊLNy&AY»T(ng Õ`âÙÎ?!¶8Èedj\$K¢\"g PVEìÚJ`Â¥Y.&4<÷/¼ª¸OêÇ²0®éY¶Räb*1eb¤\r»Å`pÏìêCV`@zî}M\"\\«1[êÈýCc¥`©Lb:}\näìÚ¤ºC÷5åp±¥BqI:SS<ÂY>ÚC¡h®(´#W1gu\r|)´'Vk²¸=Q9®~q\nåJ|æÇ4Cqþ©>¾B%Î\";véÇ¹â+ïr+¢8Gz.¥Q³y*sªG}f?
*ö^Ùû{\ríÂ^DKC.Q¡M|ØN[l¥ç·£_ÎXe*p7«ÐçbÛ/%¨%sü¬åQl¸Ü¡ aIpJjaL±Ág¹äéMª¾pIzAGº/J0\\%
øLÁ¸¬µÇèÞâ~M¢>b 
=/Y'gãÊCò¿h.ïÉaA(ÀiÕlápv{!ºêh²}w¬ÞíPKPÅ±¥R\0JËdnJ»Z?JE\r×<°¶x)÷HL2g¸¯Ì®\\Íb~KÞ)=ä:ø°ÈntW¡í·#\0+ØO¯]üÕ·áQ¨í¨C	\0Óï\$lúº§¹Ð^Ýk¯ID¸¥6|Ês>eÌÀ9´3¦O>çf0YþdìVaâ\$ÌÿY\"Nñë÷::è àz9.é\"¿¥R)ºyG#ÝK un°/Z:}w¦ö4QÖgdÏF6¬ÎKQ#®íÏ;rÎ;×i6]¬tÂÏ¼|+ÂXÑâ:Ï}ð¯ÃW¯¨\\\n?!ÝÐ§s¼ÅøÎ#²1è=@ÝÏªð,\0%!^,¦t9ëý\"\nÞ\\8ó±¬éxÏá¸«ËöÞÄãMs\\º`,&áÇq´Ýû~Û>T0xç§û«7·Þ\n5÷: sMÊß~\\õBÍÖ¥Ë_~öP%ÿ'Pþº¶ oÚÿmËÌRÄlXqÂÂ/\"+Û\0Kn%üÆmPqPzÃòJ Ä7Ãb\r¸;\0ädDO°7dD3\$ÅDDÅ\rpËÍ\"PÀâ\"ü¢:5í¬gG¥ÃÆ\0Ps\"l,ÊÄMHRlâË¶Y¬Â;èËPÍoð\n\$ÄÍGÿØÍí|â¯	ûïôO(\0£®¨ÉîízÿÐ½ÐÛàòÏ(w/K¶ënØëîäçòîL0îá-O/pèplì'êÑ/&ò¢s.¦ÈdIKÀÀmÒ<kJÁ/T\"/æü#pÝQ:a?DÀ8%íÚ¯Ðº}J4ÛM¸J07â:Ü¨{°	Ø,r<k\"#¤#¤ç:ÉëQv\$£©Ý	ZB
bÏd©~ÊÂâ«q >Â(çQI<i±ÒOðdÏàSEGÊÆÍÎ±l>#\rcíïÌ¯QññBõ­dUïÂÍ¬Þ¤Ñð;câ+m\r,üõ²\" â\${§âü/°c¹Íõ Çå#±ìS
Ê°âÂTiB,#Î!²\"òTçt6c¡#òáq!÷\rM}ñP×'Ý |xÎÄ#æÜnã·(æa\n©&°ðbÏý¯{(å=*2Uë)æ.9+k°zià¦F0Ñé0H0Ü}RÏ\r(\$8
¹Ã\$àF-ßÌ¿!Ïè«ñ-/Ã-ñG²¬~QÝâÈßê¹0íå/2)1mâP²üõ³\0004óß./*íî>ñì	-RZJ¤jFãlQ/¼,3/qù4r&GÑ11ï5M2qb\0ÒÀä/ÂÕ(Âyì¥) f&/æ|32³0\" sê®}9ìÀè``Ãg)­8òòS§9M-ÂDsgnoÊD	Æ¯;
EU¬÷1ÞêÇËSÔ%óØî`ÀØ`ÆÀÆ\rdÐ>®ìlÃ*kî& Ìc²'«ä\r¬b®¨V\n ¨ÀZÔË*âI=Tôì|ðô8#Ô<Èó¯>NæDG\rb#2K¥LÐ#ÑØþâ	¥#7 òp ò+æ8Æ4Ü,bØ/e`8­ÆcaC¡3d*¹T|96«Æà°r Þ½eî«ãJ, K42Sb\\QªAÜÛ¤hLX ôlldÔ¯ø{r ìs0uÓPÏÌÈþÍPËãîÈÃB£Tù\0H`\"©pSóKPTã/1BÌ¨L¤2db\rårm\$NC¤cÍO¦òof9õFtúmG\0ä«D|Ðvs\\J³<&Ôê%ä1P/ÄêÊF Æ ê\r 	õ.VÚ=À-XóÓïÁ%&Çp\nðD%EOì}DLÇA\n¹lä~Ì[&¡PíÈ\råâÈ.e\"¤´ k²I`à\n2)ÐÍÇî?àä";break;case"ms":$g="A7\"æt4ÁBQpÌÌ 9§S	Ð@n0Mb4dØ 3d&Áp(§=G#ÂiÖs4N¦ÑäÂn30r5ÍÄ°Âh	Nd))WFÎçSQÔÉ%Ìh5\rÇQ¬Þs7ÎPca¤T4Ñ fª\$RH\n*¨ñ(1Ô×A7[î0!èäi9É`JºXe6¦é±¤@k2â!Ó)ÜÃBÉ/ØùÆBk4²×C%ØA©4ÉJs.g¡@Ñ	´ÅoF6ÓsBïØèe9NyCJ|yã`J#h(
GuHù>©TÜk7Îû¾ÈÞr\"¦ÑÌË:7Nqs|[8z,cî÷ªî*<â¤h¨êÞ7Î¥)©Z¦ªÁ\"èÃ­BR|Ä ðÎ3¼P7·ÏzÞ0°ãZÝ%¼ÔÆp¤ê\nâÀã,Xç0àPÄ>cî¥x@I2[÷'I(ðçÉÒÄ¤Òä¸¨; \n*0\"sz4PB[æ(Ãb(íG\nÝ C£ª&\réË¿T¾£lÄô# ÚÔºÃôþ?Ã¬(cÆý&	Â>o«î;# Ð7¨´Ø@Ð@XÐ9£0z\r è8aÐ^ö\\¢Qãs =ã8^ð%Z9xD¥ÃkÞûµ#3Þ¡Hx!òJ(\r+lfùÌ\n\n (H;¢5´Cðá T`Þj8@Ö.ÀPç¦0ê\nñT\"!(ÈÂ.x
az\"%ó³»5XÀr4¡5Hß\\¨Ìè0¨ËuÉsB3L2EZ\$3ó!Ç Rw£j[8\nn&3pêè°\"B8­ªè(Nz_F%ëpß<-ÜÛ£)æQFKãB)\"`ß¨ R`Ü0+ÍôÚÇ¹C?_00»È£ý»º¢ùz§Öæêã¬ÒbÎ³ì¯\0C \"¥üg!GÚë¯îùtM¾C
Ê4¸d?F (ìÝ'#xÌ3-¶2KC2ó2)y\në	¯N¢76C
ÄÎjå#sBr¤uzaøKÖN3²Ê+{ã x
R¤¢ ÞÌ7b¦)ÁÂ#@\\6p^Ä7OÃ\n÷ÇlôË(Þ§gã3´`aNt&ÏtèPIH3	|DNybX§AW¼6ï[»4&Xf­Uº¹Wjõ_¬î°Ôr>%eà^I\r%¥i-R|-[ëÙ£,sÐztRÊ¥ç2W¡ÞCµk´§\$üÉßôOÄµó&eôt}pv«ep®â¾X	bB¥RÌJÉa-Bå¦Áñã#à@×¹I?pl´PÎSÑ:ÉïBnÏ±0D¡É;¢â¼Hf0t4pÂÖé»T°Ù¶aa3÷ärÒÁÔÅjA¤TÏJ¡CîÕ¤8~Ä6%Âà\\¡¿jØÞÌ)H\nÕú\ndqh,ÊyóË¨U×¨XÝ¦Q¯ îÏ>`ÒTdq='òMªHÍ:L:`ýº¢\n¦Íy»TË`7EêP:Ð! 42£Ã:¹Ò[¤I+OsQ5­AÓ0eNË6&8IÜêFMöDbàH©ÌC\0(%1òêgyÏ½øÈµ°TA(TD)2©RÐy¹3ùòlR2s\n<)
H«#C¼?HÁõ±ÐÆ¹Nb} gÍ	ÒvâaÏOÆÖ=ª`¨e íè6GW+ìl³1OÔ\"üã»2Á*L´hmÅyª&Y6¦roLW(jt3 ÆÅJ4A<'\0ª A\nÉÙPB`E³h©5v*Lí\$TM¨µ%qëNGáºEð&*ú'ÚS#¨\n_Q2Y?c¦ñz3Ç!'{véB{T>jÏÓt\\U\$ìº Ñ;-©Hs-ÉÍ·G)oÒ«It²`à{¤K1µª×dühV:(¥¨ôcëÔÁ\"eG¥\nñè£DßâIònåè¶ d!i¥\\6bPCJ_-çAÑ2À#~4ÔÅôuÆ½ etPDøÖgÀM©Âx]xlÖµð@dmÅ ÔÃ¦ÐMñÐÃÕÝ|d4^Ö U2ÄÔØÙOÝøÉëÑ­å¤ºUIBQM}2WýjÛ\" ()*RÌL<ã3Õ&ó9V·ÓQ§@<ÀbªqdÑ¤à£»\"½L qÏaÈ<¶Á0¨äç¬ù 'er\\MÕ{0ÈS Ê]%ñ«mÐ?G¦ÉrvIh­.OCÚsYiðÜìõM)
ê2\"DÈ­m#D©r*ØF6]p#äí±Q3âQ-0%:¸ØPÂj3Ê{âtös6Þ:V]¯º\\ìé]g05nöäã§^÷2ýºFêsIÕ_æBí/¢vAHmDF0s5¨ðÄÃy³ãÒ?Æ\$uÝ·ZqÓ]È	Ý¯\$¼p^2oÈ©%MQQ¯aÜiÂs%\rÈ·b{½J\n;n5RÃ3wÒ©]=És5WÓ:3\$e+û þ]#¹U,Dgïäf4Å\0(3ÊaRunq½IÏEÉ5ý×íWg¶\"üÁ-Å÷bò>ÛÌ\"×rsWO¿Q~°pÍí½¾vb¨©ßÛ×Å}·¬ö©sm'êüy}C±t¥OÔÚ¢Äë&§»¢v¼¥bò¯\r=g×zl§c=¶¬ü¢ÉiÝ!38dL_}oÂc\$(U~EÈ29à'cÂ ?¼7\rPwßNÎU*S]û_Oc1á®øKÜÀ
Bü2Úú,Ì[y~Ïeåq
»}»ÖkC¶]oôáïtFëÐÿ#´¬äð¯öñý¯(ñàpÐ õBxò-þx(:«ÎM\r,æ\"bØcè1º!Ô©\"&ò?Gâcï22B\$~ÍÜP-âó)a,]Ï4òbßéVaÜÈb¾\0Ê5¥å¢8eâÝ	ËÞ,ðhî´c @\nChïÚhìÃÿ®âýÃ¢fÏsÉïïP^0¾o-\rÆm\níI0ÄåoO	\rLc0à\"ÐûÌÊËÃöñpîf/MqÏ*Ëð	»PþD±Ë@FÄÊÎ0íÜA±çð'ßN±I-\0fi*Íà£¼>l:b¦ÎÚÝõ©\\0& >ÈðKçj>Äì:'ÞØb|!\r\$T®ä\rJßD¸d>\rVbÚg~Te @X¢C*â3ÆTWÈþ,Äh\n ¨ÀZJÔOBí«\0q©²QåÌ(NjÐ-pÓ\$ÈÈ£ª	¾¨äUpÔµñ¾ÕÈú2\"ît¨çö(è£GHð(«V_\\ 
ä¶*ÖQvÑ_Xãð,gæââNJÃdtGRîW&NÚB'c&î<öPu'OÀÞ6&n9&Dh6§X_p§µ®æ§\rÍêO¨~£än iârë¬ÎÅh±jÎ \nÉ.«P	¤M(r;²ØfP1­;¢4-ÒÙ%È 2j9¼½+²&R;RÅ2æ0 ÞÃ ã9âßÐç%eÒ0ð ä>Ã~qÇÎ";break;case"nl":$g="W2N¨Ñ¦³)È~\nfaÌO7Mæs)°Òj5FSÐÂn2X!ÀØo0¦áp(a<M§Sl¨Þe2³tI&Ìç#y¼é+Nb)Ì
5!Qäòq¦;å9¬Ô`1ÆQ°Üp9 &pQ¼äi3MÐ`(¢É¤fËÐY;ÃM`¢¤þÃ@ß°¹ªÈ\n,à¦	ÚXn7s±¦å©4'S,:*R£	å5't)<_u¼¢ÌÄãÈåFÄ¡íöìÃ'5Æ¸Ã>2ããÂvõt+CNñþ6D©Ï¾ßÌG#©§U7ô~	Êr({S	ÎX2'ê@m`à» cú9ë°È½OcÜ.Náãc¶(ð¢jðæ*°­%\n2Jç c2DÌb²O[ÚJPÊËÐÒahl8:#HÉ\$Ì#\"ýä:À¼:ô01p@,	,' NK¿ãj» P©6«J.Ò|Ò*³c8ÃÑ\0Ò±F\"b>ÉoØÄþ¤Ìø2 P¦¸¬%n°ÃBãÆ4l3OÔ\0\$ÉxÎí°èðÔ9ãr91\r  jôºPA¢°4RCIÔÕÃ¥L¿ÁÆØ³H¯pdè¸ÑÁèEJÐt
ã½´&5röü.Ã8^
öEâ
áª#R²ô3.Ãj;Áà^0Ð Ï\rÊü¹i\\\\æ1«*:=ê:@P¬¯õÂOs<Íª;\rØ£'+Ã®\"4¥t¨®ÔÈ°JCÊVäéU#pÌÂÆH³(0ÌCrLêUc«UY§ïSLÃ(Ì0£b;#`ë2q#£v©1²K\"-'îZêâi´4²\"ÌÈÉC2ÈÎTd5¤¡\n3¥u^¯#ê#hÛ%ÆÞb65£%J.»K\"7·õ-0ÁPÆ5CRt#®ñCÒðÈ|­ä^ZôþX;òyBËI¨ØÛX\"\"ebÃf1Ð²-w ÿLÂ)Ó P×©iXk2º`Þ3lõzj*äõAô	8ò_£¨Ç]Y#6¹#kÐæèáØÂ3Ê*ôª%6ö|2
RÜTÈèÈ¼¦1>9`¸rXa!À9²<¬a]¬yé½R6vÒ¹\$7Ã8|J ð3X·iÑià4`@³H2ÐZKQk-
´Öâ­Uë9.%È°t^¤Dæ©²øzlDÿ,¼TJÄmøg\$cÅDÀÇ¬eÉº|8ëT:íRª;Ág´hfSáªÙ[kvåÂ¸ÃrãCéj!® æK¯.Lä:D|ÓÄ%,ýÞCW{gDÕCÄâHè	ùD*J!äBHù\n\\5vxÛÑ#4D6&\"RC3V¯}]¾'t§zÃ\rªR5K.&Lè4´Ôb_ÎudRþÈà \n (Ftí%É¦=Éüê\0PU_¸\nfá¸½µuzÏÍi4¦\$TÍ´i¤¼ÄÁÒ13ÜÛä//å,¯Òk(Û\$PWÁÍ+¨¹/	azøÑ ¸ÊJC¹²Rn¼)BB§ørrNÉê¥I'\rý\"Fpt4ØJUI¨I\"äÍ(Z¬Êq&r,Ù4\\Z{qÅ0ÂxwB\n(c%ëØ4G	¨P	áL*×|uÍP)e6@S\\z¥§d¾zoUÓa8´\$àTáXnG¡/0ÊM^]Bæ°|ãphõ5S®¤Õ+eE×«v@*a§AÈâP])x(¤1A\0¨Vab\"á8P T¶@-ªLÄÕ¡BÔì\nÛ LÛ¢e71	#
d2Í'ê'ÚØ].laÇò6C=ßÔùªéþ8÷I%Î#8ÐuÑÝÆúG][·»×Ý¼\ncàTHÐ+I`Üá&I¬(ÔBQ\"q3JjMiUY'Tïé\\ÄG 4Z1'1ÚcÉ
PÁ¤
N\$ÃBÛª`­U@kÅu»ùU/ñÓ9j:kË»MÃ´ÒPîÃ0jl±\"§	>(ªÉ\"s!?/¡ ³#eé@g³aõwxÁº¿Æ3,Ã©r¸\n\n@2 G\nzÐÇ°Ü ¼b¾(í\$p¿¡tj)«Á{(T\n!APj\"W	YZ Pàí£SSX´D òD	H/`ÊöXJL©\n-?KF@X	ùÅ:,´ÊÁ\r{©P	Ôd5íÐéª«Ô~Q+Ãpv%úFf¸@ÈáaÂÖÄ¨fÓ.Ët«Û@²Ð9u­µÁÅÚCêE,ßÖÔÚÜìêUöqÌOJ¹ðîEÊ+E5ðL6×¼¦-¯»äÙíH¤ô©&·Ô¢ë(C@Q\0\\â\"¢JJ®÷áût¨cU£é1²SâÅ×ó0%Èù´ÉRá%HÿÀ#KØýÒ@åöÒæª,UÎ\"q5KîåÁÓÎ`ù·8èÎåsÓûÏú;ç[XO÷son¯âÅlçÆ`ï×w°D)ÁûrìYôºÎ1H
q·gíñ>Þ©©½²é­³§ÓzJ­³fDô72V\n@PN9êò¹ÃuyÏX\$êðÛy,êyÀ5óÿ%æ°W|\$²QÏ¯¤xïÎs÷;êÈãsPr\næÍRdooWA:î=²5Ö\rZ¸çùÝ·î}ß½ßÙ·à?p²÷ÅçùBÌå Ag:O¿RÍ}|©Þùõ³wìy¿¤V28-IêÄ¿ÎdÁ8M0¢pèB`fC¡\"\$i@\r@Ü:%`#B2bôÈ.T§­È2ýÂ³oÞ#êþ\"ËÂ:5ä?ã÷\"NüL¢Êm.É\":0B:ºg,fðKj;´2&ÆÏÀï¬qNõ0fb/Ìê°n½¦¼ÎìÌXI?¤&°|gPÎ¦ü.:ÏïBõ°	ÉÃ¥ÊÍ\0;Lv.,q
6å\\mn¾`efôÄ25@Þ\r#¾ÎOtÎ­NrùÜôó	Pä÷­/jfªnç%\nØù0òÉ¥Éðú¸x÷çèÌ'TI£ªðPÀÊÑ¬Ù«¨õ, ÐôõÑ*iñ./d/:Pñ:%JTQJÌ ¨f¯³Ns/ýéÿQV<ÑeºVàèÑ~ËïC	@©oXüì¸/½ñ\nËÏÐ°kÀ¨'DË\nÌø=Ñ0lB,ûëQ½QÀTñ/ã8bU@¤X®´1¢&i\$Ç!f¼e£G\r¢¦5.Ö1ðÎq\"Jq<¯ÒWNe§Þ5Fv/ ¦âæÒÓ@Pbôm¹\"`Ú*p@a\0Ø`Ö#ÂBq:8N¾îç'¢d!M92à4ÂX'fâGÞ\n ¨ÀZ
göTÂjÕ49\"R#~±§b -´ÛB(²ú\r|ò%q6#4(\">\$0HwB _ëÒÅ\0\rçöÍ.uBî\0æC\"BCÐ\$ E-CDÙ%@Ë%N8£aB>öc.	ê¬ªë|Þ°Ö·)öx£xÏ&ê¸Ä(\$g`èÇB:0°*ä(0s1)â8\\EFh¦÷2ãsP§+Ñ6ê\$)Ð341¹5äÞ*c8F8R'Lg3³P83Bb,kâ}Â»e4ãÉöL§FnKn®ò TÆë9à¬2§R×¾ Æae\n¸btÆCüá\0:ÀØPRÃÆt)6a ¿ÂV/«~T\r4b@NºWQG~L³ï1b,f à+ÐR\rëÂ.ìC\"f|Îä7Îö¢TJ 	\0t	 @¦\n`";break;case"no":$g="E9QÌÒk5NCðP\\33AAD³©¸ÜeAá\"aætÎÒl¦\\Úu6xéÒA%ÇØkÈÊl9Æ!B)Ì
)#IÌ¦áZiÂ¨q£,¤@\nFC1 Ôl7AGCy´o9LæqØ\n\$ô¹Å?6B¥%#)Õ\nÌ³hÌZárº&KÐ(6nWúmj4`éqe>¹ä¶\rKM7'Ð*\\^ëw6^MÒaÏ>mvò>ät á4Â	õúç¸ÝjÍûÞ	ÓLÔw;iñËy`N-1¬B9{ÅSq¬Üo;Ó!G+D¤a:]£Ñ!¼Ë¢óógY£8#Ãî´H¬ÖR>OÖÔì6LbÍ¨¥)2,û¥\"èÐ8îü
ÈàÀ	ÉÚÀ=ë @å¦CHÈï­LÜ	Ìè;!Nð2¬¬ÒÇ*²óÆh\n%#\n,&£Â@7 Ã|°Ú*	¬)*ÌÁR¬ð<HRÚ;\rÀP¡\0Àsàù(-ËÞ­h 
2(¸Üç\rZØ# Ú¶(o«î?(+ø8?ÐÆ1¾è2å SÄù¸Ò:\rxêç!\09ÀP X(ÐÁèD4&Ãæáxï]
Ì]ArÐ3
êX_SÕ#ÈJ(|6­ÂØ3-g-xÂ@Éûz2N`P¬¨ ±Ä:®°Ôµc°Ò2àUÖÕ#`·ÃËÅB¸Â9\rË`Î9¡£\$<¤\0HKXCîô>\nPË\r±|ÿ°\rF7­Z}pÊ3#¨ØçËpëÀã`ÎÈªZ5KL\0¦0ã*^P:`+»Ã@ì´3£k2 d¢üÀWèKSy\$âr>Ùì`\$2C\$¡f­^¼£ÆÉ0\"k,úúM0àHëwy]¥4ùï¢\n5C+\"	é,ýp0Ã9^ÏçÆðâÓw/+[\0\$´~À©o=ñ.Ü}³¶ UÁÈÎ¢ Àò}ÇHÄF2
©Ø	ØòÜ5\"åÃ6ÆªÎÃ;{QâxÞO·Ò*ýÒt¨Í#±UÄwÓl0­*WõÊaJR*ãÈØ¿Râ¦)ÝÈß©h@Á5.áL#!Â0C¢yL\$bHA%!P45sDµuRÆõB«òªÃZ Æ0ªÐ@«Ù:²VÑ[+
t¯òX+\rbà^}Kj×ÀCàÀÊÛ%#L³¨Ãa;9ý;PÜXNïø80ÜÂ¡)%eD9Õ\nl1*,ªÅ\\¬!RµVêå]uz¡¡ÂKc%T®aÚÎsÀ¼²BAòEåÆä\r)§ìÕÃþK-Ö\"FÒ	Ù6#´ádtjÜá*X&fT:S¤ÑV Â/`Á3%åõUC×\rdµÅ<¨	¨lð3\$InCF¹ÅF»²u.35¡9\nN
Ä¡@\$\0[3Ñ±?(&¸PSQ«2¥Î(<¸c&j]°Òæ)søÑ.E[w/¯­ö¾ø`T½`kMjæq ¡R#&R4\0¥ ZA¸8*5LPÊS¡ 40ÐôÁÎ.ób²a.&E¶`ÌOÚ)½3Jû\0¢iK-¢!RHyxEù(ÙÆÁä'ÁÅ °Ì{	T°¦5Pf\nä@Ì¤B>i\\Ä.R4¿÷| eÖ4×JZ«/¢Í{8¤¥C-Á-`Îºht\"/Äú#Ox\$c k2DprDI¥g !M·ÒM.×r¥ÁP(#4ðçZ|.^¤ÌRÊC#A¹¢@g\\ùihA<'\0ª A\nÄ[ÐB`E¸lA'êtüÄKÉ­6Â^nfwYåN}É4\ra;Åyº7Î@z\nqË¬yÅ:!*@C	0Ìì	&ÌVûN®ÅßêaAU\$éeÿ2oË:>+¡%*{CÁÒL´ nMéÁ4R	Þ'\nYpÉEAÙz®TðTkGÔ°&(]«Ú_\r!éÎ÷:ù®Ë2d¡ö^gØûÌv4Á/L2î^w¯©Iq1µÐ7Óë¡\$íx&bÞ¼ÎDù7®èÛ\"ûmÄ-áP´¼¢¤nsUÞDe©§°äd)m`¾¶V|¥\rd¡IQÃ%äíRóqæé\"s­p Aa UB»è¡«©Ê=§ VhI97ÇÞ*Â[ØX å_X ÈÂ6¶0.F¤aÎ	á-UëS©2îD&,xÙµþÁbëPå.ÊÙÄÆâÆ[	ö 'hÇ¬lÐ\0l µÀ Ý2ïrý§»Èjä4¨s{»)*Ò?¸àÓÌã#:I¬Æ(Úã\0Ã(b®ÏjT÷Ñ<B²8_I.¨-îÍ1ÎRIÚú]-½²bäà®EüÐ.¶¹ê 7ñXþc:å­³Ã0æ	åe::\$y]{BR×§[êÝxÙwcúáxº)hbÑÉ\nÿ¿#Hbo7åB4ûÑ3}ôëxù»ZYK¼ëe¦´:û}~8¢Ws'\rpÆ®}ôSs¯ô~Õý±þùËîIM1þÊìÙ:Wg~³ÒyÂ]ê>ªIµ^sð»+è¿àï|eNÏ-ú2yûê6ªû\$4ì¸\$~¢é?_ìë¢¶~îÛf¸2gåî:Íþ¶.Ù´BÕþ}âÓ7ÿb~÷Ìùo¢Ìgp´Ç ÌË¹¢N¢\ng^ÀÏ,¥VÐ4é<Gb)ØÌ\r4ðwfã@ÜUdh­\$0i#dâ¤'ÃDÍ)¢ÿfzý¯ü-ìÊ­^çÍ+ºÍFó,¨^5ªùÎøÊ°\0.´6lQÈÊEâ­ þÑé\$÷Àú¼Oð\0ùP§âÒÏ\rDD_æ\r
Fd LÅÄå	t\rØ'Ä.¦Z:ÏÂOÎ±±\$/mB\nOå\rJfÏKQ;`Þ( Èwæ.ÀNzãË\$ÛC	-\0/
Ð7æ,0\"v¯{	°@×ÊtÐÎ0Qb)q[	ÄÍ9qq\rqh?Q|K(bÑæ*EiÑe1@9Ð&bê8ð¹ª*N.Ñ#ApÙ¬¼Ïlì:Ñ¢3ìø0\0¨FÆ¾ì\0DÄÓÐÎMIÑê÷1^l\0æ3-&.êÚÉðsC¬ÎAçtSf°Ö1DR©ª¿æûòÁ%*(d%\"PÎ	f\$`¢d\rãâeeÒ4d­ûaJÛR(ÚÈIòT`D`Ø`ÖA\"ä îÚXÎ.c#V­ ª\nr#Ê\rì%2N\rútnÞ/Í*KP·)&×8áè.gP6PÑ¢~±%Cçñc!@Zó1'O'ÎCîNñk`:dEêê\\#j+nK¦.	ÿmÂcÆîº5Ï^¿%>Tìn'>ìS#õJ¼pÎí#b¾ÏM2n àñ,¯c\\øqìsR¿4\$Bf2,é³Ç0\r\nj­-T^Ìr%R@íëé.ÌâeÞÀÑJÚä¾q\$êfg6\"Ü*:-«ÆÌ ¦p¢,\0:²G2JÓ9MR2Q­/FbóÈ!4£\0§âÒ¼1mRFÊ,#¤ô8bÖDjFâ.\r ";break;case"pl":$g="C=D£)Ìèeb¦Ä)ÜÒe7ÁBQpÌÌ 9æsÝ
\r&³¨Äyb âùÚob¯\$Gs(¸M0ÎgiØn0!ÆSa®`b!ä29)ÒV%9¦Å	®Y 4Á¥°I°0cA¨Øn8X1b2£i¦<\n!GjÇC\rÀÙ6\"'C©¨D78kÌä@r2ÑFFÌï6ÆÕ§éÞZÅB³.Æj4 æ­Uöi'\nÍÊév7v;=¨SF7&ã®A¥<éØÞÐçrÔèñZÊpÜók'¼z\n*Îº\0Q+5Æ&(yÈõà7ÍÆü÷är7¦ÄC\rðÄ0c+D7 ©`Þ:#ØàüÁ\09ïÈÈ©¿{<eàò¤ m(Ü2éZäüNxÊ÷! t*\nªÃ-ò´«P¨È Ï¢Ü*#°j3< P:±;=Cì;ú µ#õ\0/J9I¢¤B8Ê7É# ä»0êÊú6@J@ü¸ê\0Å4EÖ9N.8ðÃÒ7Ï)°¬¸@P¤ÄÊmcþBNOc ¾ûÒ\$@	HÞ¼2D9#Cv6\rã;=9nhÂº¹kãY\0cUJ ¬?:4p+ç<C9AÆ1 ³ÐÜ3\nÿ@:\rxë^¡p|\"É
\0x ÌC@è:t
ã½Ì5­
ÏÈÎ¢|9Â^*ò^È7ÃpÌü§£¤ö7xÂ*cxÖ0¦4Ü³1£[µ«ó`-.±Jhf\$îT¸ÂÐbª%J'> ÉÐÃ,JÃ:23:9¦l58YÎjÿç¨î	cxÙ\$(´{¢Lø÷B\r#pÆÈI.]^(ðãF6¥Ú\"ÁxZbÃ«âÓ­Â\n9WÈ%=b,X3Ò£\rÒ)Á(Íq\n1Òóúê:0éHë¡0â0R\0á¾|õ'£:%0üB
Åù»¨úÿ5îkï@B¢&P8îÊê÷äXÕ±MÈÇOw¹ çá¥ÏëÀ:våÜy\rè¿¹²S¯80ÈhíQã¤
Ih@P6×|`}>_çõeKCØÔçÃ^Ñäñàô
:`(6&#ÊAH9	Ma3\$>M¸yT\nÃ#DIY-¯NºC*>x0­V: ùÆAn 2ÎÏ9`¸Á`É\n¸eoØ4Aág!©.ÐÎBY\nÔ SPÁ+,ðó\r!´8PqáÃè¨aª¢Â¤ùPKf°Ä:`CÞÙX;\"È aL)`\\E¦²62RPâÿA´:Æ^\\¢CÝJ,:VÛ	'ä<ý·£I#`
Ï\rD\$¬'¦<7£ºÃLàoBÂek-
´·òà\\KsuÓ(OÒî^A°2Àâ÷Æ¾¡2ÁX96QJ´ Æ×=£JpMQ/\"IlañÌ¬Ñ´'DJætá1Ýk²VÚÝ[ë
q®UÏ-×\\¹K¼8KÀÊÈz+à9ãd_Bhk&5L|P£øs\rÃBÂbP¹PZ¥õg¹5Q%
jç(t&°Å4}\$ ¦ ¡\0 6\níb9i\r° \"¤If¡3tèxúÁÒª­PVaª§ÍS &®iZqv\rÌÌ©H_ú(u@(bµÒËgDÈ¡Sp 	y1&eÙÃ8:ÉMJOy*IX\\ýô\0Sib4gXLN1D\rð´Ñ´ÐÃþ;2¨³H%-%¦S4dùIã8e!¦5¢hÃAéý¯Â²±HÂXö­ \$¬ZÐjÒBE4ª]C:Þ¨·0Â[)8PE¬ü%(¿EÉ;pN\$¤¦¹/à-é.sÓ6	D ^û!P¤Ð(ÕÄræi*säMaNMgÈ7¡Gÿ4ò\"\$öJX¸îÆ\nÝð\ráW	æÄUhðSMa2N³\r×\0ÌU¯Á«\"Ò5±EF*¦¥ÙÊ,L/­ðär@ªVC³Ïø¸\0+¾Lf©N>²CÃi6	mÁÒåZÌæ;À¹\0ÖùB»¤ (82Bæ]TáÍHõtæâØÚ±0cL9LÜZÑAºÏÏ²úºÄhqíuÍðàÛ91tÊuv°yã4!Þq»
K¦.¦¦PYÀx%±Ì¤ø¸°2V¡ÈS^Å9T_	MÏ\n¦ÁØìBxñ÷;¶ÂSÉþ:@Þ°åw¸¬·2øaÈWcª®\$ê¦¤Ï¢ÅOÈÕ8@ÉÈoEe@øÖ&Êg\nË=ªó9FÆ¹4crQÖíM÷9Þ)wiáÓI4ÛiÇl1úëiQeÏ±Æ<pè\n\nxÈò7âEj¡§hR·,'Fèb¹mT¸C(ÅCtñn\\.Xn¿­	!¬è·£«ãÞ2KD\n¤\\d.×må]­iC¨r F¦©¶¶åLUjLñ&óý&Ian¸¾: @B T!\$ÆKC»=¤z+\0©«ºuä|:6jÊó:ehIó\"ÏòfOi?H#iÀðzH¶\"ZµM»Þ»þKË8¡ç»¯ >¸IÃ\$Ã/¨ÅZ¹3_6`½z>ö++Ù§ÏGí¤§Íä<ú¿}ëu!á/PS	ô¾ãë{Bý°ÏíÂßCñ½
ß\nÝÉíÿ7×Â?«Åk	\"ýqA¥{üÐÈZ¢#B8Ìp*«@µ\$¯á\nNB0QiDäD^MLDP<\0ä§L\nã\0BH7dÄ \"zæÍÜK(näFcTB\$ÐV0@	\0?\$È\$¤l\$¸0#8Ï \"\rc¾êæXÖÊJD0<B>U(PO¡	Mq	¦b@ê'Î4´âm	\$MN7	dtå0¨êBÎðÃÉÖßbü(0Ã\n°à÷o°ßèþC?.6(ÌÏ§Vß`tÈþ4i<kl>lô@oÊ-Î¼8*\$\n^8CNñ
x9&äÐlüAÑ64ã`\nñ*(ìô|ÀÜæBw¦ùoTæûOh¦\rªVjÑg4\$\rf~­Ó	ÌL/þÐ¬Ö(y\\ù°ý,B°ã\rôZpû\r S1±«/SÚ\ng¨A¿	Õð£&z±ÏðøÀ	±Yæ\n «p:\r®D»®ÀbÏ\r1ôY¢êøÏtùxõXüqüò\0Öñ¬ì09 Pèý2óëò!2%r+ ñ^ûï,eËNËÌ#ñÑÐ¡%P8è`Ä¯Ñë1ï&D¥%êYñ±JØæÃ*çü:.¾Tüo()BÊ*\$ç\$DV«tc-eªAb%ªPZCbG\nF@e)JÏñn
£òS*,-¢²¼Kbx\$[DN\"g·&rY\rÂXÒnxdaéM')QpÓîHcìý 1í®E1nMÑÒU0Úä`äc®JÌs)cÝ2\0ªycs2ãæ@9Ðë	W2¬<× òí+6R\\DR/6e5qÏ5³=°ç­763T%­yÂä³s8æJJ(rf% Æ=C8ÇáacÄíG>äP©ÅdÊïëÅ#³)&ØB8ì2=	pç!!<ÿ=°å?.^Ê\ri0f43Êì%K4'Þ.S÷?´	4tæBìdÜò®Q#\"&¬ÛÎ×sÓB@×BO>#7³ QT7/-1Òq2ò@4GB´4S4W?¤yQß5Ã§D{'´@7.+8b~.'tk=nèÃºém%ÓG'ÎGRJòééÔ8àóH£Þ ©5.ÕÇÂ|bG'´ÊîRo\"ôÔCNâHb­ã¤S*)Àeu\"Ý>R:{C;+ÈáFH3u!Ô£#jó22­)ýU§Ä\r5\"QoægU*|RR0ã6*§Sc1ûRLû¬í§!/!hk\"òL÷èV3áQNBU>dÄ\rV\rbª#èù§4£bN mÆ9;¢ËCÊìt)ÚOBLCb-ø!Ë_,`ª\n p&Ò22rn,ªA¸óO¡%°À5Ì}ÑOi\\o£5]\\æ¸u%:Â@e,#L³ÀÄ#¦½¢ä~&/8¤éåYG\n¥5ª\$£EXòprD.;¦¸sH!¥T¨#XX±b5d;í¬?\"\0è#ãÔ×ç`ó£¾åü2\\ @ÞBc\nOggUÚÍK QahDáî\"(Ãh6ß\n­u\rbÖZp·^RüNR¨ó51t#n¨øYCfµ.§âWÅ<\n`×µ PIJÎhØ
6æ_dpÍ®2\rG-Äþ¼âÿÍõà-k°´n\"\$W(Q(ÒauèÒÝ¶|TëK:JÄ>PÅ3t>f6\ràìQdÆ ô5CäRì{\0Úº¤¦OBÜ% ";break;case"pt":$g="T2DÊr:OFø(J.0Q9£7jÀÞs9°Õ§c)°@e7&2f4ÍSIÈÞ.&Ó	¸Ñ6°Ô'I¶2dÌfsXÌl@%9§jTÒl 7Eã&Z!Î8Ìh5\rÇQØÂz4ÁFó¤Îi7MZÔ»	&))ç8&ÌX\n\$py­ò1~4× \"ï^Î&ó¨ÐaV#'¬¨Ù2ÄHÉÔàd0ÂvfÎÏ¯Î²ÍÁÈÂâK\$ðSy¸éxáË`\\[\rOZãôx¼»ÆNë-Ò&À¢¢ðgM[Æ<7ÏES<ªn5çstäIÀÜ°l0Ê)\rT:\"m²<#¬0æ;®\"p(.\0ÌÔC#«&©äÃ/ÈK\$a°R ©ªª`@5(LÃ4cÈ)ÈÒ6Qº`7\r*Cd8\$­«õ¡jCCjPå§ãr!/\nê¹\nN Êã¯Êñ%r2ßÀê\\¥BÙC3R¹k\$	Ë1-¢[\r@íÄò éTÌT\$A#2JéD'Ò½@PÒçJÎ0®2t¨ jðÁ|ýAºAÆ\$:°C;#¢~:Ö°A\nC X ÐÎÁèD4 à9Ax^;ÛtmU\rÈ8\\ºázP2á (Ìè@¼Ë¢xç¹¡à^0ÉÀ¦£ìåS3â>ñ9MÅb²°Ä±lk+ÑÎ Æ&8J¼9ap7ÈÌºÏ¶P®HpÎ£ @1(HåùbcxØ:¯1Ò=LNt´¸²pÆÎÉÎr2 Øçk2Ãc¨Ù-ÙÜ¿µøÇÙã­fõ@Ó±Å(  xk8¸cfáV\r{½öLÚãFú;b9ÒüóU!)Êv§õkg9®BÆ[ØW­z&Ç\rÚx7)\0¦(SïC;´Çâø[ACôÄm(u8ÌØ9îoºã]¬r\"öªPeBõûSZ4Úï(	#lÁ8Â(ñç±ýºV×¬(_u¾%\"OO{ßLîI(jî3FÒ¥8Þ3Ï]Â Àå2i°*\rêzQªÜØ0ÌÕu.æIe(\0C8a/Ìþ³EÀ±((`¥úðÖJ\0C\naH#A@ìPYHÀM£K×³V%
ÄÕæWÔCú2ä%ûÓps²WÌN~\rõ%¨y]*
ÀAÖ[Q2IV,ÓL´ÔZËam-Àî·J«@+sà^RÊøÀFry×Òü_Ð¾ÀàMQ°aYh=\r!ÄØ§5¡4ÃCÅÐ©~æu,ÅÕZëem­Õ¿r\\«9êsWjïy¡À×Ãxâx IËÅ7ý×HØèN	²\$
´¨BH@R£9å¸ÃÄd­£P XM ygs.!CD(É4\nka´}RqØÉE¸hF2u¹\0JB!xvKÄ@PA¯PÜ PTI'+ÈÄÅ2<	 lF5p3Ê¥qxæ¼3B:­\r½V\rÉ³¨N|äbN<N(aHa~ÍyÕHºH4ÐP8,IºæQ¼&R¨»-ILÌr¤à(3Q²(%¢¼cq#¤Â\$¤W1HP­Ô6ÈN!É¦b\$M\"H(,\\°éney\rb£Þ?¡º¡úàà
CA@'
0¨¯*q<N®¼t¬ç* K¡:²\\oÛ­!±8vbÌìÃ©Ç07L©\"o4U¥Ì\"	HÑ²»EÙÏ:4ò<.*O¢zË+Ï5ÔøÖÐäI84äÙ0«EcÁj.N7ÐÂp \n¡@\"¨n½Ù&[¾£'?ºlñ±ûÒÂ,bU2ufKO\r¡²¶¼^Ii¬bÌ¢fÈbéJÄ¦à{pZ¾\r!á.*`°TpðëÞªç­ûÏØæ×X«Rø=c]rO,UGÆíRVeÄ`@\n\nÄr ¥I¹JÐT£Ó¦¡}è¨\0¤ó\\ëQ(Ù#*èÜUÆg!°0ÒGa3!\njE/³C]!!%Ò
ÝãºÃ¢«reÖleÄ¨2|fs8Äë4##\\á1fîÄÇÒE¤UÅ×.´T6¥^1íÿ rÐ=Î'·AM7ECÔ¤Ùêò`ê¤µ9Ð\$¼³ÉEi¸r+ØÜ&×Ì\\7SD¥D¡ñtKR\nHã]à¨BH\rÌº §Û[pyô|ôò2^m\"²jèåòÂÍ2z\rìÍoANnêJeq¬Hò²÷ÞD3&7^K9[¬¿oÜ~õà[ßpj¶Eg!üÕÌÃa8fK}*@âI·ãmáç0ÿðhoP÷¦éjÉìò~Ê£É²j<´Áròpô¹ÆpkÎ²)(Õ¡Ê1¥,ñôN¹P,«U\$n}m¸@Ddï(¥&U	Uq]v«ÐîCo=!ã Û~ÂS,MÇDEAÏcoá ®ðBzÀeÕ¨åkcÂ)V®O:ñ3hIñ\$>¬f\"ÆaW|é¨îO3£/=
ç­fCåÁô¾2N\"WéosÄ7Ú4dýÑtAF±/CÌJ!6	¼ßLu¢î?þObÁÆ9ù7S:E4~A^¡qp¨Ê:Ò÷ù/Þ½Ð\n9ë\rà¦ô%üa=%¥Xc¢4g	Bb8úá¶õïæýïìªO¸óæÏ'|DBJôn|Lôÿð~Cõ0ÔçÌMòæn>çpà\$|î*Èná06áRßÐ>â/ð|ãdn,4+5\rRïfT*Ã¦ò/Hþp05-Uèñ.õPxÕ\naÁp ô©r9v/,BMbì+Í@Ã6;ÇIÀæ(ÃfüFð|/âjDüm\$\$é\0 ntgKÙ\n.®¡â¶²íìñå  âP`KMS°k	\rXG/X´pâÔmF¿ÍhüÄr\nÄô qioå±\"õÏögp%¦(0CÒÙ\$çñH(*û¨±S2ÔB[Él.M¢
Rh¢DkÇ\"(¦p+úåTb2ËIHàÃØê²(±jþ1O-P,ó1:¤ñðqVvKvlN¢Ô1ºÒª%-Ç®CQÀ;nÆÑï¾#Åk\$2PÌúèQàaThÂWÐvq÷°õæ_òÑ%q;JÛ!0õð² %b)\"·P#a{Á\"R@gí\\.Ía 6ÖÂ[rS\$ÅYc![\$ ÎÖO¿&rT'\"gñhiCæÚg^M4ó «(DX'yE)2`@0ÀÐÎ Þ¡äráJ²ÖéGfÜÇ¯I²Àmp6O|òIfêÀeÃôÃ/o1æhX#7HáòNFx¤h<@Øjø\r&æHDÄ^B3ãÂNñ@Â¦êE,\r¤<A¦@ª\n q\rF¢1fTäPBàké(Tæ0êªSZéî.#xNª­¬Q'%w±1òñ¬Èù¯k&R)Ó²çä\rrÌ ôBÊË`eÅâxD	®<ë(HÑÁtjâÂ®JË#ãæK²Ôcç @ýÜ1Â
N6SØCBè'p(QC~Ð6P0@j(îÜ{,Ó?D¬?ìÎ5ô\0ÞUSBÏMAks&Ô6&àLäþx¢°DØÀïn¾ïÔÃGpËðQÐÐ ÇÄ]#¬#\$òÃ:óMä\"tm¤Bºô2Ì%N/\$1ì.§Tñ³¢Ñsæu<Áp`¬ÖærJ î.§!\0ëÖJ*sM?e	-pvt@Ï?`";break;case"pt-br":$g="V7Øj¡ÐÊmÌ§(1èÂ?	EÃ30æ\n'0Ôfñ\rR 8Îg6´ìe6¦ã±¤ÂrG%ç©¤ìoiÜhXjÁ¤Û2LSI´pá6NLv>%9§\$\\Ön 7F£Z)Î\r9Ìh5\rÇQØÂz4ÁFó¤Îi7MªË&)Aç9\"*RðQ\$Üs
NXHÞÓfF[ýå\"MçQ Ã'°S¯²ÓfÊsÇ§!\r4gà¸½¬ä§»føæÎLªo7TÍÇY|«%7RA\\¾iAÌ_f³¦·¯ÀÁDIA\$äóÐQTç*fãyÜÜM8äóÇ;ÊKnØ³v¡9ëàÈà@35ðÐêÌªz7­ÂÈ2æk«\nÚº¦RÏ43Êô¢â Ò· Ê30\n¢D%\rÐæ:¨kêôCj=p3 C!0Jò\nC,|ã+æ÷/²°Ï¸ò°¦	\\ÒMpÔ×¥còË§\"c>Å\"âöÊÂ©,Ûí\$2S¶µÒ¼A#\n®ªÍzþÿ©ãz7%h0 @AMÃùÈã!#½!\0Ã@Ã;ªJ\0ëXBI*9`@VãCF3¡Ð:æáxïk
ÔL

ËàÎ¥axá	Øc ^+òÑ»ãpÌ¾'ª ã|ã=£îê·´&¤O+ªÛ¼µøë*Ôcb\rK	jHá8^Ó`Ø@7«òëJò¯Bº^7GÈCÊ¹J\"âÞ6¬\nu¯YtèËKÓ,1´y¸è5ûæ¡ªcôöC®°C¨ËE¶·Ó ÊÙSÅM½FÉjúÊ.(4ãÊ&h
bÁB}73qöxÛ¡N=*5wO¨¯B»j£bRÅMª,1§ÀVl*¢¢&L[Ä>îc( áH[ª!QñõqsÚ9ìï 2ôýL¬\"õtGÑtE~Êl4òÿ(	#m^Ê£ÇÍõiraÄ1 UuÛR7ð!]]Ì_7Û7
3mSX»ÃxÌ3\r\0Êã,Òt7¨)ðó²ã­dÛc6´ÓOòýãÎúOùNS+ðÊ\n)'!P7²VS\nAvbùJH.\nTR8»ÔóJg&Ä»3çÎyÉ)½d
#£\$o`Y®?Fâ\"ì8 Tl9,feÊ£hYµe¬Õ´VÕZáÝlªWÌÖòà\rÀ¼¤åÁ>¦øô¯Eì¾	
,ÀÍ) Â±C¤ÁµvQüªÓÂÖ\nBÆ24.±ÖLEYËAi-E¬¶ÔO[¡Éo®éç]/8V}òp7	8:FÏÁ=Ç}©Õ>¨N1»/ý[ÂÑèe6êàÄï'A ï+®ã
i9BÈÃfµY¿Wï`¼§\0ïtBcò¡%Á°ÇÂ8NÇ@(ÄD­Ñ)EX\0 xs¤RJ232AÌLJ	Ë.\rÊ1(s(³wÙªóppZ¶pÇõ/ã6pdpÀAaC1!gxáJÕÆBlÔ]¡Á_ÇË0c\r¿,ù'NóCð(C¢UÞ(E£NrOäÄo)	]S Ò&p\0Â£¤¢ÄT<´HUa%r|àFÙË24ä\"Äù¨ÃjDtá.0Ï	ÂO\naQ\\¥ OS²#*Îèd¤86øG*õWÊÚ¯2¦]ô?H¹*Ñº´ñ	'ÈJõ%e%¼9rA1\rÐ¶K\0F\nÅÈ÷
*å%j>u9tãq'DÆWxÊEÚ3'à@BD!P\"¶Û(L·P&5psÙ2bó]Ñ^0Å<ÍìÚì°ka¥©aBF³(¥±Ð¬j-ý·ÊÙ]ð^éG·Ê9è:4G`½@+`Ú ¢×xiVÕÚ3/¢ö°£¡ÂìµÖbîºz,Õ6è±/\r%÷«ÎÐV!l<u&³Â¥«yÄag|ñ+\0)L¿òªÑ>?Éa:GÊCC/4l³CHziìÚ*%ÔH0dTxpÍ½gd­ð
HDæ;0¹·Rõ¯¡Üc>X²é\rXaÓ³}Ó¥sÄÀèufÛKíw\r§­çT½ó¾§T!Ü¼ì8±iîº¤¾}NP'Ê
´\0×\ni½AxìÎz¤è¥\n¿IÕPìåQ
@¨BH\r¾ ·ÁXUj¯¢¯U\0Ãsß\nJÌ¤òÓ¹\r4ì¡îöiÙiÐHûÃVÄbêÆÝw Ì{¬.4y×âÉ½üfß[·~d2x'!:s ä\nq/ÈÁãòs¹!ÿ¡Äð}ïzàr\räÒáä×ÎÊW,z¼s©Tý\"òRURfWÕ·!m¬×EÑÊl±>òÝòïB¨Ð3H_/+åW¯\$\"`Ã(b\\ïR¸S	¾°ãI·âwYæ`4ÆÝðA!=ßúÑ²aF\\y´ëÑ#ìG\rcl7á¤|mwÁ8m¾GuAÿ+r¶aà>moÔ×WiáÎ}`è%oê	G?00ÃÖeíå0Ñb^Ð Zc}ÄØ%ÞÒñ©ëQGgæo¶£FndMxõpá&
æëZnûö´TïZø·ïã>^¾i|kA<Üh]á<¢^ìÔ32Bß´i!N9³nr½ Þ+ºIÎ°Â¦üÅ,8÷LÂÌ>4cøIÌ;\0ìE/gêï{n°P\$÷-1ï ÍÅpóPNv0Rõ8ôpZuÐ©tÓ¢x2¤Ø\0ãnÚß(4O\$4ålßï2àPvØ.há0ßo:7 ó)º÷°p6\r@°«J°TÐ/\n<kÔHË¯wÈ!ð®¸­GP`L¯x7ÿÉbMüì,,Í,RN!ÂëB6â ¦hXÄ|cëdD#¡ZýâTRÉ{ú00æGÐð?#ÜáÐßð(_KNñë\n­?0²JÏ~öçnÒ£ø¿£\$£'6ÿLA&d÷¬üÇÈsÐã\nõvÏã;\r°: ,JaÍí}bsEBóÐHþqOôfëè: çÄ±¿#*Æ¤×bqÈÌTb8Ê	*àîùåsk¿±Ð±rJ°qîóðb÷Jªf¬üæ\"ÑlZ \$¼(ÑÈÙ2,2\"©æ|/DtþçD.ÏoË,/Z÷¥&\rÑ=lÒFIU\$ËaºW\$²OÐmÒ\n¬RI%±=''RY%Ä¬ò3~ÉÐX÷ÆipÜóMa¦\$2|:²¢/RÔÆÑ ©+\n¦óïuR+¢üÔòør'2ÈÕÂÓLA-m^\n*QÆØ¯6Ùe/2QKHèG&Ñ©.òý/1± o4	\r¹Ä¬ H]-©)!£6Ü!GTÎÝ*Åð\$J£*zâGmKìdCb7#0o´2È*CCÐ3s^o)4â/êcÊ\rV® Òlâ,\ràÄ]9#4ñl:àÂ¦Ô' µÀÚCä1R\n ¨ÀZhÃ\$>á:ø/è¨332c>þSÊésH##:#Â@\$BHâR3>jj¬÷ÏlJÑ¶\r Ì\$¸1¯Â\"ò=ãê*l®|-j?C¬2kîãIB\rñ¸qN7ó·å2´åÖR#ÉM;ãÔ\nSmF(Ì6îañÜó7R1ÓnþF\$ÈÍ\nte?³Ö!¨	ºõ£j7¾1hÈÈÛ`Go]G¢T|³4D¨M45ã½HÃþ\ràà*b¢ÌD.Ð,¾9Ñx¾@Cô-Q%?¿¯Ë«0EMÐÿÿFvÆjâ8O@ì4t	ìúV êDFÛKD3`0'Ê>ï31`3d»9C7+¦cBÌm&%P@Äu.Ë á@Kü@î/¬Ì²w(MR®ã²JÏzJ33FJÇü/Â";break;case"ro":$g="S:VBlÒ 9LçS¡ÁBQpÌÍ¢	´@p:\$\"¸ÜcfÒÈLL§#©²>eLÎÓ1p(/Ìæ¢iðiLÓIÌ@-	NdùéÆe9%´	È@nhõ|ôX\nFC1 Ôl7AFsy°o9B&ã\rÙ7FÔ°É82`uøÙÎZ:LFSazE2`xHx(n9ÌÌ¹ÄgIf;ÌÌÓ=,ãfî¾oÞNÆ©° :n§N,èh¦ð2YYéNû;Ò¹ÆÎê AÌføìë×2ær'-K£ë û!{Ðù:<íÙ¸Î\nd& g-ð(¤0`PÞ Pª7\rcpÞ;°)ä¼'¢#É-@2\ríü­1Ãà¼+C*9ëÀÈË¨Þ ¨:Ã/a6¡îÂò2¡Ä´J©E\nâ,Jhèë°ãPÂ¿#Jh¼ÂéÂV9#÷JA(0ñèÞ\r,+¼´Ñ¡9P\"õ òøÚ.ÒÈàÁ/q¸) ÛÊ#£xÚ2lÒ¦¹iÂ¤/Òø1G4=CÇc,zîiëþ¬À¢2®tÌ¬BpÌð\nºê0BÃ1T\nÏÐ,è7ñºp8&j(ÝIHí(¥¯i/©ÐÚáÃãµ*ªãû#¼&ÁÂÃ»446Vz?Ä£ÈâX4<0z\r è8aÐ^÷¨\\¥)øä/8_Iñ¥pxD©Ãjð/c2ð¢Ëîàx!óÊ²³ÐÎ2¥P#¬¬UhÞÌ¥ÉCÔò õ`WY.N4å.»\"É¨¿´\rbºANûJ+Æãrö3hÉDcC éc~5BT0ÌìåªÏÙò:ê¯\"a+¥\nC?1Lè2Û0Ø­ËèëLãÓ¢# #Z4ÀC;É\\¼ª×K¾¾70îAÂ°í[ÈÕÆµ;þ¦ò3©\r¦£®ø«E¨¼\r¶oµzÃ¤(\0ã¹CÈÆnG9¼îM\r9SWÊ6²wy§zëµcE9VoÓD!­8Î~ßåè<ºâÀ¢tÞ¼Æø\$Íñ:\"o+æãoVnÊLàûHézÕcBÊîÏHÛÓA±#jéD`Ì)=	\$¸¨ÍÂ¾(ÈÐ2%¢Ã1C\ràø.EÃ\n¹F(Å¨C¼@Á@s\$ô!
0¤\0o\rjH>BC¼À<(fÃEª¢ØkÐ f1­z\r¢)Ñ	-0Îù&kí£ÓW0 ]\r±u®ÕÞ¼WõëÝb/¥øønè`¾1äôt1M±X\r¡!\$-RÄq\\>+3®¼]c&F#ÐIèMB§ío°4LJN<0î0Æ5Ô»rð^KÑ{/
¾×ìq_áá¸ÁCäU?(úNOçÃÛáª!W­a`1yÑÊ¡Ïzr»/\rÄ÷G°i;m:S®ÉBOí,0i8c¢iXj´qÎßw	þ%CwKê4ÈéLJ	jL¨X1fÔ4#xuÚ0c æáH£Ù¬pÜ[JµÀÜ¯ç\nÔ8&ä4´ÒßQN9+(¾Á°ï(Õ\n9Kª*b¼îÚ\"Aá°P¢pß¢BÁÆâXÑW¦ã°ÀÜH\nàáÜä;XL×lç)I³zF14&Å£äºIYé­K
5´hrIc+\$q/w&Qx1 â.M\r--e>NIäuô( ò=e}[0!\r¡crQ¾%`0¢xS\nÅ²×4QO\$;\n
åÊ'QH9 EªýáMfÌQ	I/ Ë}*L:Åá.!iQWµ(§	;Gô\nD¦°¥Øo)KVÅp¦ë\nÚ97d°#@ G,<6D&Æ§ârÚûj¯(©ä¯ÀQÛ§´î3üKS¼Jh&ÆÆLÍóme¦+æc|¬bÞÕXó>Îe7¢è¡ëÖTñ\n¾­-¤ÜCI0 ¯-\$ü³ú«{Û4f,½·*­01í«\"8FëZ¿áÊ¯ \$ö
µl/·\$?Ed1,e­H¬EN½\r­êdñ P¬Læ{*@ê`Ä¢Ã-	%@\$]ò¤¢1{P&*çfLÞ_Óz©ÕöµËæA¯¬2L`é&\nÕy!nðCð~°zÇ\\½³È±Ì?t6@nÃ(wNáÓ2òáB¦.Æ|Ãß+5=EïVêó¤C&»ø\ráÁâ3=e[6=OHPbfÖM+k²`«¤àVÁfÅä3à@\n>Ë\rÛ512ãÎº¼s06¬|IÙp(§q¹W½&¯Mµ¼·²sòxE'm^¼4Õ¡Þq×¦g& Aa!×;eQ!·C1S\0ØÉ£\r ÀØ·bÒ\0/´8æ~ÓÚ_%gÆ¸aËpÑrB^UZÅùxÄ®¡\0\\LùxæFGRj¹ZPçL¥YUóN@®½OhsÑ	ì%ãÝ¡ ]Ê8o@»Ë«s4¥\"p\n}\r[Cò´Ã»IgMßã²ÙÙeD©¾îM>©gï©Ít#:/=é'É\nß¨uyâUkêç_»ÐÉÆ»ã.\nL8ÓcÉ#gùî0eY/5ªÂA_9âÉÊ³Æþ§®(¯!	71Ï¶|>â{ºçZQø&ÛrhÔ?Æ+GÀ¶õQCúG¬ýÐ-RÎ>Ñ-÷
_;Þ¼¾ùü9~ã?%,}ìå·Ä¿¯2ÆÀÅîÝiÆÔAäæ*B\$Ï\ntxo0ÂÀÒÒR@êÀ§440øU+zÁæÀÕÄÕêàÈÆéoÌ¯ÐKBÖ2þ¬üºMÚærÂdþ-¼K èg,t~lz¡oÄ®kþFï\rl{
ªýý(Ç,a¬|ûcXÆpxj'·ÎxÇ'ªyG®ûprø®¨l°n+PúÃ0¯Ë\n0²%x2£¢0ººcì¦*íâJjèêÒgðÆ®p¡\0\rØì®Ü\$FI£Sã\\ÇðÛp@kØ§¬Ð½ã¯\nÏ|4p°
ØÑ\$=P°À½k÷0>J
é®¼I¨ é®#ÒQ&*ðÔ¡>M°DK
b h<<ZÃÀ,cÄº]#\\\rÁc®;((©mZ&ì( [,äÇ1¸Î«-ý\rT¨ã¶×bxåÃM
&°3¤ðÔ¦¼sQ:¿Q?f]°¸ý¯qä­LË±êüp¿çØ4@eæÔçßE\$s\"ýoÆÈj!\røXQ<.ßr\$Blûbpes\"Íz¿CÁ#\rúÉl²HPò\$íH\$#¤Á@ä;'*'æ2p£¦:¤8o(ÿpp-ß©/z÷ðw(#Âdüáòqú®qþÓ0Êòê Æe\$CÕ2J H2\$ë+ç+ækPD&ÃÈ\$Q6/&øAW\rö  ÂAw)qîÇ2á.E%.í)r§2öc2ærë.ñÞçq?g}0`Ç0¢.ÒÈ:ó22D³-2ñ¬
}Ä´6àê2«4\ry 'þãnoV!L\"rÌÚ_#q\"³g5Ä0M4´8hTPÚstM²MîÕ%\"@Ä¾¦®6¹6ST³6ÏÙz\n³àÇ:þ' B§ÑÒõÃJ\nz< Bfêb®@PÚ?eòÎK+
+°8®säN£>±Ê¨Xe~:&x#\"&Æ ýÓ°ý:îlépëà?\"µ
\rÎL5ÈXP Øk(w ×pÆÍ&
ª1<H\$r\r ê®c&©`@\n ¨ÀZ;i,î²i`ä­¼EëÎÁH\"McÞ|´4#<ªFi&0ÍÎF/ç\$&hvDðÏä|CÂ3G\nÿ4N#ë¤1b])cè#=;¢l,êá\n\"e,ºFaN\"8¥XVâhåP\$êBjMÅXîßU1Ftý#+pÚ`äõó\r\$Áo:îÌûqS,¸	Éõ7Rí3ûã*)Ãh6Ã&vMÍDñ½T-ç ôXrj¦ÌcìFþd°KU|;®sPX¤¿Xìô&#¤DGB2dÐg6L°p@heðÖ/::&­E\"êÏ±ÖFã:sÌöJ	¢Bã8mã®~Dd^EkJÀÞ½ î/'.0 Ë2MÞoÂ;%cmRÅ@	\0t	 @¦\n`";break;case"ru":$g="ÐI4Qb\r ²h-Z(KA{¢á@s4°\$hÐX4móEÑFyAgÊÚ\nQBKW2)RöA@Âapz\0]NKWRiAy-]Ê!Ð&æ	­èp¤CE#©¢êµyl²\n@N'R)û\0	Nd*;AEJK¤©îF°Ç\$ÐV&
'AAæ0¤@\nFC1 Ôl7c+ü&\"IIÐ·ü>Ä¹¤¥K,q¡Ï´Í.ÄÈu9¢ê ì¼LÒ¾¢,&²NsDMÞÞe!_ÌéZ­ÕG*r;i¬«9Xàpdû÷'Ë6ky«}÷VÍì\nêP¤¢Ø»N3\0\$¤,°:)ºfó(nB>ä\$e´\n«mzû¸ËËÃ!0<=ÁìS<¡lP
*ôEÁióä¦°;î´(P1 W¥j¡tæ¬EB¨Ü5Ãxî7(ä9\rã\"# Â1#ÊxÊ9hè£á*Ìãº9ò¨Èº\nc³\n*JÒ\\ÇiT\$°ÉSè[ ³Ú,¢D;Hdnú*ËêR-eÚ:hBÅªÂ0ÈS<Y1i«þå¸îf®ï£8ºE<ÃÉv¶;A S»J\nþsA<Éxhõâä&:Â±ÃlDÆ9&¹=HíX¢ Ò9Ëcd¾¹¬¢7[¶üÉq\\(ð:£pæ4÷sÿV×51qcE´Âó!x-É0§X2ò¨ß_!ªhõK#*ú²ÃP#fBµ/Ä8ÎrZðÄìð(Íf³BÈ6#t¥0LS\$Í4MS`@0cÇwÃ>w0K2Ü»/ãHè4\rã¬Î0pç8NA`@j@ä2ÁèD4 à9Ax^;ípÃæ2]*á}ÚêZ ä2áä\r²¬¿Ò¨Û,Þpx!òêÈ²<}¹ÓZå:TÚl@&.#	Ìxd³Á<!G5ùYZDÉ¡¬ÈlMÊ¿FvíÈ+©X¹Y;¯z4.`®0Cvb3£(ÈÕ§I¨ãyëõåøýÄ½ìÞ®Êi~KÊÐ!íÊH#\$ê)ØeÃÔÎE5Vür=;Ô£\$ºÀåYT{];Òê|ð²!4ÉÙ8å¢)	>)b¦¯q ù{¤jÊFäªüD¨¨ç¤µIRÖ3Î©©Y\">Å#\$> Ðe4§o¹¸!¥-¬ejÈËª|ÄøÃ
½¢Y=ÙÑQ	µÝt HÉ%1%-Ì´S¢%BçMÕ¹÷]ÞjAd¨á\"mó­QîÁ3¸°Üéw:Ò,Ôv}'¬Ö	lnÌq=sÜúI*ÊÎx§§xLFEiÃNÈÌ\$fLtðh»Xó!N¼cQ½@
 cñ #*Æ rHÙ`%\\HÏüX&	8²¨*\"7-öèC ,(+%ÆØ1ÈUgÝÈÌ3HHq*Xä\$döJd<\$ü¡óIô!âå0\\Wì¤QJ>4O\$Õ
DDá@ºÉüXN6æ%MNq;\n)\rïF9èM\\÷3.}½é?ËÜÓ&2kÊÉ³AæáÃ¡lfN:#9¬è(3¨Úé(ÜÏFÆ»s¸Gáú@¬4©bÆÂRÀ¶¹#åC	Îè\"rIHdx%HÀ¯(W1^
q@R÷%PÈ1¼e.ö0Iì h)-28ä«@hL¹3 äÕñ]áµ@Öã^l\r²6fÐÛSl°Í¼97æW tp­äZÐ\\;Tj
!ª}Ñl|(*x¦Ap q^8mZ/£ÜÊiáë!\"d\"7mYw ¥Ô¤¨ª(Bâ¡Ù9LMWKt.§\r²\ru¯¶ÆÙ[;imv·7äë]«½x·ö4Ü¥5=S)jAôÏ1¸6­O©-e5 ¶9Dw(HdDG\n/´(6ÚDD,i\\or¥ÉAÚ|ëõx\r	}Z%âHl\r1%ðà«ðm¯0eÙ_Ãug¬ü3\\Vxgf8¡¥@ÒÒúÜÆ@1µ»­a\rÌºSÊÉ:C¯é[T4ILA1;6ý'ä5JXmÐ»¥KÈýH(hXú!û\"Á\0(.@¤£5âÌ¢h97µäC°i[ÁµØÚe\rí?\$ìgHm[:\n½È÷Þ}ºêÁ
¹J¦ôºlzòúdjÍ73àAòF·\rÁÁ§5Þ[¾(\r¤1äf`Û,Kúä1Kª½Ì6	Ï9¹3É<
B¦ÞK\"&O¾~JIÛRZ·\$1Òê|Né*eîL±Jê#\"T¦W#«´Ù0e¿Ì!¢¡%D°ì!L X °¶Ãð´6©n-PÄË#WiræQÚ¤³ôÖ'3.&fHÂ*?\0 ÂT¶ZjTdË¢è©ò|´XÏ`ÑVè^J¬»¥r&,sowªZÖrä«ròr}	|ôÐT¼#ñ\"3aÄ)²ÒþÖrÊ}wnJàdQÉtç(,qF)r_IäH*uÙ_²qQSËÖi<gl¡°âéR;Wì>½ÐÎtÑ\"²¼4||ª%ÏmÈôlÀO¼/G½;c\"}P=IÃr!õ9©GÑÕm'¥WBF\"GÔÑîaü.!9ÌHÆ\">}´PÿIr3¼Î:Z9{ê?vñåKèò,º±d«9¤Ø¥eCR¥¶	ë£H¨à#%BÿBÊãÔÿÉ@²4%ötd\$CÏûÒFê®
~\0(«dâäKú(\\	\0 ªlË%ôîZ.IvXéßÎØ8pEÁ Ç¤§\\#+â_M@e)µ#ôÈæaâî?iv¨¾ZZÁ\0H.ß¨Æþî=ï¾ýOÄ¼ÓEòaÌdèúùê)Gè¾ewÛÐ¨çLóðXuOTti\rðzPHÊ'Ì0*t,6K\\BO	dê3É\"DøÊYg^Z/bûl*ÅLÃÁUÆ/H&-.dhÐZî°/F¡ìn¼w%7\"Øí Î*Þþ1x#%(¬	&¢2®<ÔyÂKJëIAîì)4ëA\n¡°XÉV,P1\0&2ù-Fa\"XÔ¥fö \n¨ 	¨áà8îÎ*2óFHòÂl\$á.¦BçãXíP® Ê\"Gãyrµ@z;!q!Ò_gê%©Èáçvú
·Az·Ò|Î0	áÐ0a¤Gìá±à<r3Âº+ò:âäbÂ.'£\$
êQ\"ÒâÇOÒ^!Ò<ÄnFå\$r,^¥jÓ¬Ü¨þ,h­ß&B(ò%H¯**Â:jØ=Éï+1Þæ0ªFÊÚ­C³,\"I,ro'VCÒ¸ÈÎÍ)è(2ÛÞ»¨Èm@@²\"¡%\"\\&%\\/ªï(e%þ(²*\$(\"&\"Y ìR²è/!©'ÒÊFB?ó\$ñª2 RðRÅÀ-è«g5±2§á//¢Cï1ávdßQÀônp)±þ{îäÇÚOÌÖzJÞ`Qb!'ð¢3Ðw	ChNo¤0o0òw¢RþkæFðÇ;Ã°eDP¯Ju.³\$¢N^
¬\nX/=óÚUZ©Jcè/å.ü3K?Pvü*\0¾)@g³@£{@î§¢Îi<¢6öï\\¢©G	1NU%ZT±N~ÍÂ,Ú'úÕ\0t(¨ú\"0bì	)³[F±OBâdöO¬Ða°øb-V\$/x§=Èw4\$äÄ'²UN!IC¸ÛSTâÏ\$4/mG¯pø*roúæ¬3B#<SØÆbíÒ÷	±óê­d30r9'îý´É\0ôÍNT\0ó@ÊýÎL´ã?æ1#èÏ<
FHÿ@/éQ?P3`¸+d6c<¡CSÅ&TRB\0*XðèÈ4,õEO#,±8'6\$­,àAÕ=u(´òMM©Top=r/êëUa&ÓE>SQ	¥Vò­-õuTë
U/eXXU^c.3Ï
kLâÙYrY¡|ò6òBÌ:/,õ¼RÔÔ*2a\\
\\Å ê*§ÕÛSÇÁ#å-ÕëõÕ_ý	@\"ëKÎBbØÂñNÏOñÛ\$=%Uux¸ê&&ð§9`'æè²«§®S\"LïÐþ\$ËyÑ¹*OÏ0i,¦1aD+&£
:´Õ¦;\\¤A]ï3¬NâãòÃ\rc?5Q'\$«/Ãr»D3³ïMtOÊSYÕ,OSk0ík]YU!<e`öÉko@÷6ÑPù\\u'ö­m§c?pèZY§ßn*Mvé\0¯oÕÛkõÃl2ûpú8¶ÏTï/5)lHË&s`ow	P(éBwqÇUBì>¾a|{º(A\rtÂBBÐëÌi4R4QS«pUÕ¡m4×<·uU°Ýw·V×A?·@w`'M+As\"SúQjS­Èó×8v	H;Hc|VìAÕwc±¼T	mihüètU@AWt83µ%\0·!UÝp6ßSW%O×RÆOO:u
8\0=ØÇ!\nS¯ëØ(Ì8RÔQtó{oNtX×ûc­ºÚc¥ë\0bo
2ÌÞ#­98AT£CõÞuÅçB0#ß~Ö*Nz·{w7}sÃ±E:H(µó]õùbqJ!uót^8µ¸º-6nHÛW-g/q\\!xfWÄ1¸É2BtCo5sVWþÞµiA^`íYØ98¿l²¡øwx[¹à¡\0âêµçmJPÇ{×Ü+_L:³Þ+ssT¹%²#U0a¤Uw[÷e%Òï·Û*Yô\"QÝvyns<.§º\$cDÈQHÈ +fñ2m6Ù:¹gA6Á\$9['ÁUN¶øÁ*ÉVRs{_XH·ùÅ[»/Òì«¥4ir\rVR©
¦ÂºäáEeD¸NËþÞçÐÀBÁ9®EÅ&R¬+ag]e¥^Ö ðÅLS@ª\n¦ðjÁcÐÕ22Ì2hË£MUT/zBZç\"&jD`zMf;yÐxò&r2p2E\rF\$ù6\\5Ìßi©I	XLd|«8vÚV³;QT0á|üÔLònÎ·Â÷#\\Ã\nßûN­àAÚDø-6Ó/1hÐùJËO­<ÓseúZè?³U
X *aX:¶ÃcjâéÅ}@ôãåYQ½¢h~cL.°óiÑ±Æ\r
­²T¡²ºâÜ²Kcc³³÷³ûºuIïíA»ÌÌ3£³¢Kµ»=C
YÈ­\rÖÝè./0µ«Ct9ICÁD^¦@®+öEeÏÿVè§í´z©ò¸h>ÌðÙ¬GXÚr&:Û# Áy¹ûdÛpÓ¦y\"Z(þß¶Äb)ÛïrËj¥¢d::îúåú¶AÈ6tºìë5Ô/ù®IY|\nûP¦»;áª@ÞÄ¤í]óx3
l¿8'BgÃ<Gx)255\r¼7å~¦ÊÁ";break;case"sk":$g="N0ÏFPü%ÌÂ(¦Ã]ç(a@n2\ræC	ÈÒl7ÅÌ&
¥¦Á¤ÚÃP\rÑhÑØÞl2¦±¾5ÎrxdB\$r:\rFQ\0æBÃâ18¹Ë-9´¹H0cA¨Øn8)èÉDÍ&sLêb\nb¯M&}0èa1gæ³Ì¤«k02pQZ@Å_bÔ·Õò0 _0É¾hÄÓ\rÒY§83Nb¤êp/ÆN®þba±ùaWwM\ræ¹+o;I³ÁCvÍ\0­ñ¿!À·ôF\"<Âlb¨XjØv&êg¦0ì<ñ§zn5èÎæáä9\"iH0¶ãæ¦{Tã¢×£C8@ÃîH¡\0oÚ>ód¥«z=\nÜ1¹HÊ5©£¢£*»j­+P¤2¤ï`Æ2ºÆä¶Iøæ5eKX<Èbæ6 P+Pú,ã@ÀPº¦à)ÅÌ`2ãhÊ:32³jÀ'A¦mÂ§Nh¤ð«¶Cpæ4óòR- IÛ'\ncÊ³\$¨sü@P ÏHElÀPÕ\$´À-²¬64ba?¨ª*NMM%4µ-NÅÀP2\r««üA0[Gp'#~9ÏãpÎà×øÅ)¸Ò:\rõBD.9`@\"É Ê3¡Ð:æáxïw
ËårAr&3
éÈ_lÂÐÀ^)ÁðÚ©¨Ì½c¥\0007xÂ%\"´)9Uä±*Ð«Øà<3`ê5ôÍCs\r	úùV#nÁ(¨'9	Ú4Ýr¨®äÖR5N¡  ó£h:Z;!Ã¡](Æ\n`%Í)ÎBPÒ\"êÖLV9¹(é+\\cê6AÕpë bC(ÆÃ«ð1Ö¢Ï´îöùå%òøåCXÉéúzùPd\\22@Pô¡+Cà&%Ö­©²ËY>9°×¾J»ÈØ659cÜ\n\"e°¶¹Èô¸²<Æmî³xÉ½YkØÔõRcÖJàvEb]êåTº^ì/]Û­²pµ¦²1J¢HÛíb(ñö>~·~ååìeäU¬!{~ºC³ª¨Æ7\"gJI)¼3`Ø®HOÈPª&y!=a¸<ô°V1ªa·@]òÞMt0pÂ]A0hëÍ±PPÁI)	Äe*Bt/MaÃ' !
0¤p GX­2ÁÃmmé£Fr`TÐUZÂÖCeT¤;-äf©)\nü¸¡JËVëÌÿ-äXK\".%È¹Bê]¹x/%t½Wºù\rÀ½6 Wø>¨ó°ÖTaD¬ððÂ·[+.¼!Ä=b¸a%\$®QEø¶Ú	W¥´!¾¸[D\\ë¥u®ÕÞ×¸ëØ9/
ô	Ê\09çÔ	ÃjÀù9&¥¨Fâ =a­¡3ýÚôYj/²Rt¢\"Á<BjMÉÊIA ¦,Y«hQxÿEÔÐCf6DR,xG	a<0ZKPÖOB*\0c­x½ÄdeÙ}3ð6ÐÉ\0NEÈ^9_9Á×2Å1 ÈNC²bôéQ°õGEm<`èr#
,©²iM8e5-ö³j#«\ráÝÃ¨x)D¡@ÔÅ¾Â GÌk?ÌÕ`æ
ü1?QààØÖÂ\0;Jj®C:çt4¦;êÉHB&îÝ <bë%¤¼ÁÈÍaÐÈþ³sÇBÑÐ¬v/JaZÊq)	\$,<åyj'-jTöÐ[Y\0!øç!ëáüdÐÚ
\rJw<ðÅ0PP	áL*1aB_ìÃ%<1:çóNU³Vr>µ~RQPf.aÔâÐÊ­;hd	Ú(²Ó@7Å \nnÖÙòb°F\n@àæKd1AÖÑ4Ú¥ZHC¡=R0ÖOÈ
-DLäcH\0PO	À*
\0B EÄ8\"PqK3-§ 5&¨ìqÊÆPÍbJçÅÓ¡J¡YÆéØ¤ñ;xð#ÈÍSz\"j¶IÖAxäÝD¶4c!Ýg-
ógð¨PÎ|-æ\nÎc|óÈùå÷SÔ/Èàf|òzT(aCå¬7¬wK'2Ij&\$Æì*Ep:NHý\07ÉÔ~ì©%8%Iià¢»Rhó>Wd­B¡fô*ëª8TDKsl&0Ux|HcÜ=r­ê+­)<EÁÝI÷\nÊõ0o§tñv!Ë.®,<mðÈU@EÄýn?XcÂaêáq}DkX#ÁÔ\$¨÷¬ß{õIM÷d×¡þowF6^3K#B¢VD©·)+1wâï:Þê[f²¥l Aa [\ràU©X!ÁöUZ¡Ù¤¥ÿ[vÊóG3(\$5´Ã1FL'Fèe¨!³Æî¬\$aZ®²2¡Vñu8ê&½RÀ'§;ÙÔcê±2²Ö³w\\Îi+¯Õa{#¸ê©v¨ÍÒûy7\$=ÊÄS^ëØtÈ%%æwÉÙÔ&hjðË`{QñP4Ê 4tÏ;þSÍÒ<O¡ð^Ù@ÐSZ=(ùùSçÊ@ÜIå)Sd~û1CH>	GÆ ¥ÆblN':\$(²2¤QÓªH!ÿ¨¤I­åeè#E\"11S¸QqtÂ¥4¬ÿÜ}pHFãY¦Ö\$8Änr£\$¯Ö9`ì<\$Ö(-ªg	Ö&ã²#Ö bìCOÈLØJF+C¾ÖÊcpxFrO´;#v!BMdÛp.\"Â6Î-ÐPÛB°0ð<Û-g~P`Ç'.§ê(\"~HàÞáhZ¬(¤pWä\0b À¤ G¸¥ÎLG( ØIÀÆhÊ#pº\rd	¼A¤lÍÈ®à¦J!RD­MÈf@¦ÆÆªjxA`SÇJ@gÀyPtÍð\\øð{ pV°K¢`Í1ÐFDyÑ1\rðmgúQ­
P<\nmè1Aü{Ñ/ðN=#ÃCn*Eâùêd.²°q>ó¦ì¬ÐNÇAt\$±=¤¨.Ñôq>îîÍïâÑ¡ñ¦ðpâõÏ`±°``ìÂ-æÞ¬0Cñ¬æ±ÔÂØÞñÜ±áqêÞZE1Ûîµ|±ÜàÞ\rFjIB,«¢!ljj`à­)Ò/i´b­X&dbf¨i@à[Âfh2Ò<W2\"ÆíÍÉÒ§iØ(¼IRá-Æ*å#guDK\"Ò*\"Äl+*b\$ñûíðÝE0f¡Bu°dg-ÚÕLb¢³\"F¬Ú­®i±
jg¯HÎR\r*ÆU+¨Ïr\næ#,Ç¯-­,c¨ãB(/+ð_Î2;òâ9qc+Qg.ëy.P 	.Ã8'/2gªä0òþxÃ\08f¶P\$\\jà\$Á}PÚªJEK'Qþ c¤¦&×qÒæØ2ÁÓQq=/
3añW,ñ@Üö\r&e7OÙ6ÏLø(xtó|ãòÖvóøgÊ\$¦¦d\rbzEr-5qÎqf\nd_:çQóo0q[;âs<2öë³\\ GU3Í;1@ó­<ók0¥ réÒ¶kë sÆ§QèÚ®ä8A9Gç:mô.mû+ÓY.³úUWrß(ó1Y@s~?Ô@Ô>R\$ K²ý/-ª¥*RâAÓ·,%'ENGE}rµ@tcEnKF´-TPbF\$ÁC'N)qvÚ¯r¯ÐI1DÓ@¼ÎhíXïTôf>P3BÙ¨@ïD5Ô¢ð¯_K®*oh	b@#hä~\rQ «J'+J*2\$_âB9	 'ÍL\"MØ`Öãòº&²ÁZ8Â[Æ@\"m:D~Dt( ¿É´¯ä*ÔÄ¨ÀZúEb6<ï0uXq%Ìñ\0ÛJìÝU\$%'QËÎïJâCVFó\rõ\\öp~Â**ª\\#¢>&	µJÄ\nÊn¢FIÃ_\0 ¥J)#dhC	°ÔÔdºpìõª<Õ,	êh&m¾JµÐ/Îj,å)Â4JdJêÓ¤³Uìè±0g<DÌbÝ;c1å\rÆÇP.ÍÐnÊs'VSµPzÛ\"p5c@'©ö`ÞW-nC5ÿ)¨XÒ¯Yàó*æ+'­I¥?Ó¨\nË/+ªÑ£gj¨ÈªPW#T5¤téX ê¥|vKp~q\0&p¿jc\ndTM9#|u¬1ë`ßZöÊl¶­KÏ]±8ò,¯lìµ2¶(Õ9üâ<6S«<\n¶v`¬Æ§enÎK	\0@	 t\n`¦";break;case"sl":$g="S:Dib#L&ãHü%ÌÂ(6à¦Ñ¸Âl7±WÆ¡¤@d0\rðY]0ÆXI¨Â \r&³yÌé'ÊÌ²Ñª%9¥äJ²nnÌSé^ #!Ðj6 ¨!ôn7£F9¦<lIÙ/*ÁLQZ¨v¾¤ÇcøÒcMçQ Ã3àg#N\0Øe3Nb	Pêp@sNnæbËËÊf.ù«ÖÃèéPl5MBÖz67Q ­»fn_îT9÷n3'£Q¡¾§©Ø(ªp]/
Sq®ÐwäNG(Õ.St0àFC~k#?9çü)ùÃâ9èÐÈ`æ4¡c<ý¼MÊ¨é¸Þ2\$ðRÁ÷%Jp@©*²^Á;ô1!¸Ö¹\r#øb,0J`è:£¢øBÜ0H`& ©#£xÚ2!*èËÃLÚ4Aò+R¬°< #t7ÌMS¶\r­{J¸h_!\\LðÅLTÉA(\$iz³F(Ò0¤ô*5£R<ÉÐl|h J¡.¾²Ðü?HÒ~0c5Ã8@´/äé ÐÅÓhÿ\0C\$&í`Ê3¡Ð:æáxïa
Íµ\$õÈÐÎÁá{ü9À^)ò2¸ã246¥#LÈã|ºk«(ÂÃ¢Z\nxÖ0¤I0ô3µ£ Ä´h Ë%¶O\0ÎË%õ~.K¢ì´Ã|3}R2`+ÈeB° ÄN*bãRçbØÀÓcÆâ%C`à2`P©B\\®c-É<	2ÈZÖãê6'úØ:ÏW+Ô¾Ã«Ê1ÐsÐ´2C­ã:Nº¾\rj0ä'N%44Ñ+#lùø&A	\$h\"\rãeãE¥¦àhzØ63Ò(1¡nõÞÞbµ89µvÁé6.=_*\rÚÒ*§Ú\rÏÈsÎ';nd£Ôõ¹ôó¼;\rñ+§ØD½\0éÑ`«¬ýËîbM}ÆK©§ZFlÅ1¢3ÉÒ ã%>YpÞÉ[pòÏLC­;OÚ8@-³&ûc\"Ú6Ý\$: !@æÄzíBAìåÝüb¤p ]§\\ÜB¶mhé\0rÃY­Ê(BnC+:äx
CyLÜ3ÊQ)PcL¥ÕhcH*¸WJñ_,±1nY)fà^}ñ%LLDº¨WâLÄØ¢#ÀKaVHôx@v-\nF=2KÂiñ )ug­bÑqz0½[C%v¯UúÁXaÝb©tHrYk42¦áòÔ`ø\$Ðàe×àt ù/\$°èªÐ¡[
3ÔöY¢Bh0ÞsäQ×&ádÃ;m©f¹ÕFâÈU-ýDãÕZ!1G¼§ápÚ*hÈs),2ôÍId¼!Sz}\r\n\"ÅIü¡5ÐãOài\rVl°©;\0@P\0 ¤:I[°7¼4ÈT%ÐJ0ËÊ
Øt3fûª6þÃ¼ÿ~¤åB&ëIs.s«bIãü§<È8áÁø*å ¬ w4q¦Î®å­pbâbÏl :èÈ4+<1gÜ)@¾\"AóÒ)Ø«ØQ4!Ly-®B&LY'\r(QK¨`Ý\$M! ¡Å¦à@aÑÞdÆH< øÌÁGìNäßBó=p ÂT!iì£®Æ3hÕ.1A3=©V\0Ú¤e9ÐØ\ny4
 ²@m-ÄÊ¿MH&á*N¢
E6dþ°\$¥xeÆè³pZø\n:¡¡'¢º5\rð:EÎuRÁ¸²d²àáÌ?Æ¶GÔjÝ[º4	¤
8ÒKuÉA»#Éö0 HØa<ÄT³d\nð/Z.D[èl£PP³L%]L%ByçIáÜrÌçÝ\n@rØâ&ydÃ|ÀdëåÊè\nY\0·¥ôõÈRÒ^_UÆl!ro]gDê)²\núzr	àtÄ8¬'2f¼@PZÅ¡
FeÎ#ÂOSÚC?ôË³, ,-ðäH½1ê-Ò-ÈÀJZyÈHPÀPî»%C\0/ùÝ#@UÎa¯sFÈ·3Öõ]A§&¾Ü­à&&pÝlnHK»Õ8ÆéxH¡Ða±8®É.BÙ£ã-ÉÈéÉ\0A59s.`(#-²S	ðo®ëÊÉ©lÙ<x%sôèTxT\n!AWyöyTü\nBþ]äát<\"f½ãåaCá&Î\$­Sh]¦v®ÏÌ±x¹( Ä1onH¢ Î§\$ÞPlÝ¬aÊ°	]»o*}ÁC,Oëcî}ºÙTCYswµ@]¼~ôÔønó¸÷Þý;£5ÓýÀÉÇ%Ü#
mþ¾7Ñ³ßÿnñy©ÔMãHÃ¢2L\\=t&ûÒzîAÄ8ö~Lî(ñÁÂ¸; ÜQo*rx¹á&c|ÿìÍú!èÜì
%NÂziuéý©pÎuÒ:©êûÑrtÒøÜI?=ÜÒâ@¼J(l ¾«{ÜJkåIÏJ~Z	y½¾»å8¶æSJO¢Æ\\:9àÒ1;1¯&à\"Lh{Î.j©]_jïî(ùëÔÕµ3\nGù¯`KÚoø²ÈîTð®DÊ\rÕ¹ú~OPRÅþòGTÿÃeØÿv,\0°VùyreùºàïÌåPaÛ¤±tH§É%T&LXe]Q¢0ïhcØ©]¦´=3tº3ôþÄþÐÿBìÿô\nÂô-\\ÌìÜ@â(êN*r¨:E£\$h êe`ÆcènÂF#ÀR&¸ÄþÅ	@ùï¢¿DÂ\nO(²!o¤E\0ûmXûð]íþäï¾5gåPHÉXwçPÞïºPntï¯¯¯B'Kr	btp	HpÀÔ&V\rn(àÝ®Ùíã	á	â\n+%P«\nðlà\"æån\n\r.ÐåPÅ\npÈ(pÍê¸0ÔÙî7\rË+\n\nkmEAêrNTÝÍ¬úÏëp°tÉÌCwú°÷kgko°tJrì§`H\"L6¨7dÔ&TeB<#fÑF0Êä]F6BJ	â¦.bl\$±V5°\"9j¬êå1P¹ñ6AE»¦ØÒån=DIë°ÐÙ,ýaÎq&ïÄ,î`ô7qeÀ_éÿÐ°QÌBGyÛpa1>æÐqÖÔ¤&(qÀ1Þ)oÊÍÑÑñ0nM:ûÄ5LÖòò(qìw+ ääÉ¦~%bïZùNÌ	;\rc\rç\"HEÛ\nùÑÝ!mAnô­Y\$ò]q=%(äâL|&¦Pg2Â±§%ävÒ%'ÖjÔóR%QNP.y`É\0Ö&`ÜpúúÞúR©*Ê1!0
²ºAò¾1/+â+ÒÁE\r*²È-&^þÛÒY.rm!Q1'&3a(Ý­^-'nöê·²öÑSN2Ò=0ÒÁ²øà3\$s(mXz2ÐºG\rrDó'1.P/Q2Í\$æ5¤ë%î?XÉ¢x/cb-2i)«®Bøz ìuDÓ#.Á¢ ØÚêX\"Òés3P»:NìSÂ#5\rfSå0´Â\$Â_	È·ì\nrD?Ãvb³Gs×ñ9jI2îPÓ§>ÏzÞ3õ°çÂõÓóñ\r<fÆ¤\rV¶Ó0\n»ÉÎ£~·¢^Ë@/¸¥#h\n ¨ÀZ±*ä&:ðv£>®3EÞzûEí§;À«FDâñÚôb»*sÆå\"Â0#EöäC«qºOK¶/`Ì \nBìS
mIC	þ<dNÃ|gNî±L%P-Æøü+CB£%à\rë0Zãæ=æßMÂöT&P6,r6ÃF.Í.,Í2ÓìÈÉ4K¯ìPd©½NP¢5ââx- û'tâðwGu,2ã61Ã .©ºJM'T@o§Ph_ÌÄk¡Bgñb(Àp,Ê\rÊüÀ­\0\"x«ÃÀ°AVêáBÌÚ9
°ÉÌÑMB+Û@¬SêG\0	õDn#¸m -ç
=Oh¶/@ÔCZ0\"b¯ìì½é&6D2k\0ê'S7ËÒ½r3Rì© äã( ,.®OBòÑµÎÒ8Gcò·KÂ";break;case"sr":$g="ÐJ4í ¸4P-Ak	@ÁÚ6\r¢h/`ãðP\\33`¦h¦¡ÐE¤¢¾C©\\fÑLJâ°¦þe_¤ÙDåeh¦àRÆù ·hQæ	jQÍÐñ*µ1a1CV³9Ôæ%9¨P	u6ccUãPùíº/AèBÀPÀb2£a¸às\$_ÅàTù²úI0.\"uÌZîH-á0ÕAcYXZç5åV\$Q´4«YiqÌÂc9m:¡MçQ Âv2\rÆñÀäi;MS9æ :q§!éÁ:\r<ó¡ÅËµÉ«èx­b¾x>DqM«÷|];Ù´RTR×Ò=q0ø!/kVÖ èNÚ)\nSü)·ãHÜ3¤<ÅÓÚÆ¨2EÒH2	»è×£pÖáãp@2CÞ9(B#¬ï#2\rîs7¦8Frác¼f2-dâ²EâD°ÌN·¡+1 ³¥ê§\"¬
&,ën² kBÖ«ëÂÅ4 ;XM ò`ú&	ÉpµIu2QÜÈ§sÖ²>èk%;+\ry H±SÊI6!,¥ª,RÆÕ¶Æ#Lq NSFl\$d§@ä0¼\0Pí»ÎX@´^7V®\rq]W(ðëÃÒ7Ø«Z+-ïý7ûXNH½*ÐªÒÈ_>\rR)Jt@.-:¨*ôd¹2Í	!?W§35PhLSÎùN·ëT# Û	Fy8rç!È¡\0Â1nu	áXn1G.î4»-Ü0¸²D9`@c@ä2ÁèD4 à9Ax^;æpÃ`¤f3
ã(ÜÈã%
áÐ\r±	ÑÚëXãpx!óDÆ3¬ý§L]Kjhÿ{#4TÐM\0¼³ý\\«QR¥¯YÁrÞÞÙË{38Ï'ûq ¢6Ê]}Ü¢¸Â9\rÐÎ£\"Ï¼è`Æñê,ËÉñÛç\"¼ÖºN§*É\$ûEóÍZ32ÚÆ ¥áj{W£\nùÔ=&P0£d;#`ê2ÂºÆù­ÑÅ#ÊOä2n³?ììþö±*¢¾þÝÔÕ+Ø²uøÉ(&èìý¤?o;º³·Y0ÁÕMìC>W´J<µ==ÁMóûéí	¢òÊñ?éý¼(gbJIªT[ÄøÂ\\ÌÙkH,0¢O4©u¼½¢ÂV¨\n'òrpÝÉqr«§TºÛÚå¸6d<jð¤|fÀt¼oÂ¢ ·4c£]M¦.Å ¤3Ýà¤SÊ1/`ûA²ßD\$r\rb&Úó@DD\")µædCÃC\0)Ý#rnØS'W!3Æ\0ZÄò[Vt*óÓÃpyÕbVÃ3¹°7t\$ÙtR(0pÂ rü7S®\n)-e±¦uNÐHC\naH#AÀ#b.ÍÕ¸¥êèyR!\"R×\r>5l®ÂùmÊT7È¨ç´Ðå\"ØxgöR#DÖBÆÖNÊY[-eìÅ³Vo7YÐrgø£ÅxEÓÙ¨!6¦ÕK[åÂ#\0\\f>¸q`Èz^*5,PXÊcaB	¨äëÍvÐÙ/À4²tÈÙ,çeL±3dÍ»6g¹ævÏYúÂXd4VChp9aµIþ¹Ï¨eÇ@ÓÃ[KHÈÂDTTøâYtU<eL[Îm¨mçEÐ¨3Ë!ÓD4>@ bá°6\0ÄpC0ÕÇÍGRhRFºÉI,¹Ù:´&¨¡¥Þ2ÖfùLÑ.4=¢Bb]KénC©àâ (¡f êì.)µCjÙÞ¥!¬hçÃ©Çä£\\rDAÐç´~Æë o÷\"U)\\I©µ1^ÖÄ`ÒÎ{iÊ\\vZXn´&>ã¹Úa¢§ÎË+±Ø±Ü#¢×.£s²*©dÁ·ýAÖñ Æ¹Ç©ÞÞbyR%P±¨kW/ð\n'd¢JÄ°sd­5\0 HCÌx¥Ç0RDÏªiÚ9ì8»ðæC22\r³n°ÐGV.ç\$sÕ*rJ\n\"Öð¦-,g&xm'\"Z²WTd±e8LÖî¢ëT¥b2è,¡ª¡PÙÓÌC%WW³ÿ\"SÛvðÚr©%ÝËøfìD1_`A Àf¸Àä±À-xa\rÎ84ÔÆ9\røí#K×·Ja?vVåj/¿4£%	 O	À*
\0B E\0¢,<¶ÍR_'*ÔâT,H\nÖ@\"PuÎ»×¯p@¥.,Uyzdd·ó¸Ål(Ù°EÏaq_{\nµ{)7êeÔ10\0¼¶laù­æX(çÅVÞ%´*íÑ¾4R¶4ÔMÆk¢ÉcJÚõyLØÇYåý±8isòS­!b\rn\r°¡6ÖäjñÅ­*ü»Å¼9yØ¢Â¾=É8Ì0Ìî&óÉ&*´½©uÀ9TÕë|ºÖBéÏÄ&)+\0uRh¹¥&nÚÛ_8ÒpÞµ%êÑ%ö}Èt.%7«H'¶2~Ú.e½Óì_,|0)ôð-íAÏ\0)Sp.DUBê\r¨èÛm¥ ¡s'V*4u
ÝýÇÊ×u\\	FCÑ¼B£)ê_×LBØH@ALMÄÌ(A;{¾¢!¨­JSÂz·¨bVýä/æ©<%Ö!Ýq'37%.*O9÷Péå¥4¬2ÛÑú½\rR°,Ø·Ùå¶Ù~·\\@Â@ Æ¾e8sÅÆ:ä}Ãò¬äÊû&Ö#§àAÃd
'1kC¨jp'´50À'i)	)®JS*Æ*¦DráÊ.àô* \\(¥®Çêc¬Ñì+'ªäpZ-ÃöÂ¬5P8&álHT0tmn°}ÎÀ6ðXã0]£²ãbØõ0ãáÊîáj(PT·,¹	-0q\n\$Ð¥1\rÊ÷ð\rðo	ðIpÍ\np\rbêË'Pù	ÐF[hÂñQñ 	*ÓdâF\$ªêh>¡­âÜ
¼)ÌàAÐs­ô%ú+ÂÀ-äÐ<.Dá¦v%&-±BNpdâ&Ab­Z±ll/T¬ì1ryâHâQ\råØ­¦Ém¬{Ç­ÂCÈæ\",ß#ëQ©\0âÈlÖOôM®ÞPåC,tÌî&ÀÕfö(ëfìq\0ääLÔcpé±âìJ?¯,Ô1ö.1w«´çQòï'¡Ð³±ìçò^Jïq.ËãM!2'!èd±ðº­ÎÕè½!n[ÃX­G£:Z1LßRP<ÍÈN,Ò.ÊÀVDd\n#^ß ¯Ó(N'#VÊ2(l%&äï'! úrö.Ð
±ü?LOoHQe»Bàg<áâ×L=§ì>M»(Î3\rÎ]/Ëñç²þH92ÔrÊRÞ&¯ÞâRfT2h*Ð½-n@ãj	²<âGß0:ãä3\n&²/*Ð/r1r#2²*øFñ\$æ-s91ò,112kþIâ p-ý5Rÿ3¦Ð\"Å>P«qènpÒ~Ññ	Û6Má6¯ZäR©7aMþ»s{³~¬hVð8p53ñ </~ÔÂ,ó.äÒä#3´UÇ±íJÔóÃ%=<1-Høs¿3æºåh@1H lÍè*öRÀ.´úR¨3ñ>1ÓÈ\"QbdLäC3üÔ\0Ié@gbr´+r¢'@_1¯h_Øb*ô-gÒ´âÚ¬/Ô!¦¾ä¢?®U=óÏ>3¼=ol÷DotH^q×*ñnýDØoÓnöL1é2#Y w(t
3×3.SIòJ#i>
KC´¬ÜÎ(Q°I4{0^<ô§<t¬ÞæèüÎkIsM2SÜ-L%ÏKS?1)£â»T×L¨NÛÏÜò´öü´ü=^PèFúCþLïc´Â0~ÈÊ¬ÃëµOÀüGï4KJB\$Ã8;=sO\"5G:»#´·>òõRlÁxçüÞÖ(gON-ÎFØæO»>ÃÞ5f=§AâqX¥Wn
#ñHÉÎ(oB\$è²Îåtºµµ©X4¹[ÂTÔáJÕ`÷o\"Kñ 5ÕØtb{[qï>èE6aNÒ?Oto%Zñn5Ü~_çH	ù¯^!JÖ\"O\\ÔaV#Uï<ôó8câ)Ö,@HûXTcÖ!d¡)fðSåLÎZïå^ua5JÄIf-«bSÛJÄ©gC_ScBH°E>ÃTU8>TÇ7ÃÏQVQ°\$×µ ÐÜ{më<+jäè°ôÄ\rk3r¸èy£Ûl\$´T\$×d¡QÓmÐ q®mP\$peå/(ôS#0cGö+^Lq:ó­p1p1älÑûpÃM @Øng4=ubÍBïRÂ¯INbÍ\r êÆëò¼Íh\n pWiÀÅd'\rS§JVÐÄ&ÊÂ¶ÿvkCkèJîVý¨<Ö®Øº´«¨KJïEJJTF\0	 ÞÅ`Ì/%·4C<â¡fîP¬zCò©ÞÂ²¨p,Ï)+rù¬&0nwqÑ}ò[Fð1	wI({On,e¸T²dnôôAv¿ïÞ3¡mgj×L'P×¨Üb4ÐÓT{ðRÊ0ôg\"X¸.5¸7'×ÎuófXG!X:@´8À·RîwTx4\$%2VxR\\~ÈÞè³­ÝµJõäý+Ñ8Üc>Ðå1³	TUc@\nÆ ê\r¶:eTþ¢¬ÉnªÎÊ1i5¢¶¥)ï±&'á8/}d\n%b\"t\nÛó-³ØDî4²üî`ÞÓàî8ã¯[8gá@%Bà¦ìw9men.`";break;case"sv":$g="ÃBC¨æÃRÌ§!ø(J. À¢!è 3°Ô°#I¸èeLA²Dd0§Ìi6MÂàQ!¶3Î¤ÀÙ:¥3£yÊbkB BS\nhFL¥ÑÓqÌAÍ¡Äd3\rFÃqÀät7ATSI:a6&ã<ðÂb2&')¡HÊd¶ÂÌ7#qßuÂ]D).hD1Ë¤¤àr4ª6è\\ºo0\"ò³¢?Ô¡îñzM\nggµÌfuéRh¤<#ÿmõ­äw\r7B'[m¦0ä\n*JL[îN^4kMÇhA¸È\n'ü±s5ç¡»Nu)ÔÜÉ¬H'ëoº2&³Ê60#rBñ¼©\"¤0Ê~R<ËËæ9(A§ª02^7*¬Zþ0¦nHè9<««®ñ<P9Èà
Bpê6±ÐÆmËvÖ/8©C¤b²ðã*Ò3JÁª`@¼¯h4Ô,«Jì¤¯H@Î3¶ P4¨¸¦<§C*Ô)¡r4OEL6Ó2nþ¿è£à1>S3Å# P 
±d££e7#£;Â2\r¨ë;0'å+N«£ÉBÄØ:§qâõ)ÀÍ3â«TK=¦Oø\\HÐâÁèD44Cæáxïa
É*71Ê(Î¦A{h9c»þJ`|&¿*D§£xÜã}\0¡`Ô¾\0P­4(qê5«®<Í@ì<W ÈÔ5Ò¤b< ÃÀ+NÔ&\$ò!.
£%õðìEØÓ£Ø8R--Ð¤4\"H.AHäûÝW(ÔÃ¨Ýx\r6ô` Ìn*ënÏ\"nð&óà6HB|Áf>V2BÊ3äÊ®QI\n(ð:Aë£Îa£¢2Reù ëSß«Ðæ5Ä»(h×åc}òK%ºÚß\$%êÕT\$¿0#P9·ssm¶67DÏÍsåÄ\rUÌ3I8ë#há¥¹(ñÏÅ`§Æ.ÍzãÀÐ\" äñìSsZC®È);#r3Ð%	SRfø@6£L¯4TCÈÇ¶>ôå1êìXÏÃ[)+r6ÂÉ%RÀHãy/JÚgè\$m^¸ÌÏû~ìÉ-?!=¹¤Ð@ÂRÀ´´¢f8iyä¤Ã ÚÙÊQ*ïìÇSY\0	S\\xH\0ìö\rÂ ¡T¢~  GöK±÷5\rÎ©õh­ÂºWÑ_,±42Ë)fà^ó\"[ËPEcâ6LD9³dûÃW¼ôÔ\"@¤Ð\$PìC!ûO¾\rF^-£!VjÔ+pÊ®UÚ½Wëaub¼KK-fµ¢>UbòÔZÎt88iÃYÉmT<r,É#÷{'²à Ò/Ê(#Ho¡AxÎ¾Û\r\rÂY¤Ñ°6\"}Ð3sFôá*IDcàfSeI÷A2Hü¢Ä9hJfgjáÌÒé\0d\"êa1))ÂJPa©@\$O§)ô§Ô[B¬\n\n`)w\$	L62é\r	4<JR5uL3&l4'¢é	Ù5æ,M|'±¦4M¹ºfù|\"i\r¡Ò,EÑ©zT\$3xïÏ¸tzîd
vØ±¸DÄ25tÊMÁÓaÏÉà¦«÷\"}lY¦*Í!ljºçBç¡ðBº(Úàð³3\"AJ]PÕf@ÐÁcÒ)A7 dú¡0#é¬¤¡
\0Â -UHÖLrZà 	¤uµÊ.H«Õh9Ø ÒqYÂFv¸ªâLHÞ,©¦7\0ZKèA%!*ts\\ó ±ÄºµK äFdÓ]Ô7ÞI»s¥M\0
©ÔB  \n¡@(@(R	!8#Ü{xR\nP ptî«bÈrk'yhJZ:³X#\0O9s®¥éê{Þ)¨gH³GÜh­p¿Ì-RÅxJÚ,dÂ®\$Ï~!hV;²ÜoðA¾\\-sºÆ\$éÃÃÎ\\ÝEÄt×Q\r%Ü½²¥âÄPÀêN?·û;'tä¿´¦HÐH1iÆô&rRZXÕÃaT(íD
ÖÞ l<çgàª3ir(ÓCqKh¡ÐÑ|eññs>áá¾·õ9Øå\$À(&¢â¾E÷¿*bÚxôCsï/';\"7ÞdÚ¥ºhè&qT2]®\0ªãnËlÐ ¤©!\n©9gBt<Ú@ðÝ°ÂE§3õraÏ±V?%<¼ÒêÉY«C\0¼l£i\$ÙèÁó½yYìö>áÍë°ã%Òr~Aók½¶fsÛ»HÆ-ÂÌn1\$¦a(Ì·¥%q3ôel}{º7åÛÛú³ëùÀsËÙÊPòÍ]¿6F%VÔ3B`i,ý=~5WV½¿-ÓÉ¶ÉÈä§jß	 \\W(¶Ó,iq]|9@bMSEÅzM^xáL!¥Z©MR
C*Ø&ÍôFÑÌ¹oæüÙ0\$¥¬i´êÕGÞ£
NéÓ8*xìLg[ì´#¬:Ô]Ò¢wO!´7ØU¬Ù{.¦%²=¸,µxYØrZð>!o3ÉÞóZëÔIvåäZÛ¼HÍºÃ )F7W8#U×úOaéxkÒ/OÊÊbì\$_¹u%öhp«õä·o\$o¢ÿQíy7cäÍo©ì^³ã9Uò:ÏÄ6_³ù_¤ÄÚv¦Õ6Ë·öÏ½\"qoË©ÉïÜ³¿uðó;»Ãä\"C\róö/HéYw¦ÿ?ê·ÏðíúÎ¶ÿÍìÑ\r\0Bú.¶	lô«^xìüà6Â>ëÆì4\$\\zêNÎï\$P\$ Ø¸O8ÂlGep!lÖUPJêJ>B·pþÐÏüm,þoÏnOLv¿PPbìÜùëpÿOTÿ`ÚÖ¶Ä^íTÕ/	OEhÕeÐÞP¸#Ï ÷©yÃP°¬9'PJpÒå¬\neFHF@Ôj~/WËRG¢\r\",ûOÒùÁ.ý;Î¦ÞQýPÞM\0lgêLJ Õ\r`Í&\rMa±.^Eòl\$âA)¶E¬N\0ÖÕ­WNKn{p ø ËD:ú±¬ì>qpÃð×ÑXcZ¯ùQ^é ¨EÑhëQÂxc0¥l-M8±PÑ,m¹Onëq±-!ï¯+M.jªJÐÓ\0¨G°ªQcÂÖDV\$ìD3B.é,L¤PA1Ó±þì/lÙêRê1ü¡lÄuH	ä2CÏc°¨ä	Ñn0m¼2ìJZã°âúM£\0Æ:ÒLU°QÆô-v©Ñ¿­¼èÏ\"2\0
@RèÒ[\"=?( Ê&D`Ø`Ö@&üd¦8Nô\$Ï5/ú*\"@§#P\r+\nNÔÛÏÄÀÒ¶'JòÎÝtùÞ¢¨r~%:du\$ºO1çLð`8®9\nED=1%\"TCÊÉc+O­/Ï¢î\"´	< EU3\$V9\$z0hº'Bj/\"R8©¸iÎHN×(¢'ÒAæEì*J¨ìw¬úóZ².¢n`à¡²äë!¯öìs6| @Þrß/-å7°\"^ì hp:¥ÐxF\0î¢ÕÏ>¾\$\"¾LÃ¥³:\nMÚIÁH%Ñ9Äk1B}Ä&0kÄÏbü:¦f¿ ¿åJÐ¼
ROå?³vcStÀÖs\näU v\$Lc]d@Âz<å\r@";break;case"ta":$g="àW* øiÀ¯FÁ\\Hd_«Ðô+ÁBQpÌÌ 9¢Ðt\\U«¤êô@W¡à(<É\\±@1	| @(:\ró	S.WAèhtå]R&Êùñ\\µÌéÓI`ºD®JÉ\$Ôé:º®TÏ X³`«*ªÉúrj1k,êÕ
z@%9«Ò5|Udß jä¦¸¯CÈf4ãÍ~ùLâg²ÉùÚp:E5ûe&­Ö@.î¬£Ëqu­¢»W[è¬\"¿+@ñm´î\0µ«,-ô­Ò»[Ü×&ó¨Ða;Dãxàr4&Ã)Ês<´!éâ:\r?¡Äö8\nRl¬Êü¬Î[zR.ì<ªË\nú¤8N\"ÀÑ0íêäAN¬*ÚÃ
q`½Ã	&°BÎá%0dBªBÊ³­(BÖ¶nKæ*Îªä9QÜÄBÀ4Ã:¾äÂNr\$ÂÅ¢¯)2¬ª0©\n*Ã[È;Á\0Ê9Cxä¯³ü0oÈ7½ïÞ:\$\ná5Oà9óPÈàEÈ ¯R´äZÄ©\0éBnzÞéAêÄ¥¬J<>ãpæ4ãrK)T¶±Bð|%(DëFF¸\r,t©]Tjrõ¹°¢«DÉø¦:=KW-D4:\0´È©]_¢4¤bçÂ-Ê,«W¨B¾G \rÃzÄ6ìO&ËrÌ¤Ê²pÞÝñÕI´GÄÎ=´´:2½éF6JrùZÒ{<¹­îCM,ös|8Ê7£-ÕB#öÿ=ûá5LÃv8ñSÙ<2Ô-ERTN6¶iJéáÍ\n·\nq?bbò9¾ãm«ªÅ¢¬L©Ë\rÖ\ns;Â9hyz«Z©Iâ¬ã¨+÷&aXÇJRR¥BÙ³¶Ñ¶Ûå½ÖEt¬Itº­&E¶ð[jándF§
Ä©@ l3êòOõ>Æ1½õÊñ³pÅ8<C¸Òü»ÀÂóOôä2\0yÓÊ3¡Ð:æáxïß
Ê/7LátÔ3
ùP_?tL\0|6ÍO3MCkíxÂPF×·0¤S`Tn¥©»záæ1\"pPÊRººU¥q~ë}^ßTC
}ÇÃ.òRNÖÌ|¨!i@btÀ®~0I´ÄýRáÕ@4§/ôÜWS\rAª¥J#¥pªW\ná9äÉ%É}³¡¡,`&õÀòá ­©Îu:!BB!®¡pá9È+â>·6³Ûr'Ì0PØ°a\rÔ2ó½Jº)J5Ã`êteå õîDW2B`  pÎì;ÛT­3Ã´¤¸sH\\mð§ôj¼¢g±fGeüuÓGi0	5èdIZ±e\\¥(IÈ	IËN,¢ØSß\"ÞÁ°6FHa\rÉ(Â' :[æ3ø#%rêDB\"ÚäxG°(ÒIóB¼ ®5¯Ñ\\¿Ø­Ü]2Mt¥6×ÜQVJNÜTÒÒè\\¾ÆgÄ¢%y\\¨6tC§í)gq]ïÖ`.d\r,dêû ¤øæ<Ý­aÍÇß\$6¢3Ñ(\"Y¦ÒÂI§O*MxG J0M¾4CßiÕèêx¤ó=¢T7êi7µ¼±JsúuMú1CX7ª&0	·¢ørGlîÂÃÄÃ0f\r,àø~Í<\n¼ò½ ÜAorN]Ìh¼\ngIÍÖ±w+ R@ ¯0ááSî\n)+Á)
 R\rs­u+æ4Z((@ädÂÌÓHsV¡Ê·ù!7Yèb(¶gWjtåå`Gy¬£E^Ze½.Q«i#\n¥¦\$¯C¾OØU¥Íp@âgu¡Rª0ÈãyÞvNÑÛ;tïóÀxN-5¼wzsdQÉR½\0}xÚI{¯}\0ÔánÕR­ZVIi0¢#JmU¢þØúYf¬­³ÌêXäà'\r¦¨jÐÔà}îÌyÎ­3à]uÎÂé»Wnî]Û½wáÝà¸¸ñÈyL¡Pª;ÊôC>¤%Ó2 ézÁóUÒC3åÃkzÉõ3Ölm{e}ïD64¤	RpdFÅÈ\\Ði|&Ö~`Ôlo¼ÑK@@pL÷	Ã0Â°y­6·KZã^]ù>! ñ0ÂÅA\0cÃ8Ø4Æ çj\$²R\0£2 ænÅr-¡SÉoLx A@\$Û\$WL2u3W1?0Tëé²¥xÆÊyÏIë=¡§°äûNÎZðï¯E¶÷èTåÞÔ²!JÁrßZcµ~`vUèø:pæÅzL§åëàá_CÍuPÌ; Æ1Øiîß3ù bêq8¶Gú?kNVCL\"OÈëklh5[Q\$3'f¾2#.
]&ìá0tnÒÂKíÔ\n(¾¸ÙfËòßÈÕ`\\uLm;UË÷®<ðI#áäî8ÐÓÜ eXøýdc#@4Û%ÃÜ14ãö~=Çpý6¸<Íëð¨
\0Â¢ëaµE4fmö7æpOì«¨¤66G\0rùÀlÍ>~µ6ò¡ÊA&PÉ.´<:W±Ú®oÛª=) 2çòN^ô½tS§ÁSOK¨fi¿¯Iã¦1N}¨&1Vê3§B¦îBMóláxNT(@(\nù \"P~uñ¹>u/Ê4¾\$­F¯×ÜkZ¿©EøYØ²gÒ¿)Ô¥Ï*Rm__1ë-àFh§JL4¥d0EFCª÷gÐnlïf+â`Õ¡)PípQîP¯ònBk`¤
¤IV±i²Ééû© ÉïÒ^c\\ÙJÀÙêï|*r¥É¾0XP£ôÿJà\$^Êî<fI@lÊfÚä0CÇÏ\näÇÚþðQ	dxpPýe,¿PL¯øîmPÏÆáO\0ð Þ²N½Äb\0¬
\n?ãÞhbædBnbS\"ÎÓ&? è«#càYîÙã/ tÇCòM êÞ`@Ó<Ñ¦VT¦<8ä¶¾ôW°/£\0ät9®Fb~\nGfv@æ\røcx&Ï\"+¨KÿÂ¦\r ô­b4êü¦=â×µ0ãFðqï\$t jæX	ò*¢¢\0\rÈÂ«hf\nmÞ4ÀÂ°L>ÄÎÐª·hf=@ÊéK°4,
Á\\ê
1 }jø0ã+ð\0Ñôæ°\rÑþòØÄ¨aÇæ£2 ¦ÉèJO*·rËOx¥Ô:¤ò),²¬ª¢è~b\$ì¸G+úûéÂBZÆêÑ&ð¡`ÊRP¨3ÊÑ£dr+á,kõÛ¢~Ç²>ÆR,¥T´dm'0Þ ø}fÆÑø§ÌÚj¢òüÊeÂ®Â8Ï\n`¤êªÍO à×ÃîPrSp°AãíQè^2Z%/Ò9¢6j1«c2>èfí
ª÷îí,0¾F±èÖþ­.~î	p²\".:fç\"úu¨q2ÍKIÆ¿O-n§ä²\\37ó]40ü®Û6³PK°Ð@3Y2®þûÈø\r«ò.	þ
fF¨\"8sí p\"w<I°}s¢ï+Úîæ+Ó[-³,ã3éa83DãÓHAn?3¯6ä²³)&s9>{134	¡;ð8³«A?S´Ó¸§q´B²	`t`@M îèVñGÎ+m!Øó¢(ÐDqJC\n:TN¬+vÁbE#FGJZÊ
4Ð?ìºGHòBp©\$S |ÒJnE(I^FÙJüËá´RB0HCPÌ³¦[4-¬¼_Dp\"¤©ËA%ðý#j/MBÎp0Êã3p\\QoLNjÚM3zµÆ6PNCfð =Xhmø_sÂGÇÛ=Ì8jo°Ã%ÖnPS6Ó5K*KÙ4ðÒ3÷S\0àÏUL»;8\ngTsP¤Ò²nãEAôöÀ\röuh\n^I\$sûBõg@T#è/6(8^:ÕYËyZ7µ§ST£>IåH5q[5K7¹@º¦ì4+å¾ <.´ÆþåxWÅ/FN1RÀP`Ì¨¾òÿF&ãFdbc\$Ò<#R,ôRlNÓ_M!:/îFv'#ÌW5ß'W(¡tòþã[a9ó3bÂÆQõ©N9S³Ñ]#dÓ/&8û¨ere\0@\nòÍPð©Ï¹2C¨'õA-*|¦¢©ÆcÎá%	µ\"4å*ê8µeft	.ã%pwiuÝ4­eñßf3
\\Ôf£fÔ-j0Z¾5o\\U6ýmU
,V¿?I¬±Ó¦õ¯B»kª¢Êi6³jV·56Ø±LJ©Ý-kq©qõ£pÈ#qD¨w,ã2pVíY¹Yè\"p\"¿*ÕkdncO5pw^n4ý1¦26O6	­6vþæ5JVúX3ur«%)Wv6¤Õ7V¡UÉXHws;\"wµ3ÕÌå´q\0ý<±H¶c{wTMR÷²;{=nïHVÓYµÏs×ÕfÕ>VQDÕZ×O[émwí#VÏ2=hõÀC3~5Ë6òÒeLÊ:WDXhÒk0ãd²}Ò!%Ø]Ò1RÄµvë~VïÎ¿\nç	7ÀQ\0ÌLæTsfùÒäÒ©&1P	äA¨Ñ8ù?ûXtËÎÞ&O.¿´0û´%TT´8!\$wó{vp´â±ØYXÓº±ÏºfmLúùàgà²\n\0Ò­%yÈ®¿ê¸ÿ¨xÀ¯u}r9@õ]7ë]iP1%S\$§·ØûX,Ôx0ÉÄ}xu~ÔñâAHFð]p(zWTHY/×qñV±Û7MewsÝzw9p¹>ñC\$
-u7õÇò´²º±ò¾i`< Ü+Y7k÷	[NC¶¥æÄfù
{ôo9TåÿB#éllÒ¶çtpu·+p87¹¢QjÀ4QyÃÔUÉÙØ¶ùáYY]÷²«'\"Õ vbÒBø%&ýpÖn8ÉxÖ¢¿\r';Õê¥¥|´ý5=ZJoy«ãKë÷]7`¾94BOvÙ¥r­v7¹sn=·S[hÜÇIfj)ÂatiÛt#§íi_¨Îë©9q\\9ÉªeaÌ\n ziEboÁtWO§!y~º¬ùÇªu¥=[xµt{¬ú_mS§¹®ò¬É¯«
©#úó°naª*i®Y\rgGÊShWßT6µHyOTÊ»LÏ²`ËÚs«zç³U³ZÆ¸üYá³Ò©iÍ´è±zq«[\"²MOð÷Ø·²ºÓÛKm
&S}»wx(;×«ä
¸Xó·Wö)ã c´ý[·	\rÛ©÷ùZººò·;¯¹ºÿz\nûEì¹ÓÕé*UrF©W*Ñ;K[y§{}¾Å¤ZÆ\\Uz/¾¯üjÛñ¸Ó©®¿Ñ4Y«á(ÜiS/û£½/~{ª+ÀNøCSY¦É#R(­`sî£ã½p·@2½ª¥½>8Ó3z+V®·X§Q­wÅÔke7½Æ8\rºJÔ3Mô%¤ÐÜ'õT»?¢\$-RkBOÆSwIéSÆÓ÷JsãnwSù»É2_~·É7±ÕÀÙWcèwÍwkY\0Ønª\r Æ\r`AOhÈÖÌv\rïÊÐtb¼ÏN\r±OÐÜO\n pd+ñä>×ÜÒ\n7-üå«¶Vö9«ÅRaÚéX\\×I·¹v]A²+ÔhCÔ²ýW)ÝUºýÎÙYÉP´\nkäýRAºßSÈE
°þ;è	½\r=Ua£÷e
àÊ\r¤BÄ¢+âm|ÄÕN;»f u½¾H7'ÕÙÜûUÌUV'T7E½\nÛcê?½ö(¨_ÁtLï÷jWÐÕ±&æï8¸ZWv 4|a)²G×Ø.è¨îíys£'åés/ñÅ|Wã)ÐAbc¹9ÐìY>UØiW¡Ëf+ª;]²¾Ù?â×;åIã-ÇU¶\nF>¾<-êe\\þ5;·óæo¿¨Ó{²[¤ûmÍ.:¾äão=ý(â\0ç¾U I'-\\vâ[ÖXóï(´MÀ@Çd»¬¶Pæ`ê ÛÚ×7S¼)\"¢~	þ qQwhfâ\\JÌC@S¤aÙ)àí¡åX>	+QBËëO
ªâ~\nåäQÈhr\"7
0ÒÇ\nv|ÖüAEÆÙ\$8¾Sü#¦^TæÊv@Þiàî=ï´ÿHÝ h¿XâþÊnJ-þYûáÅU÷þÎDà	\0t	 @¦\n`";break;case"th":$g="à\\! MÀ¹@À0tD\0Â \nX:&\0§*à\n8Þ\0­	EÃ30/\0ZB (^\0µAàK
2\0ªÀ&«bâ8¸KGànÄà	I?J\\£)«bå.®)\\òS§®\"¼s\0CÙWJ¤¶_6\\+eV¸6r¸JÃ©5kÒá´]ë³8õÄ@%9«9ªæ4·®fv2° #!Ðj65Æ:ïi\\ (µzÊ³y¾W eÂj\0MLrS«{q\0¼×§Ú|\\Iq	¾në[­Rã|¸é¦©7;ZÁá4	=j¸´Þ.óùê°Y7D	ØÊ 7Ä¤ìi6LæSèù£È0xè4\r/èè0OËÚ¶íp²\0@«-±p¢BP¤,ã»JQpXD1«jCb¹2ÂÎ±;èó¤
\$3¸\$\rü6¹ÃÐ¼J±¶+çº.º6»Qó¨1ÚÚå`P¦ö#pÎ¬¢ª²P.åJVÝ!ëó\0ð0@Pª7\roî7(ä9\rã°\"@`Â9½ã Þþ>xèpá8Ïãî9óÉ»iúØ+ÅÌÂ¿¶)Ã¤6MJÔ¥1lY\$ºO*U @¤ÅÅ,ÇÓ£8nx\\5²T(¢6/\n58ç» ©BNÍH\\I1rlãH¼àÃÄY;rò|¬¨ÕIMä&3I £hð§¤Ë_ÈQÒB1£·,Ûnm1,µÈ;,«dµE;&iüdÇà(UZÙb­§©!N PÁÍ|N3hÝ½ìF89cc(ñÃÒ7å0{ÉRÉIéF¬§ñ\$!-_H¡[¨«+ùq»÷\räÒsÐ
fLX\\5_Î»6bw¸v°»Ö;¥ÇMÊ ¯Ögçîn¾ál+ÉÃN³*©¢ l«7ÔøøÏôáASøÂ1oæU+:S»Þ;0;ÓÅ>t=9`@rC@ä2ÁèD4 à9Ax^;öpÃ¾ïóâ3
ã(ÜÐÃEá\r³ß*ÓÛecpx!ó}£®û··ëWÄÝ;u2*Þ\nÀÕYûhòáÖÌ³c1öMäÕÆ!qLS¥?Û~
2vßsè8,ÈÓ£ôÆþ9ÂY'n.Ap®Î°\n\ná9äªÃ!å!¢\\Ð!ßK(p£AÐK
f\$sÑ¹kaÉ¸´²ÚËjN6Ï´,¦áâ'hpàF,êu\rü;ØC+K&!O	ÈX	\\õÕTÂ'ê`PlJê»_+|º\"c¶F
äüì¬Ñ\rÛBlÈ´ô¨ÚÊ¥+&>´9\ná÷.äídÕ0VØIqB+TÆÚÖá]S¥vIPaþd\n\0001ÝQj¥ 0¢Ú²*exä*
åï.ÉÀìÕWK\nLoue=ø_/ìvïÑ,yH+Ï+*ÀË3æaJAh<õS\$DÀ.oqYµÉ¦J%°	IÜãZ«}²*Îs5 ã°:â³8äE³\")·7fÔ/ohD°äAê¼7`Ìú)(Ò\0ÍÑ¹\n¼ù<ðÜA\0ue!ÕÆ8àÍ\0l\rá*7D(!0¥PAO,oÁ¸: PPÁK×,>[\0C\naH#AÃª\\j/;fÂ@S<µkeA0ÏÖ[Ñ*ásÑ§´ÙÎDm9Ö
¦0Y¬CØëÍdÕÇp@ß*ntA2 Èà!ëtî¥Õº×^ì]µvö%Ý'xïzzcáÑè¼P}hVzoT¬7ôUMO|h°¬	^Í§U5ÉG¸ÛÉëqlt~ºOÃxtdu;o«°SºdáºÚitê-Ñº[&êc®vÉÚwlîrnÎíÞ»öLÊS,x¯\$Ðà~Ck¾¬1»òæ Ùÿ<5¼µ\n©5úYõåòÕ³\nêæ}¦VÚöY_fv0%b=áÁ7X+óÃfºJ8×
Kå\r2¦±Ì sýCa¿ 1Ý»ôbr¿:Çô5Xl/ éÈkZ2B£Uð%N¹ÁWH\n\0RªP¤ÉVôÀC¹°ö'(ªpÙeéÃp\\ÿ#è}Áú°mÄCúSëÄ¼;ç´XñcªçJ¬¤ª¸wÏ0\n¯É¹å×\$Ô3§é±¼°Ü*+xN~\rt70iî°b,n{å-¨>B<úf)áV±ñåsÂXTêY*«ÒØ]°¬«æ¹7nàM½R)u¤i\$..R¾+\$ÒàCLpß`]8qÍ?dàl=èpu6:d1¾PÇïCàÊÆýs	p¬¢wÏ[JÙ]'¥WeìiæÎ!J¤í,Æ¬ó0QY!BQ½.|,©æÙlüÜ\nÂU¿i:¬VJ*óíùJ\r2vîGVê©[+Á\0fÏ û¹ 2Ü¦a¦û(J»w~äG¹9J±^!3lDEíåZs1ÁuÁ\n.Âp \n¡@\"¨{?i&^ß\nM­[^«8MÞ&×9ù2N³pQdÕò%LxY#ZN]¯Ö*K_\r8ô	¶­±X¤ÙTÒz}uê?îxPÔ_ÜdÌÓXiÒÁ¸ëÿÓUÝÿ¢²!\0Ñµ§Gí}\"Õ=¦©gÝ¯3n\rJò¼\\P¯¿´Lö¾_ü¡ðÚl\nóÿ_\$¦æµ¿/fpÅhËÙ*ZlÁDdþíà&A×)\rEÜ£@_õµg-ìS8|JÐâ¢\nþ/ü(æØBú¬Â²üHbìfÒÌ/-¤\r ô,à¾Ê+\\?,6ÏobK@æ²ªÏr;«lÒ+ ºL£2cî î^	dÄIo`%Ê.b`çøeFD<'ÆC+°8Åv,c</ÐàÊ¶©r2'ã©Ï.Ú¥f&hêT²\\N ë¨â+\$(S|â#¾ñHgh?Ãêãö¡äDS£Âåý#ºüoj;ïnäîëÃ¾¨Eâ8ÊBû\$^à\"¸aÅv8\"ÙÁp ÉÙ\nb&úIà}lB,ÍdjÀíÀ¨ 	\0@ÝDÜ\r\$ø¢mÅPêÎV6èâÉÍ{ÐXXæ¨ @ã1JI°t[&æ'eî\\D&qn¹°¢ËrU#°0è6÷Qxm	Ü
\"æüCÑm¬±Q1æmE±þb&+ïqå£Âø±´
é5©ôù[fÑDFk é2àè2;ä9b·	â¾9C( ïìáq!Ð\"#&Xq±gèÂ,æW#Öî9gf{\rò(@ÊDðêg\0èF5\0èØBJ:XD`
v¶ÆÑÄ)'Eþ[vð\"ä[6[~G#\0L6b\0ðk)x9²Å´;¨%&itPàD£\$PÊØ©ÅfbórFI²~¨vøËrAñÔGèQÇÐeéÑø~å%æDóGüüESÅ¸ó0!NAä²n©ô8CQ.Ï|Û-	
p*|-¥7§ìs|:Ñ¥2ð~ï+JëðÉD÷ÏjÉXïn¥)Ðä'oz]@N\0àWÀ~+2¬åB
:
F+gÆSsÉ3W)S63ñIm9eã7C[.®:Ix8É}	#63Ç3óïò/º0¬EúE¨LËoò\"àRðpösm-¯pT«DE.¢¡5E¸BF
;úÓpÑ3S4\rpúhBtR4å=<I<°~£ÂùÓnöÔ-1Ë[É½#ô./= §F%FDÉoOF´GFê11³A°<¹#0GÏÂ1GecêÐ+³+Jí\r²J\\ã_È8;qGJÒñðÉ8<dN°.¶D¦}íF\\êÐÇ\"ÙD3o4\r¬H°¶tENÖïtÚ8ÔÞ~ÔãG©2´4õçìà/2R/®t\nÎ0Óâ&sìVd8È«£ÂX\$ÄBRECÂÆ9§ÇN©­5Bâ²Úïz5M	3W	®t¸g;ðõ;'ÑSÄD
F*U2ú®T´ÓJâÉPÔðôÐ¢êÓ:àWSHøRÌ\\dQ.:ÚÕ~µS2*»J°»<tþ~uõÔæ;§óLU/AR5U_^tö­5tDùSVuÐ~ñ\$1+2q1²ç25
ñ& o¶ ´í_rU]tKHóÏa¥¹aèÛÖ^CGµãHëbõc67`Ö#ò_d5e0w`ðyeA7ÂVs~Ã¢6íb	fÖF¦)*[x<#VwVfVÂU \nG6oô
\$å_ö£jkÓj´duHÖOI4çjJjAC3EQÕïRûd´]ÓÎ	>\rÌæeImïÍEæNêtñ8ôöä¥Vêö\\4öö\röûoè£/r®9¥¼B:.{R0>ãrµÑYnßlöNw8=kv}UýQôl·:ÓVAkÐ´ÖálV±tg}uÖ)VÝlgPSJWYtqQwQ2}+È[#tkS ×ö_yÃ,â¦+rò^¢r7X5y7¢>\\t²Âf\në÷L­7CkÔÕWÙuöÛkõÛo5á~ÖpÏ_·dwëv)w©ãÄÝ{÷ðîaÑÚ_6aWa0FCWÊi\$Óm-oÍI1ÜhñC|ìÕHå=·xØCL×k\0NàÑÑ	:Òâ;í.¢îb´[²S¨¬àô¼ûÑÖüã2ç(¤Dóuã'&tLafI¾ÒÕke\rIR~°°VakrßI¶gN4È4Íb8;ezjp\rVÞÀÒ`Öãrª{3[zõ½3hÎ5¢°Î\r«Oí\\§Àª\n pcË/®8ÔÃw)Ú
ëcQÀ-O}Vh«5Ø¾|fÍ 	 ß@Ì.¬ñ¥fVp9õB 	Õf£·{]øZ6X²)Kó3{8ä9Øè¬÷ÂB(w5ÙvNfþ£\"ÍÀ\rîvy'NrdYvè.
\0Kõ\$¸6}-Ð 'r,0,'4;mXN·@P§@Ê©/#ZöÎT¨TÁq%hÉ/ÔSBXøv3_y!N`¨dú=ÜÕ ÊwÆ8HoÐfÁvfTJ÷WHÏg%+¹÷µO=óf4UW©Ësö8I.éP zTïyPE©;³ãWF%ó£59Âà4¦Y\"à\nÇ ê\rµÀH¥g{bÔS¤(Id[ÂzÐp:#¹zfÈá\"®Ä;¶;è÷%1£¶glo><³H\\JüCûC¯¯Wí®ð/U®Hpðm@\rî¨ãê@·u£ù¸²Wbº|v=eº>
ø¤;hq²@	\0t	 @¦\n`";break;case"tr":$g="E6MÂ	Îi=ÁBQpÌÌ 9óäÂ 3°ÖÆã!äi6`'yÈ\\\nb,P!Ú= 2ÀÌH°Äo<NXbn§Â)Ì
'ÅbæÓ)ØÇ:GXù@\nFC1 Ôl7ASv*|%4 F`(¨a1\râ	!®Ã^¦2Q×|%O3ã¥Ðßv§K
Ês¼fSdkXjyaäÊt5ÁÏXlFó:´Úi£x½²Æ\\õFa63ú¬²]7F	¸Óº¿AE=éÉ 4É\\¹KªK:åL&àQTÜk7Îð8ñÊKH0ãFºfe9<8SÔàpáNÃÞJ2\$ê(@:NØè\r\nÚl4£î0@5»0J©	¢/¦©ã¢îS°íBã:/B¹l-ÐPÒ45¡\n6»iA`ÐH ª`P2ê`éHæÆµÐJÝ\rÒøÊpÊ<C£rài8'C±{¨9Ã£k:ÃªÕB®Ú} P¡\rðH+%áÞõÂò4 4¬¬JbãJ=#\"7#ÊÞø>C{èû?\n0læ\rÃ8@Á¯SØ×ãHè4\rê.ýÓïðä2\0xÊ3¡Ð:æáxïc
Ã\r#ÁrJ3
é_X?¯ø^(¡ðÚµÈÌÇ ÒàxÂ\$óâ>¬Ø,#|Á,m4#Ò2492+ÀÚ¼6ÊOÜNþÇ'¨²à·}	ÆER*¢Ð\\é£\"lÁN3-H<¸+t[w¤£¬Ô'KÒ4³\r4 ÏpTzBØ	?|wiNÎÖ\$h%ßÌ¢DåfC43E8Å.ò:å¨+f À°°1 -HÏ¥p±òÊËF­ËÔ¹ció(´C\rÜ5¹­MÔãÔÐ¼/`xiO\$XB\0WÆÈë®¸®ê²ñ»¬ê¥mò³sè5îH|²ÁJWÖàë-Ì:iu×ÂîÂ 
ÉqàöÝÃdd:£'^O§Ý.=\$þJ|5ùþAÃ0Â=A<ªv9eU76Ô.ç!v=&`n¸£[I´4D#ºäA(aL)`RQ8!Ôi¯üÃ¢NËËå=nÁÂþZ1'ÄF¨õ\"
Cð*dùé6Kë \ra­¢:GÍ·\nå]«Õ~°VÅXáÝd¬µ IzÑ\rÀ¼¥UÄpV¸>=pÌXWÚâô5âð²¯Ñx*çïò4Z|93\r:«PØ^ fCÈuÿ ¢0 âñ^Ha!¥P@YCHfWGÆáx®drTÀÄæPÓËt(mDD(¯òÀXKc,
¢rZI-¥Ô¿ÖÀsÈ¦8ècH>BiÅÃF¸BnHêø`FèÐÉ2[	óð\$Í¨Oej`9¡\r©Ì50ØÉÆº÷b,a1RÒýó\nwÞõÌdD]¯ÁNÿI#äÉºÄ IÂª\rÈzR\$|#á!R( r(âEä0PQ`{P3mMuÂTQUHaå9,KùCs53ÂëÒÔF.B	cº\$ó¤f|G B\r3M ù¯6CI'\n -ÓâþÙ3\$\rU­ÐÜ\nÔVLh;µ\0ÆgWäØ×TÐAG©í\$îúëß|-jF±D¨Ë,ç~ &Gô@Ð\n#Ô-	 ©ùJ933ªZ³'¡«ØéjtOiÆ4a3w½û¹ê½¹ª^Éx3@'
0¨kHùV´È<w¾[,Ûí*\$](ýhHÙDªãPòÓcbç/£8T,l@\nË|øC ´H>\06ð¤Uo´\"ðäé¬Õ\rùõM¥=6¢k#r.BÀ7]Dú£Jªý1pàq(%Âp \n¡@\"¨A\0(	9]ÇÃi  O+Ø{AH\nÀH\"ÀðN#¡ Ä\0S:\\2ÈËYMÙ;·3>®ð;¡é6\\àÖréº9'LÅÄ\nÜð9Ad:ßVoÒCvqÎeT[`,ï½¦9Å\nÓÙ/p¬\\¡dG*awnuÃ¼F~æÝâõvìÌÌÃ,\nø Óÿ\nðÖ^×ÈDä,øÈåø/h:JêÕPZ§ÚN8äÃB\\\$q&Á/ºý¿\n÷ÚQ¼¿/Býå	sµ¾ÍÃzg°Þ9¤,¯M 59tðÓÒKËa9À#¯¸Ì¶(¶Ðá¹#RâÑõhií çBÜ{r&*ãüD®óãÛGL\"<ûäo¤\0ÉE¹²d=Ø¸Æë²]zÒÊJ^µ &N& ²ÍÅö	è&p¹¢^Fô¸N_:<C	U¾mÁÉ\rÔÒe
5PlC=-9ò®ÇÜôc¬}eö!Ê_cpy¾7GïíÈ®Z1rÓÊpHÄç¿.=ÅyÞ¼ØSóOÎ´é>ççtQÐh³½:¿£:<f[{0¥Õ\0±§óÒ&ìß Éká×zñ~}Pús.ÓÒÈ¿myýÂ9æ×¡Ì¯õÒª¤RI©#pü!«ü,Ä8® 6p¦w G¨;PÄD<ÁO>·`:/R£zíìÐ\$r>Y\\ÊO*9ÔæÚ¢Lfd^¾)|L¼²@T(T\$D ¾Eý£±0Dúb¾o9QæLÊôLÓÃ¢Zã_=Ú~íÂÚ×Oìÿ_ÃNÌÙÍÃ§U¶Ë\\Ó6b,æ½\"æxH¹\nÈ¸ôÝlí/#P\0eó\0oþ_Ìrw¬(goì:mª#­¦R/ÄÜb@ùð\"KdüE¢ð5FH¡ÄÇ ê*`êÃ%ÍGÍÊûåÒO¬âpË -²`°.Í,áLä¹Çpý()¼sÐfPoÈx(ÌÊÍ'&}æç°Tq0ùîþ¦ßåf7Øé¢¦bÇàên|åîªè 7.o®v(4êÃ\nëÊÍ-Ê¾\rÎÝ/¼Ìï¨¼;mÐnPpöÜÐý0\$í¸¸~¨FoLbbåF'Ë¤Xã\"#«GÜV±Wq 8&.ä#t¢l;\$Ù7éºÑAÌº¢ÄCj>)¾gZÛâmí Âlúa¬`8*9MÙp°iqØðóèØÈÏQ|_M¦ÃN	®µC0jñ·pyG\"àq¿ ÔÍdd¬vG¢ÞG¦7.ì'ÈDë\rµÑ»É\n/ÆùòüðýF;â*\\dÛ%Þ#Iöør!!f:1
 ³\"DÓ!êHåÖ\$/½í:ÂWö¦=ÔI²S`µ²!&/òTü{«'m\"
%­Þ§²\0ûÛøMá%±Ë(é&J
)q²Qð;Ô.BÎ)/®&QÃ+§<N¡¯Z¶BÌu F @]Râ4,L-!f4`lî
Ü(*ä~NX5ø\$C
)00<,OFZÖ0´c.c1håòN³Óê³/O¬°&¨þ¨ã Æ2èl36^R\0@d\rVþb+8ôâj\n ¨ÀZôÜNËLP¼åÖ½)¾ï®å3n2óµÊQÌÀû¬Ü&\"STtÄ|H\"Êèc§\$BòÐ\rÂO²e4É8&S¶6f6*d,¤(ha+É~¥­'À\"ìº»c\"+¸ R0:c'¼xfK'cr
\0ê]ÍTÂÈÇ1T¿Kü¢åNÃ1ØÓÏÖO(ý,1D\rÔ k|¸Q\"B#É&tGC~ñQ\0%óBnBË­.@RÂKÉóPHÚ\":Çea>m&ÌÇú¾À¬8TO@Ä \"ô\05'#@ô_ÂøÂe 7©Kc\rç`xÃÔÇ\0µRËâ~\"ô*ÔjÊ&GCô\rçtâ>C²P\$j\r`ì§d\nÏliæ\"@";break;case"uk":$g="ÐI4É ¿h-`­ì&ÑKÁBQpÌÌ 9	Ørñ ¾h-¸-}[´¹Zõ¢H`Rø¢®dbèÒrbºh d±éZí¢GàHü¢ Í\rõMs6@Se+ÈE6JçTdJsh\$g\$æG­fÉj> CÈf4ãÌj¾¯SdRêBû\rh¡åSEÕ6\rVG!TI´ÂV±ÌÐÔ{ZL¬éòÊi%QÏB×ØÜvUXh£ÚÊZ<,Î¢AìeâÈÒv4¦s)Ì@tåNC	Ót4zÇC	¥kK´4\\L+U0\\F½>¿kCß5Aø2@\$Mà¬4éTA¥J\\G¾ORú¾èò¶	.©%\nKþ§B4Ã;\\µ\r'¬²TÏSX5¢¨Ü5¹C¸Ü£ä7Iàî¼£æä{ªäã¢0íä8HCïY\"Õ:F\n*X#.h2¬B²Ù)¤7)¢ä¦©Q\$¹¢D&jÊÆ,ÃÖ¶¬Kzº¡%Ë»JÜ·s\$PhI*ÑS2g4MZ\rè\nôBX#D£&Ï.i³%.Ô0£|LµTRöOI@hhr@=©\0®Á#ÄòºSèAGuä,öåa£Ã¼7cHßh-e\nO2¯¡kMr¨Û­)SHTIjfB£Vµ`
ÖÑ4ÈLí
,ÉèÑ>É«)F#DÅpD¨kgtThM¯
ì;rFêöM+¡# ÛG!#¹RPç&IÁ\0Â1n­£äØô1HN@î4¼0¹¦9y\rÊ3¡Ð:æáxï§
Ã5G±àÎ£p_(r¨K8|6ÇD@3Gk»i\rÁà^0ËZ©1|1D¥¨KæS¿¢¼Õ¨ª¡]pj¸ß`[¼ÆY¤tAiÅS\\n\$Ø´	#fÑâí«þªûòcG¨ P®0Ct@3£!(È4^õÝsv|ÙR­ñew)©\"@ËèÕ©þn%Ì÷K#D(y|fÉN]êß_s¿×ºÂ:Pì0¨Ëî¶¶5~!¢Ñ®¿¢ûBèÜïs¿FªK\"0¨jºW/^oXÇrêB	[!îupLÛàU.}\0`gHq@pN\$h	Ex3ä\r]cÆCr\n!1·H Ð²SFðÄ¢u´JO¢±B.QÆ4îÛñO)dÅÆ°CÒâÊL>&É¤BÔ8¶É¡RQH¨ÅS7ÅÑË~Ä
Ç×3^ÐõCØý[æÁ¸cXûÄªdð&Ea¡êb9Í?1¢ç]¢°J5@ºc¶ViºùC\n8'\rÔÞ0lcÉÐÐ¨Î[j\rÁäU YC*ÏÀÞÑ\0sL!Ð9JÀÂÃ\n 	Ú±°ÜNð(`¤µ£v¦jt\0!
0¤¡|y¸È\"WSÁF.TFàU\"PÑ\$%±o)D¯	1JYÂM[ôSRkxªÀ¨qQÖm,:²°ÎÌÆG)1­5¢ë?8	¢4fÒcNj\rJ
5PäÕÚÈ/H«:6ÆÀ©kD-¹¸-TÅMÌ5N0ÈT¸TDbaEÐ	-)òêÓ\n>qÓÑe>é0åÑÔÖOjB;Ë-®5æxÀp\r-	*\n\$ÐZEhí%¥´ÖÚS\rÈä5f°ÖjÏZ+M°6 CÒ\r­d:RÀ|°«Û5uç`6 ÖÙz9Uò1Bº%ÏÒ**d4	g`SÛ¹þtQhÐ§²!?AÈdôif!Xb9ÁÐ:öëÃfªi.XµÙg\nå´¸FìÌð{BF\r{®WÀÒúñIÒ\$§f¬La7Çô¤¦ñnH\n\0´þ\\ÔòóÐ(,à¦ Î²NSòYWEÌè#\n§Odÿ/\$B<kNµ:JË,!Í9çDéW^Ct:Ç\$3{PÃ¾¤8ýÉcdäJE>Ë!HªJ} G-ë3æLÃFç³àá2Ë]gn¼;Æ,(iíZ«|r!}¥­QÒn
b¢G¢TòjûÄÞáf¼§*ÈÐ*ûÅÅdWÒSp´¥{MÒñ*§QM=ÑWg\"}'\$ÇK¯d\$a¬Ø3Âuq}AÍ%dvhEjc¸±9líöJPôDÂczRìDÊ(«B@,Xr¢`'
0©ddbÌ>ðfútþ¡*ÏéØ÷\n;þÕöEaeqú¹ð©%¤Hy8*h»?±.p3¼/Fçj[5&Z±Ð \npÌl8ÁP(2`ÜëÃMxd¬Ónè|ø:=A®~Ê½ì4¢5îS/Bæ\$*JÈ4nAOðh/sL&!é'ÑÈfÁÈ!h=!64#Éá·*wÈ¦Yû4h0ÚñÕ/¯zßW(¾\r¸:CU-äV?:à?Aéè¨ È3LÑ]{®»Ï¬Ç@-ùö7Lm¹ r2ÈÿâjV_êCT[.Ôõ*sÎð	b×_tøêÑ+§DÙ!ç<RÝ³®°¾äMðº?GñùÒüÅ8ÐÊÌF¬\ntéôl{¯vnÝÝN×8úÙE¨Ë;ì&È\"*·½ØT@ºñ¾dh\"Úl¢Ö?nû¾å¹\"Ö²ú!ÐÒ]û¯!õ
0Êt¯öé½\\¢çLO0ãñ¢Uºn<¢÷¼èPïÓ\\F7NMF2h¸\$r!¥0
B%Ü¬F?òdèÀù\"¢\$]Ýá¡MJ?rÊ/\"·î%-è8a¨r-ôxÈØrÖ[OúæÇ/.v§UkªÌê*d¸þØHvÃ°oBØâ%ä\"þp<)Åòï¢K'Qn¢¨¢ÊÃÞ\$ÉäÊ(F5
Nc\0¨\n`\rú¬I`àÁ¼J¦ö[ð0QHÊ¨éZäoGjâôv§ûbGr7À[0ÇåÊ§~ÒÈìMæ4ómú.ð©ÌÖ\"OÅwøÀ\rG\rì.U°ä©Ðè(OVÞÂ?( .0çÇ\$ÓÜ@Pá\r,Â¡3'¿§_\rxwÌ&3eÀoð°G|kÎLq8\\Ä'k\nèob\"ð«ÑÁ}QsÈni±;qâ?uÈÌQxxqÑé±j5 Ý-ØG`î#10A'&\$BÂaFA®\0`ÅB\n¦C@RQ¬!j=	ô]b]efPØmùM4n¢
 wÚ)Ñ>*QÔ-Áv>CVQì¼>\npïdÎÌ¤r/jçI´ÈGzÊÅ³#Âª4%²#CFRñDX¦ªýE´4ÐZ@ÒJè'Ñ^.¾41fDbõñ'ÇI(\nw(QFý0øÒ±2(%)ièBaòoºöoÀÒ*¤ÆìxÏ¼éèäê£VKh<-odÀñr¨6ä* %L&äÒèsÌoG*\r\\aæ\nj\$ªd#Ä6S/8ÒÄ*vú\"A 4Äê¨ã#S0tD²{
Ë7.
ó4ðÓ0%0ÏÂ)/ÚOßræ¼â·)Ä5-Å.s`ØÒÂzBAãF PËN\\\$®`.94¥f_ÒH©»+í3,2®µ:.°\\ó¨¼âèÅ4ïNRór_¥Äî,`sºãîàRRÆ\\3´í³¹6²Öº³Êí)/,Sî3ò©öêóß@­@RÒÖÐõ>Ê\rð\$¤¾6®ìÁ'5\n§C PZ³	,L1¤Ñ=gEt*SñyC&û!+C£ODÔ,Ñ£D/DÓo-ET\n´\$Ót^\\b1<ð^Ll¦RéDóqAíæ!mëé¡\0­ò24M:Â;¦ Ô«\0gB2´²ôuA±%JQ	\0000íLT°ôµ>=Óþäæl:0ì.òÌ;g.)¢®.¢W%u>;f¨'èÊÄ6²Ä*sôñ#ÄÇO¾nôý3b.§>o5Ã¦\"ç.t7°,Éê|½ÉÈ¾5%9P<PbìâÒ´ØÞÔ®ßà^¡ þíp1®<o¾snýø®(º­=U;é_\0\$¯²rTÏEîncìr/·KrK³ßZZôå&íKÏ\\.äqõ¬7p£4)[Ç:óß5Õ+ÔGt(òEUå@q\\\r>õ
#)ñOUãõÉRÄà+§:ê*jpø]ÒYg&ONèHÖ.ûJe 'O].Hçbn\nïÒÿ]+\"ÖöIFg?T6ÔÑ\\VYvKDaBÈ_éMUþÿd\$âGös¶&Ò9FT?eó.ãV(`3[irÿ,¼­3OV4+\"â½ëãNñ9ÀPkßeýMVbð;VgË5õgvgµím¶Ê³VÏbÖÓ^vg=öîHémËÒEMën6¨vÈÖópÖÐµPôK;>çrVçYÃpfy5Çj£ñsðLõªVÕ]×-QoÕ¥MAEu½=tæòµíp2MvAq0stwtS&ðÕï]NH]÷¥/awS[SïxÐxË|\\3Jy^×^7^¥f75_´Ô¤O6CH×fÖ\\å4¥õ&Ò}+»hû{¯kç½C¥ñ/Er«×éc&wU/CÐ/wåÒÍåýQsnýGxU_y&(tM5ybËöXt¬ËgSëM\"Dr¢8\rW©^±MI
<S?é[I÷\0Øulï,9o²%3X{ì4B8G¢têRÍ¾\rª\nIL|@ª\n pXªWOóïTä7Â<
w8SÉG±)®Õ{ÂZî;É\r4s8ßÔío[â@\$T2Pà¥GtrÊö@\rø¸ÀòA¡daÃt%2Z>¤J@õ`[U©w±NÃVa)Ù.Sïà&ËÌ=X<C8c¢x	ÞÚÆÈhF\\<¤upnèhx£!*ð5Y«£êNÎÀ×'²ßWéÃ·¦1\$6nqrÙü~U.æ)\\Y/¹¯
Y()¯WÇv«X¾DÐámk?,¹¨R@?uÙÛ+rá'\\Ï´ØB4	®¹:¨õ}/¡S<³\$X=MdÔsäOK¢A¢ÔSxüs|ïâ\0ÿ3'*4=¡°Êïà¬dàê Û¢9è½}Ù2~ðåÚead+¥â}õ©F1ßX=&+XvËãý£g¼1 Éðî®tîöÃ&´U±Úf\ríâã;ÖÉÖôCEäðS?02û%Q	ax@² ";break;case"vi":$g="Bp®&á³ *ó(J.0Q,ÐÃZâ¤)v@Tf\nípj£pº*ÃVÍÃC`á]¦ÌrY<#\$b\$L2@%9¥ÅIÄô×ÆÎ§4Ë
¡Äd3\rFÃqÀät9N1 QE3Ú¡±hÄj[J;±ºoç\nÓ(©Ubµ´da¬®ÆIÂ¾Ri¦Då\0\0A)÷XÞ8@q:g!ÏC½_#yÃÌ¸6:¶ëÑÚÌ.òíK;×.ð­À}FÊÍ¼S06ÂÁ½¡÷\\ÝÅv¯ëàÄN5°ªn5çx!är7¥ÄC	ÐÂ1#Êõã(æÍã¢&:óæ;¿#\"\\! %:8!KÚHÈ+°Ú0RÐ7±®úwC(\$F]áÒ]+°æ0¡Ò9©jjP eîFd²c@êãJ*Ì#ìÓX\n\npEÉ44
K\nÁdÂñÈ@3Êè&È!\0Úï3Zì0ß9Ê¤HLn1\r?!\0Ê7?ôwBTXÊ<8æ4Åäø0Ë(T4BB-KdØPÌÉpS°ÉZ&ÉÁ;qê& %l§ %Kr!Å\n&F/c,6J;rb!¾Ã¥hàò, ÙVejEñ-@]Õó8ÓLBÈ6»o´	APçAÃ0c\rI®ÊÈþ¿ð;(èÞ:Ýá\"9Âp¨XÐ9£0z\r è8aÐ^øÈ\\0Üw+ôüá}àx(ä2á\r¯ÌíÏÈÚþÒpx!ò\\,®Ë³4íh	K)FtÌ @§¶aV\rÏKØ-ó«éB¸Â9\rÎØÎ£\"ò<Ò!@æÉ èÝNêÄI¢`0Öª¤J´h¶lp6AC°Â6£(1BT§Jv7oL2pJ®ÈñGg¦5¸%û½°V]3ÉQ7,tW¥Ã«gÍ	}Ú6C¨ç(,Ó P\$µª¼­ôêLïÑ¬ê(¦S;Å·FBö¶qÝbR¦Ó\"¢&CÆz\rÃ436üJ¤¦\"|?Û<òé æg¬*@yÍ¶¦GKKÉú\0§ j
Ù¬¤­sÂ³IB¸JéÅ¤¸Ûßø¡&Ä¶5z¯Ñë2­\0¼0¯Å8@äÊÿ\r}ðÌ n¥,4áBÛÍLãZ0ÂI¡E\$
=¸ÃNôUòYxh6\"ÖEÅf#§ª.f+n(7PÂKbBtàA2ÐPßRÑ84ÅôÊ×{ñ1%fºaÔ,Ú¿ú\n 3ÄE0Ð;1Q¡ÕzµÄ¹\"r`áJÈ¹H al5±&ÅX»ìmÊ\\Èná3DPÊAô¼QÑ±3vrKh\r*¨¢\n¦vi;H		ðé£\nyoFnH1BÕ ºVÍ=«§U5ª\nw¤µ0¦ÃbY1¦9(´·L
¨õ\"¿eAÌsÔA
	2¡¶cçðGÖô+tâF¥Ð
Ñlj\$D½N4Á¬D@kÂb\"@¿`l/(8i4C+f!H¨ÕÖ¼Wf´¨6ôÐAá&\rÓ\nÃ%8nKB¢èÐºCI¹`#\$H[\rV Ïü¡nH\nÑÐ¢<%àA8HDÊ\0.\"c
Ø:@àIÚP!°\$Óòét¤ùÓ§\$U5±>0ÀA`JsB+ÊÇ`ÐËÃpp`		!FOIæU\n\\ÒºAQÂ
FU¢Ú-R*Ólè\\DHAÙV±F©9wÎ6¦oDít-E\0¡ìEÅIÄ?·\r\"\$¸\$ ó\$¦°H76b;`Xa¨@È(3§'ØõChõVDkáû
kÌ<Q	`/\n<)
H®wÞù9\"?ÑöçÛ¹3#¶ôÂQH·'aÒmÛEÚ¡3)ð_é¾îÙ¸B1Ñ®Hð¶\0 »`©XÎ|ÜG>\0Âe|rV\rûX²1\$8ø©Óqåµ¬¦äbÉ%±µòq6ò,I\$ßU\$²\n£H@ûÉLK!¸¤aX»!\n]ÖªÖÌIÔ8K=\$èA	V\\-\n©¹çb>AÆi-dl2aDwrÔ	ñ¸ý9Þ@»`,.G³t~oÕ9À¥ÔÈsSyÈ_fLû¡Íå¤Ð\"/æLËË£¥\n+\rcÊIëfÖ±=z*­|n)ÓEîï=Þ(ò-	{FÈ\$MI¹9!®tV¥æN3sÐÆË³9Èi%Uj%tGú}úÄUôíPîbÚ³Ä\rV¬½Â<\"j¡Æi½È¾\0Î:cÍ%THí¬Õ^psñ\$|¦IoÒÍõ*£7ZÈÑN»Eõ\"¼Ô.\$º2´%ÿ\\Ð3VJÌ5P!*³l­ÜhBT\n!¯¼D<¼k±ØlB7bMP»½íØ!öôià s d­º[bÄâN{¥\$£-äÏl,ì=ir,ÑI<b²[Û%SC\$º4n¼ø	Ór\n1w¬LÈ1Qó¶´>F¹QøäQÿãOsËUI.EÉÛJ7}N{OÓö¬nQ&ºS17ªN\nª\ngºñ8{ý¿å0²|'¬»ü¢^:ÊNõ|Äâ_¢n½\n9\"·qe¦PÊ»¥¥ï¦Ý+#DmÊD£*+oÑ#Ì@m­Ø©í¿%ìûß%Û÷û	à~çÞHïøÒ·¡FÃm:°ífk ÇÏ&âR9¢Ð2§rÁ&ÒJ¨«É¤OM\$ÛÀ?P)\0~IufF°Ab-JBÃo:Ë9ÉTÉFðZ0,FaÛï¨á6M°\nÛ0
6Î.à®'C¼·ÌÇmfõM6öD®ÿ-,ü¤
\0-Ëýä*èDÓGéBi\08~Ì	ÐÒ¨Ü¨ßL'÷PÐ#°Ô0â¢\\íÀIÎÔTÏ?\0\\¦GÝ\rbHïc\"ï£ÃË	/ï/Ï.+ý¡#\0Ã5â\\\"Ñ\$É\$æ¹
°\0£<Á\"'lrtå´H\r¬ãïVFºæEþï\n¿	N8î¶1««Ç&~¿[\r#¦&JËÂJ*¬LHñE1JþduN~Ñ.:Î1dÊÄjF©\0P­Q>jñCmôjb	°1â,ß)¹ÑÍÐêG¨\0èK1Ýà9.vhpò}ºpÙ Qr|òÓ¨Q râ\"oç§-rçÀþ^ANðãr	nL:&NAvI¬ iòFnÆ`àÈöQçr\$j\\²rvI- ðØòÃ\rZâJá.M\"ðÊëí½E}í'bö9ÃVOÌP±('°Ê2	²ÌPÐûeí+¢Õ(2VÊ-R 2ÈLÌÅ&lç,H/ûò*èT<èXXÒã/åý\$
xäç,î	1m1°éãNCrý26äR3S.}e\\\$Ð\\Á\",íPàèBÌÅe1Æ®<«V[2r5E¹6Q 0nËLÍ§4Î%PX0Ì('s5fª):­MÏ#sù*:àÂÇ« YâùAw:ÂlÑxªo%RÚ%ÀC¡J -\nTÇ'HíMw&ü\$ÐG¯
1bHÙóvWÂõcJIEr ª\n q\rÛ,ÌíXlmÐÅ¢@#0gZ5è¥0Ý\"LRÑ+p/Át]N	>ðÓ(SDr«6(£jqfznÌã,åå06dæYèî­IÀ¨z§®Ì Öå<Ú\r&%S|Fa/øÿlòP;G¤\rÚHHÿ¤Úÿ/Is©Jë}Â\$qJê9Ã~jÈÍç=!cvóEcJqô¾IO }#x­#ÎÚªÂm²Â´ph Â\"i91½BKûíjÊ(ïêçìÚÆb'8¹`@}PZ*Ì\"IèèÀäKîÍ^0 Ù*­\$íüÏÅ\$§v ¨NÈ3O44jÏ¨!VâIÃ±KK¢@ÞÃìêðR2¹-äÂåì2µ¯²S3¥¶[³FÐå-¼4b¢";break;case"zh":$g="æA*ês\\r¤îõâ|%ÌÂ:\$\nr.®ö2r/d²È»[8Ð S8r©!T¡\\¸s¦I4¢b§r¬ñÐJs!J¥É:Ú2r«STâ¢\nÌh5\rÇSRº9QÉ÷*-Y(eÈB­+²¯Î
òFZI9PªYj^FX9ªê¼Pæ¸ÜÜÉÔ¥2s&ÖE¡~ª®·yc~¨¦#}Kr¶s®Ôûkõ|¿iµ-rÙÍÁ)c(¸ÊC«Ý¦#*ÛJ!AR\nõk¡P/Wît¢¢ZU9ÓêWJQ3ÓWãq¨*é'Os%îdbÊ¯C9Ô¿Mnr;NáPÁ)ÅÁZâ´'1T¥*J;©§)nY5ªª®¨ç9XS#%ÊîÄAns%ÙÊO-ç30¥*\\OÄ¹ltå¢0]ñ6r²Ê^-8´å\0J¤Ù|r¥ÊS09),ò²,´¯,Ápi+\r»F²eÛb%ÊP¤Ë½D¥ºF­/Ãô@¥¯[r½Ë)3¤«úJ´<¡E# Ú4Ã(ätdÂlR>ñÁ\\È.Dáû¿/ÚrÐOi&àÂ\rÊ3¡Ð:æáxïa
Ã\r%JRÁpÞ9áxÊ7ãÂ9c½2á:e1ÌA§AN³çIX
ã|GI\0DÄYS1,ZZLÇ9H]6\$ÌO]FJ7\r&Øã®Éi,X¥Ùuz=ZS¤8tIdK¬±LWeEÍ9TrPDO\\Ä}ÛLÓg)\0^]·}âTÉíévx9 D%¤8sN]Ä\"^§9zW%¤s]fÌ²¡®:Da&ÇIâ\\V×Åô]2Ä!fD#°ECGmþl)\"f2nI¥ã°Ý58V	Pt+M'1Q:´â\\)qqÌSGD¨²lú^8=9ÊC­¾\"]M|íIÐ7­\\ò|.»^@PØ:IjsÓqt_
Ñ«ôwYCQaHX¤dV.LC<C¦\$Õ`ÿ(ØìC\$ØH×26WÌëÄjÃ\0)B0@9F)O÷Ôg(+¸aÊ#_iK\r¸E	÷a|tDÙÝR*MJ'¾+Å¸èt	\"Q,'b±Y+El®Ò¼WËa,EJËY«<@Þt\r0ýlãf`¾! t±bOH¡£¤N\"\"Aâé]d`^	£¦j»ÛFp|[¿öÔyW#(©?´,,£å*«Un®UÚ½Wëau±àêÊY9hPðxskAm5¹RAÑeu&2HäE&È0W1Ì,Àä\"rÁ,Åø
(¨H%ÓºHbð¯§ÄùS+E æb5¹UQ,ðaq6.HUn¬VÈÐ¢HHABº¿ÇÜdU4LÅÁR¯<}UX \n (&I\$|®,£ÅxÔF5&æxOa)R\0°NDÊqV+à£1¦{i/ÁÌ¸Ú NYsAàðqÌ(ãß3ðWÆ&(\0¯´Z*!Ò(ÄË-i4PÑl¸Eø%ÄÀOlN	ÒÂ¸Z¯Fjÿa\0åflÀP%t6èø1ÆõRQ!v# ÚÈPk\$Y£.\"S¥\\(ð¦Ê­&,¼R\nz8(\"EÎ¥¨E)*¨©|tVªÕÛûø¡(tsÈ \"õ1ÁP(òB(	û'o0¦ã^IæNIÑ;wP`ÐØ¤Ç¬Qtè+ÅÈ\n	á8P T¶ªÖ@-²-\"´KÓ±jËHKÒà*/Ô ¦g¢&(Úqf©¿0&EEÝÕw`²qvt+ðvG¹\r¡tsÄÌ¹­W¼.åà¼¯´uÎfõ»D|9Å@di®\0jYDQ¾ªÄ=,?¡ÙÐí1û »8ÂÚAÉ]è(ôð°Hs9¢ÜÎÑAiíMü­¥aB9Ås\$÷¸åÛÐtb¤õ.iÝ<ÄË)3:B¤ã¤ÃZ`¢pª)Ç°¼ÉhºMª1@!ÜU©ÂÝW¢chÄ£X\\Lb'S½|Ý§ËG/6.0\"L_Oc	BÝYh¢î¡ÊÛ±!~/Ó`y';V+0¸·º¢6Z(ËbC	ñ1Dcth¯ÈN°ò8x ÒóTéE4æ©ö+\0JÇué@XYvcfÂ§.\0RDÞDLÔ3Xjt²'Kó#Ms5LnÇ×k´Ë¶û¢bq=@¤mc¶o*Ó'E+-IÅYÃ¼Ã(bÜÏ/YQm
ðº(S>ç*E°å5(V´áv![Jù_zTôÁÄz\"ÂâU^ò^Ëëu\"/Þct.lÆ1
ãa£9ÆrmåWHàò\\¸çÅædV	Ë9JaØcû|ÈrèG3u4+
#:gè%p~sX8_tJëDGIÍä´³²Ò
ùp¹ÈâòVÑB*é¬%Ük.
4W-<ä¯Ì±}ñäO©¿§¾åÌswd]`_¹õÛú%éÆWwsá9Yðb<þ³¶xP?mA_wu6¨×{kVjááx½éÊö÷ÖèòÏ æ£¼ÈÇ(Y6½ÄÒ9eL«0XqSLi\$&Q:s½
«¨@½¦OddÜJ¡BÔ5<=®Ò2%;ÝUnËÜüô2iM¢´3't×ÖKMy²	§·õr½+Ç#Õ:ÿÞ/G4þþÐ©ÁtÏRñ/L`ö)¯êbP\n%Õ\0as&àæg_ÂÒpÂÚ-åú2dàç,ÍFi¢\$éx4áÎ­,ïè!ZÎëòòoJr£Lòññ%ï\$kÁhM ýÊbÏõpvhlÀ{p3Ï°a<øÆåC òfG\0ìÐk£\0P]\nÓ/OU¦®OÙÏû	\nPÉF	uðÕOäÌl½¦Ëj©0fÿLÅ¤í\r,ºNÐÖbPéã¼ßpGP%\rÃ Ð0å\r\$HDÐÍán*àZ`Ð Èò0Vl	ìÀã(-!tëÀ×ÃB¾ëòÛCbÀíúü\" H\"Ò§¨ÁB|\"ÊqTJQH¢L-V ­ZÕçÜ@g\rzäæ á 4.GÉªë\$&ÚOi; ª\n p6Á,Oâ®×ÍB¼ÊD8)Þ#b:½Æ~:mÂa¯Ð«Ð!(4Âä!^áãp;(2 Cn/¬ÖÍ©îýÁ^vCjôzhC4{§:-2!¬Z¬(¨JJf\"Z!\0.p.ÆèBî¢Ìæ¯Àò°æöCI¡m%øånlñ!x*lq&¢X4obG¯æÇÏ4j\"iL\".vnzs®Ì¹.¼ÈN¹)nÐÏÃ\$¤pDMíÄ\\Î`¬ Æ ê\r®Ô\$2pÎ_ìÁG#£Æ`BbOG\$£¤²T»Éò@Ëë.²î»2âmã¤ÃòrÑ\nØòÒøãè{ÄríaL";break;case"zh-tw":$g="ä^¨ê%Ó\\r¥ÑÎõâ|%ÌÂ:\$\ns¡.eUÈ¸E9PK72©(æP¢h)Ê
@º:i	%Êcè§Je åR)Ü«{º	Nd TâP£\\ªÔÃ8¨CÈf4ãÌaS@/%ÈäûN¦¬Ndâ%Ð³C¹ÉB
Q+¹ÖêBñ_MK,ª\$õÆçu»ÞowÔfT9®WK´ÍÊW¹§2mizX:P	*½_/Ùg*eSLK¶ÛúÎ¹^9×HÌ\rºÛÕ7ºZz> êÔ0)È¿Nï\nÙr!U=R\n¤ôÉÖ^¯ÜéJÅÑTçO©](ÅIØ^Ü«¥]EÌJ4\$yhrä2^?[ ô½eCrº^[#åk¢Ög1'¤)ÌT'9jB)#,§%')näªª»hVèùdô=OaÐ@§IBO¤òàs¥Â¦K©¤¹Jºç12A\$±&ë8mQd¨ÁlY»r%ò\0J£1Ä¡ÌDÇ)*OÌTÍ4L°Ô9DÚB+ê°üµáÎYqbë
Òè©*ÁÊ\\gA2@1DµOÙV%Ú^R©¥pr\$)ÏLÓ`P2\r£HÜ2GI@H&P±pF¿ð	hSQÍ1äM#¦¤%*þ!`x0@ä2ÁèD4 à9Ax^;ÛpÃTUU`\\7C8^2Áxà0cïpxD¥ÇARd)ÐSmRøQ!à^0Ápt%Ä4CÏBWå!u2Þëåsþ\\¤¥îKOX¦,J3æ:æ1uDMÏZS¤\0Ä<(P9
*iXBJTy<EAvtåÄC×\$Y+GfWÖ-jÕ`ÄåéÊ^ø6C¤¦â¸
Ùvs|¨s¹IÌGOÞºªD1TaÌ\\yÊz àP¨2 @t¥»öS%ÚR\0N%Ä+¼63ÖæAÄ~º)\"`A»KÂs\$¸6±f=Øt»¯ä<Ã&¿bX]áðVEÜ¸'Ø÷8D'ÉséR¾Y]%ÝáÏßvÍ÷êÒÏ°þ{L­â®¦\r äËI6Q0DÑÈ]ÌµGMyôÁvùc í6X (ibRYÃ¤HQ|#H«ÈS?\"4BÁ)
  o\rkÀ@eóB£¨áÊ%
r'üE&ÅHóÑ8ã V	Ò\0EB§U*¬9@W| à
ÅC\"kDÇY+-f¬õ¢´Öª×[+n!­åÀ¸ /¼7èc\"îÃF±X/`-ýa9Òº®\$0D¯æ\0Àe]1 7:4W\0RDFêÐÄ¿56eú@¨)'ùK)f,å ´¢Ö[Ým-È·×\nã\\®!àç!rðÉÈr+òqÌ`\\\$È3SÊB¼Ñ,e¤_£A
«MI°ö\"qZ)ÐreCc3Ç,5è4s´\$!6ÂH¡¡4üßÀåãOs)Ú%éÑ¢3gH»KêÕÎH4@PLÓé¡ùú!#JAYòbLÍP£nbÎ\"XÁ£|A
:Äè¢%\n(¥X*ýI¡Z\0.ås\nx±WÑ>¢^a0+ÊQ§Kù-MÒBXx
²90\"hMæÂÕ \"QgP§%©BTsg D¦ÐS!Ì'àæ3,ÍYä'¢ÝPªK1b ¤Péâq&Í5ãÐé¢Ë\0Â  R¢\\\0ßÄÙC¥/U3±Äq\\UrMË¨zÛUëÐ¨¨M¤ù5\0B0T\nì2Pó 	àÞ×ñÈ¡T8åQ5&GÕr% ¾b4ZÑ@(JU	á8P T *í\0B`E¼LéÒ¤\$hç&d¸G¹ÄØoóq8]9¨ÉA1<è3ªNÈ¨»:ÂàEà0)ß¸<\$eÿÁlìOÃÛH­ü\$eVv/EÞü4xÈâA\nÝc²øÒ\$0\"Ä\0æ¥ÂÕ]aI¸ÕTú¶(E\n5:¢4JýÄLÈY>ÈÁ`aUõ1º×`X%W~¢«aDh0dW\$I*Õ©ÝÃØN\\,°ªz|ÈDÆÊ°)¢©\nf8_ëÐZ\n&¶Ð^h¤9
Ð#¡^È0\rpBé¨x
8¸
W)E='}¨uSª}PÑ x
âB~´ô^5¶»|±xºk¯¼è±m KÞ\$zh. #qÕ¢\0 ·*1ñ^VRØm!RûÉÁ|ùQTxA+1àY¡B#	tõ2DRí0@ÂZÅÜ;Fô\$/Eéâý×Õ|\$](»\nzOmÎm\$8 l#;n­Ï®ÝLÚpíÐàÐ¶ÝxÙAosÙ9ãÄÉXð\$ÇDÑ¢N Óh/uÈ ¬G,(\rÇPÜÏRqÜÁwY&)í`]mÔ ¹]y¢/TtÃvÝ>ÄÈÒ¡ø)¢áá\"0`Ì-HrÃ¤A§±SÍÙ8®¼¦iãÀKY¥4æ%NXcs»9½ÕW>ð,¹><½äõ%tK ðº\nÙaÍL\"ü[·¶WÂù(=sOV Vµ,Ôx(?;­Fõv]`ô_K~<©.-=Á)±]¡t;ò÷53ô~ÎÒ¤q¿n>>ï)|ÝðX¿åSÀ/ÆïãÇý\"[â=³ úÞÓåL¿þÕÎ/áyÿâ]¯üèÚ	j#Ô¾¸Æ¯¶t\rÏ¼þ»ã}ÿ¸íÌ\$¹ë¢ºajájvÓ«©\0Ï¨Ä°\0 Ñí\"Æ!ÊCÒP5\"©UÁ%án3Êê¢OzõÎìÒ¬b·:ên§#\\Ñm7¢>.{_â¨ÃhÓpÓË«p2ËãÄÃH4Í21D½¤ªûhc&6OP\0	°Ïª6oÂÄ°¨ÏÐ¬¹ÏìþQL9\rxm!m\0ÏÑ\r-}\rÐÖªðÚMz×ðØpä`a,Åæ&w!:!ÁÌæºÂÎ'éæ7b¨ÿìÖþMu\r²\"¦ ðáÁ[Ì\\nÉ!aÊk-lÒárUÂ~*.ØJßF¹EòUãq*¨GGæùP°Æ#-A/P×LcñìcÑ}ÃÁÏÌúïÄ±/]pÍfÔM²Ôv\rQeOMk0éq²Õ-JÄ±ÓÚIdIð÷ãÀdlGºdì0ñ°ôAî£,	Ð\r\0Ê1­t)¡ÇãFz!DííæC@Þi`P@R³I¢DJìécÄaz#pkA\n. C0²Bé&5ÎøíABA1OøßdN gÌ\r'Ã¢9í¢'ã\\jD¤2ÐDâM*\0\0ª\n p8¤¦. ê®Â8if\n`åäKÆ+Ð`k¬ëã0ñö8®ÂÕÇ\0rªì°Snäf/ªbÍ(ô)ªÔA:3\nur.§r¯hoåD,ïïáÐ¡Á3*%¬¾äÁlåHLö-o»W!cÖò'­±PÀÐ	¼v!Ìl¦Î%Íó\r/¿¢0÷fq§7êvè¡,\"î6ªÅâ\nÀÂ`ê Úø¢è\0·ÓZôjîÒF2Ý<ARës&z/3, £¤&,G=lC4eîÁÐgYD#!\$×\\*áÌº î/À";break;}$zi=array();foreach(explode("\n",lzw_decompress($g))as$X)$zi[]=(strpos($X,"\t")?explode("\t",$X):$X);return$zi;}if(!$zi){$zi=get_translations($ca);$_SESSION["translations"]=$zi;}if(extension_loaded('pdo')){class
Min_PDO
extends
PDO{var$_result,$server_info,$affected_rows,$errno,$error;function
__construct(){global$b;$jg=array_search("SQL",$b->operators);if($jg!==false)unset($b->operators[$jg]);}function
dsn($nc,$V,$E,$Cf=array()){try{parent::__construct($nc,$V,$E,$Cf);}catch(Exception$Ec){auth_error(h($Ec->getMessage()));}$this->setAttribute(13,array('Min_PDOStatement'));$this->server_info=@$this->getAttribute(4);}function
query($F,$Hi=false){$G=parent::query($F);$this->error="";if(!$G){list(,$this->errno,$this->error)=$this->errorInfo();if(!$this->error)$this->error=lang(21);return
false;}$this->store_result($G);return$G;}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result($G=null){if(!$G){$G=$this->_result;if(!$G)return
false;}if($G->columnCount()){$G->num_rows=$G->rowCount();return$G;}$this->affected_rows=$G->rowCount();return
true;}function
next_result(){if(!$this->_result)return
false;$this->_result->_offset=0;return@$this->_result->nextRowset();}function
result($F,$o=0){$G=$this->query($F);if(!$G)return
false;$I=$G->fetch();return$I[$o];}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(2);}function
fetch_row(){return$this->fetch(3);}function
fetch_field(){$I=(object)$this->getColumnMeta($this->_offset++);$I->orgtable=$I->table;$I->orgname=$I->name;$I->charsetnr=(in_array("blob",(array)$I->flags)?63:0);return$I;}}}$ic=array();class
Min_SQL{var$_conn;function
__construct($h){$this->_conn=$h;}function
select($Q,$K,$Z,$rd,$Ef=array(),$z=1,$D=0,$rg=false){global$b,$x;$ce=(count($rd)<count($K));$F=$b->selectQueryBuild($K,$Z,$rd,$Ef,$z,$D);if(!$F)$F="SELECT".limit(($_GET["page"]!="last"&&$z!=""&&$rd&&$ce&&$x=="sql"?"SQL_CALC_FOUND_ROWS ":"").implode(", ",$K)."\nFROM ".table($Q),($Z?"\nWHERE ".implode(" AND ",$Z):"").($rd&&$ce?"\nGROUP BY ".implode(", ",$rd):"").($Ef?"\nORDER BY ".implode(", ",$Ef):""),($z!=""?+$z:null),($D?$z*$D:0),"\n");$Ih=microtime(true);$H=$this->_conn->query($F);if($rg)echo$b->selectQuery($F,$Ih,!$H);return$H;}function
delete($Q,$Ag,$z=0){$F="FROM ".table($Q);return
queries("DELETE".($z?limit1($Q,$F,$Ag):" $F$Ag"));}function
update($Q,$N,$Ag,$z=0,$L="\n"){$aj=array();foreach($N
as$y=>$X)$aj[]="$y = $X";$F=table($Q)." SET$L".implode(",$L",$aj);return
queries("UPDATE".($z?limit1($Q,$F,$Ag,$L):" $F$Ag"));}function
insert($Q,$N){return
queries("INSERT INTO ".table($Q).($N?" (".implode(", ",array_keys($N)).")\nVALUES (".implode(", ",$N).")":" DEFAULT VALUES"));}function
insertUpdate($Q,$J,$pg){return
false;}function
begin(){return
queries("BEGIN");}function
commit(){return
queries("COMMIT");}function
rollback(){return
queries("ROLLBACK");}function
slowQuery($F,$ki){}function
convertSearch($u,$X,$o){return$u;}function
value($X,$o){return(method_exists($this->_conn,'value')?$this->_conn->value($X,$o):(is_resource($X)?stream_get_contents($X):$X));}function
quoteBinary($dh){return
q($dh);}function
warnings(){return'';}function
tableHelp($B){}}$ic["sqlite"]="SQLite 3";$ic["sqlite2"]="SQLite 2";if(isset($_GET["sqlite"])||isset($_GET["sqlite2"])){$mg=array((isset($_GET["sqlite"])?"SQLite3":"SQLite"),"PDO_SQLite");define("DRIVER",(isset($_GET["sqlite"])?"sqlite":"sqlite2"));if(class_exists(isset($_GET["sqlite"])?"SQLite3":"SQLiteDatabase")){if(isset($_GET["sqlite"])){class
Min_SQLite{var$extension="SQLite3",$server_info,$affected_rows,$errno,$error,$_link;function
__construct($Yc){$this->_link=new
SQLite3($Yc);$dj=$this->_link->version();$this->server_info=$dj["versionString"];}function
query($F){$G=@$this->_link->query($F);$this->error="";if(!$G){$this->errno=$this->_link->lastErrorCode();$this->error=$this->_link->lastErrorMsg();return
false;}elseif($G->numColumns())return
new
Min_Result($G);$this->affected_rows=$this->_link->changes();return
true;}function
quote($P){return(is_utf8($P)?"'".$this->_link->escapeString($P)."'":"x'".reset(unpack('H*',$P))."'");}function
store_result(){return$this->_result;}function
result($F,$o=0){$G=$this->query($F);if(!is_object($G))return
false;$I=$G->_result->fetchArray();return$I[$o];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($G){$this->_result=$G;}function
fetch_assoc(){return$this->_result->fetchArray(SQLITE3_ASSOC);}function
fetch_row(){return$this->_result->fetchArray(SQLITE3_NUM);}function
fetch_field(){$e=$this->_offset++;$T=$this->_result->columnType($e);return(object)array("name"=>$this->_result->columnName($e),"type"=>$T,"charsetnr"=>($T==SQLITE3_BLOB?63:0),);}function
__desctruct(){return$this->_result->finalize();}}}else{class
Min_SQLite{var$extension="SQLite",$server_info,$affected_rows,$error,$_link;function
__construct($Yc){$this->server_info=sqlite_libversion();$this->_link=new
SQLiteDatabase($Yc);}function
query($F,$Hi=false){$We=($Hi?"unbufferedQuery":"query");$G=@$this->_link->$We($F,SQLITE_BOTH,$n);$this->error="";if(!$G){$this->error=$n;return
false;}elseif($G===true){$this->affected_rows=$this->changes();return
true;}return
new
Min_Result($G);}function
quote($P){return"'".sqlite_escape_string($P)."'";}function
store_result(){return$this->_result;}function
result($F,$o=0){$G=$this->query($F);if(!is_object($G))return
false;$I=$G->_result->fetch();return$I[$o];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($G){$this->_result=$G;if(method_exists($G,'numRows'))$this->num_rows=$G->numRows();}function
fetch_assoc(){$I=$this->_result->fetch(SQLITE_ASSOC);if(!$I)return
false;$H=array();foreach($I
as$y=>$X)$H[($y[0]=='"'?idf_unescape($y):$y)]=$X;return$H;}function
fetch_row(){return$this->_result->fetch(SQLITE_NUM);}function
fetch_field(){$B=$this->_result->fieldName($this->_offset++);$fg='(\[.*]|"(?:[^"]|"")*"|(.+))';if(preg_match("~^($fg\\.)?$fg\$~",$B,$A)){$Q=($A[3]!=""?$A[3]:idf_unescape($A[2]));$B=($A[5]!=""?$A[5]:idf_unescape($A[4]));}return(object)array("name"=>$B,"orgname"=>$B,"orgtable"=>$Q,);}}}}elseif(extension_loaded("pdo_sqlite")){class
Min_SQLite
extends
Min_PDO{var$extension="PDO_SQLite";function
__construct($Yc){$this->dsn(DRIVER.":$Yc","","");}}}if(class_exists("Min_SQLite")){class
Min_DB
extends
Min_SQLite{function
__construct(){parent::__construct(":memory:");$this->query("PRAGMA foreign_keys = 1");}function
select_db($Yc){if(is_readable($Yc)&&$this->query("ATTACH ".$this->quote(preg_match("~(^[/\\\\]|:)~",$Yc)?$Yc:dirname($_SERVER["SCRIPT_FILENAME"])."/$Yc")." AS a")){parent::__construct($Yc);$this->query("PRAGMA foreign_keys = 1");return
true;}return
false;}function
multi_query($F){return$this->_result=$this->query($F);}function
next_result(){return
false;}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$J,$pg){$aj=array();foreach($J
as$N)$aj[]="(".implode(", ",$N).")";return
queries("REPLACE INTO ".table($Q)." (".implode(", ",array_keys(reset($J))).") VALUES\n".implode(",\n",$aj));}function
tableHelp($B){if($B=="sqlite_sequence")return"fileformat2.html#seqtab";if($B=="sqlite_master")return"fileformat2.html#$B";}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b;list(,,$E)=$b->credentials();if($E!="")return
lang(22);return
new
Min_DB;}function
get_databases(){return
array();}function
limit($F,$Z,$z,$C=0,$L=" "){return" $F$Z".($z!==null?$L."LIMIT $z".($C?" OFFSET $C":""):"");}function
limit1($Q,$F,$Z,$L="\n"){global$h;return(preg_match('~^INTO~',$F)||$h->result("SELECT sqlite_compileoption_used('ENABLE_UPDATE_DELETE_LIMIT')")?limit($F,$Z,1,0,$L):" $F WHERE rowid = (SELECT rowid FROM ".table($Q).$Z.$L."LIMIT 1)");}function
db_collation($l,$qb){global$h;return$h->result("PRAGMA encoding");}function
engines(){return
array();}function
logged_user(){return
get_current_user();}function
tables_list(){return
get_key_vals("SELECT name, type FROM sqlite_master WHERE type IN ('table', 'view') ORDER BY (name = 'sqlite_sequence'), name");}function
count_tables($k){return
array();}function
table_status($B=""){global$h;$H=array();foreach(get_rows("SELECT name AS Name, type AS Engine, 'rowid' AS Oid, '' AS Auto_increment FROM sqlite_master WHERE type IN ('table', 'view') ".($B!=""?"AND name = ".q($B):"ORDER BY name"))as$I){$I["Rows"]=$h->result("SELECT COUNT(*) FROM ".idf_escape($I["Name"]));$H[$I["Name"]]=$I;}foreach(get_rows("SELECT * FROM sqlite_sequence",null,"")as$I)$H[$I["name"]]["Auto_increment"]=$I["seq"];return($B!=""?$H[$B]:$H);}function
is_view($R){return$R["Engine"]=="view";}function
fk_support($R){global$h;return!$h->result("SELECT sqlite_compileoption_used('OMIT_FOREIGN_KEY')");}function
fields($Q){global$h;$H=array();$pg="";foreach(get_rows("PRAGMA table_info(".table($Q).")")as$I){$B=$I["name"];$T=strtolower($I["type"]);$Wb=$I["dflt_value"];$H[$B]=array("field"=>$B,"type"=>(preg_match('~int~i',$T)?"integer":(preg_match('~char|clob|text~i',$T)?"text":(preg_match('~blob~i',$T)?"blob":(preg_match('~real|floa|doub~i',$T)?"real":"numeric")))),"full_type"=>$T,"default"=>(preg_match("~'(.*)'~",$Wb,$A)?str_replace("''","'",$A[1]):($Wb=="NULL"?null:$Wb)),"null"=>!$I["notnull"],"privileges"=>array("select"=>1,"insert"=>1,"update"=>1),"primary"=>$I["pk"],);if($I["pk"]){if($pg!="")$H[$pg]["auto_increment"]=false;elseif(preg_match('~^integer$~i',$T))$H[$B]["auto_increment"]=true;$pg=$B;}}$Dh=$h->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($Q));preg_match_all('~(("[^"]*+")+|[a-z0-9_]+)\s+text\s+COLLATE\s+(\'[^\']+\'|\S+)~i',$Dh,$Ie,PREG_SET_ORDER);foreach($Ie
as$A){$B=str_replace('""','"',preg_replace('~^"|"$~','',$A[1]));if($H[$B])$H[$B]["collation"]=trim($A[3],"'");}return$H;}function
indexes($Q,$i=null){global$h;if(!is_object($i))$i=$h;$H=array();$Dh=$i->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($Q));if(preg_match('~\bPRIMARY\s+KEY\s*\((([^)"]+|"[^"]*"|`[^`]*`)++)~i',$Dh,$A)){$H[""]=array("type"=>"PRIMARY","columns"=>array(),"lengths"=>array(),"descs"=>array());preg_match_all('~((("[^"]*+")+|(?:`[^`]*+`)+)|(\S+))(\s+(ASC|DESC))?(,\s*|$)~i',$A[1],$Ie,PREG_SET_ORDER);foreach($Ie
as$A){$H[""]["columns"][]=idf_unescape($A[2]).$A[4];$H[""]["descs"][]=(preg_match('~DESC~i',$A[5])?'1':null);}}if(!$H){foreach(fields($Q)as$B=>$o){if($o["primary"])$H[""]=array("type"=>"PRIMARY","columns"=>array($B),"lengths"=>array(),"descs"=>array(null));}}$Gh=get_key_vals("SELECT name, sql FROM sqlite_master WHERE type = 'index' AND tbl_name = ".q($Q),$i);foreach(get_rows("PRAGMA index_list(".table($Q).")",$i)as$I){$B=$I["name"];$v=array("type"=>($I["unique"]?"UNIQUE":"INDEX"));$v["lengths"]=array();$v["descs"]=array();foreach(get_rows("PRAGMA index_info(".idf_escape($B).")",$i)as$ch){$v["columns"][]=$ch["name"];$v["descs"][]=null;}if(preg_match('~^CREATE( UNIQUE)? INDEX '.preg_quote(idf_escape($B).' ON '.idf_escape($Q),'~').' \((.*)\)$~i',$Gh[$B],$Mg)){preg_match_all('/("[^"]*+")+( DESC)?/',$Mg[2],$Ie);foreach($Ie[2]as$y=>$X){if($X)$v["descs"][$y]='1';}}if(!$H[""]||$v["type"]!="UNIQUE"||$v["columns"]!=$H[""]["columns"]||$v["descs"]!=$H[""]["descs"]||!preg_match("~^sqlite_~",$B))$H[$B]=$v;}return$H;}function
foreign_keys($Q){$H=array();foreach(get_rows("PRAGMA foreign_key_list(".table($Q).")")as$I){$q=&$H[$I["id"]];if(!$q)$q=$I;$q["source"][]=$I["from"];$q["target"][]=$I["to"];}return$H;}function
view($B){global$h;return
array("select"=>preg_replace('~^(?:[^`"[]+|`[^`]*`|"[^"]*")* AS\s+~iU','',$h->result("SELECT sql FROM sqlite_master WHERE name = ".q($B))));}function
collations(){return(isset($_GET["create"])?get_vals("PRAGMA collation_list",1):array());}function
information_schema($l){return
false;}function
error(){global$h;return
h($h->error);}function
check_sqlite_name($B){global$h;$Oc="db|sdb|sqlite";if(!preg_match("~^[^\\0]*\\.($Oc)\$~",$B)){$h->error=lang(23,str_replace("|",", ",$Oc));return
false;}return
true;}function
create_database($l,$d){global$h;if(file_exists($l)){$h->error=lang(24);return
false;}if(!check_sqlite_name($l))return
false;try{$_=new
Min_SQLite($l);}catch(Exception$Ec){$h->error=$Ec->getMessage();return
false;}$_->query('PRAGMA encoding = "UTF-8"');$_->query('CREATE TABLE adminer (i)');$_->query('DROP TABLE adminer');return
true;}function
drop_databases($k){global$h;$h->__construct(":memory:");foreach($k
as$l){if(!@unlink($l)){$h->error=lang(24);return
false;}}return
true;}function
rename_database($B,$d){global$h;if(!check_sqlite_name($B))return
false;$h->__construct(":memory:");$h->error=lang(24);return@rename(DB,$B);}function
auto_increment(){return" PRIMARY KEY".(DRIVER=="sqlite"?" AUTOINCREMENT":"");}function
alter_table($Q,$B,$p,$gd,$vb,$yc,$d,$Na,$Zf){global$h;$Ti=($Q==""||$gd);foreach($p
as$o){if($o[0]!=""||!$o[1]||$o[2]){$Ti=true;break;}}$c=array();$Nf=array();foreach($p
as$o){if($o[1]){$c[]=($Ti?$o[1]:"ADD ".implode($o[1]));if($o[0]!="")$Nf[$o[0]]=$o[1][0];}}if(!$Ti){foreach($c
as$X){if(!queries("ALTER TABLE ".table($Q)." $X"))return
false;}if($Q!=$B&&!queries("ALTER TABLE ".table($Q)." RENAME TO ".table($B)))return
false;}elseif(!recreate_table($Q,$B,$c,$Nf,$gd,$Na))return
false;if($Na){queries("BEGIN");queries("UPDATE sqlite_sequence SET seq = $Na WHERE name = ".q($B));if(!$h->affected_rows)queries("INSERT INTO sqlite_sequence (name, seq) VALUES (".q($B).", $Na)");queries("COMMIT");}return
true;}function
recreate_table($Q,$B,$p,$Nf,$gd,$Na,$w=array()){global$h;if($Q!=""){if(!$p){foreach(fields($Q)as$y=>$o){if($w)$o["auto_increment"]=0;$p[]=process_field($o,$o);$Nf[$y]=idf_escape($y);}}$qg=false;foreach($p
as$o){if($o[6])$qg=true;}$lc=array();foreach($w
as$y=>$X){if($X[2]=="DROP"){$lc[$X[1]]=true;unset($w[$y]);}}foreach(indexes($Q)as$ke=>$v){$f=array();foreach($v["columns"]as$y=>$e){if(!$Nf[$e])continue
2;$f[]=$Nf[$e].($v["descs"][$y]?" DESC":"");}if(!$lc[$ke]){if($v["type"]!="PRIMARY"||!$qg)$w[]=array($v["type"],$ke,$f);}}foreach($w
as$y=>$X){if($X[0]=="PRIMARY"){unset($w[$y]);$gd[]="  PRIMARY KEY (".implode(", ",$X[2]).")";}}foreach(foreign_keys($Q)as$ke=>$q){foreach($q["source"]as$y=>$e){if(!$Nf[$e])continue
2;$q["source"][$y]=idf_unescape($Nf[$e]);}if(!isset($gd[" $ke"]))$gd[]=" ".format_foreign_key($q);}queries("BEGIN");}foreach($p
as$y=>$o)$p[$y]="  ".implode($o);$p=array_merge($p,array_filter($gd));$ei=($Q==$B?"adminer_$B":$B);if(!queries("CREATE TABLE ".table($ei)." (\n".implode(",\n",$p)."\n)"))return
false;if($Q!=""){if($Nf&&!queries("INSERT INTO ".table($ei)." (".implode(", ",$Nf).") SELECT ".implode(", ",array_map('idf_escape',array_keys($Nf)))." FROM ".table($Q)))return
false;$Ei=array();foreach(triggers($Q)as$Ci=>$li){$Bi=trigger($Ci);$Ei[]="CREATE TRIGGER ".idf_escape($Ci)." ".implode(" ",$li)." ON ".table($B)."\n$Bi[Statement]";}$Na=$Na?0:$h->result("SELECT seq FROM sqlite_sequence WHERE name = ".q($Q));if(!queries("DROP TABLE ".table($Q))||($Q==$B&&!queries("ALTER TABLE ".table($ei)." RENAME TO ".table($B)))||!alter_indexes($B,$w))return
false;if($Na)queries("UPDATE sqlite_sequence SET seq = $Na WHERE name = ".q($B));foreach($Ei
as$Bi){if(!queries($Bi))return
false;}queries("COMMIT");}return
true;}function
index_sql($Q,$T,$B,$f){return"CREATE $T ".($T!="INDEX"?"INDEX ":"").idf_escape($B!=""?$B:uniqid($Q."_"))." ON ".table($Q)." $f";}function
alter_indexes($Q,$c){foreach($c
as$pg){if($pg[0]=="PRIMARY")return
recreate_table($Q,$Q,array(),array(),array(),0,$c);}foreach(array_reverse($c)as$X){if(!queries($X[2]=="DROP"?"DROP INDEX ".idf_escape($X[1]):index_sql($Q,$X[0],$X[1],"(".implode(", ",$X[2]).")")))return
false;}return
true;}function
truncate_tables($S){return
apply_queries("DELETE FROM",$S);}function
drop_views($fj){return
apply_queries("DROP VIEW",$fj);}function
drop_tables($S){return
apply_queries("DROP TABLE",$S);}function
move_tables($S,$fj,$ci){return
false;}function
trigger($B){global$h;if($B=="")return
array("Statement"=>"BEGIN\n\t;\nEND");$u='(?:[^`"\s]+|`[^`]*`|"[^"]*")+';$Di=trigger_options();preg_match("~^CREATE\\s+TRIGGER\\s*$u\\s*(".implode("|",$Di["Timing"]).")\\s+([a-z]+)(?:\\s+OF\\s+($u))?\\s+ON\\s*$u\\s*(?:FOR\\s+EACH\\s+ROW\\s)?(.*)~is",$h->result("SELECT sql FROM sqlite_master WHERE type = 'trigger' AND name = ".q($B)),$A);$of=$A[3];return
array("Timing"=>strtoupper($A[1]),"Event"=>strtoupper($A[2]).($of?" OF":""),"Of"=>($of[0]=='`'||$of[0]=='"'?idf_unescape($of):$of),"Trigger"=>$B,"Statement"=>$A[4],);}function
triggers($Q){$H=array();$Di=trigger_options();foreach(get_rows("SELECT * FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($Q))as$I){preg_match('~^CREATE\s+TRIGGER\s*(?:[^`"\s]+|`[^`]*`|"[^"]*")+\s*('.implode("|",$Di["Timing"]).')\s*(.*?)\s+ON\b~i',$I["sql"],$A);$H[$I["name"]]=array($A[1],$A[2]);}return$H;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","UPDATE OF","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
begin(){return
queries("BEGIN");}function
last_id(){global$h;return$h->result("SELECT LAST_INSERT_ROWID()");}function
explain($h,$F){return$h->query("EXPLAIN QUERY PLAN $F");}function
found_rows($R,$Z){}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($gh){return
true;}function
create_sql($Q,$Na,$Nh){global$h;$H=$h->result("SELECT sql FROM sqlite_master WHERE type IN ('table', 'view') AND name = ".q($Q));foreach(indexes($Q)as$B=>$v){if($B=='')continue;$H.=";\n\n".index_sql($Q,$v['type'],$B,"(".implode(", ",array_map('idf_escape',$v['columns'])).")");}return$H;}function
truncate_sql($Q){return"DELETE FROM ".table($Q);}function
use_sql($j){}function
trigger_sql($Q){return
implode(get_vals("SELECT sql || ';;\n' FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($Q)));}function
show_variables(){global$h;$H=array();foreach(array("auto_vacuum","cache_size","count_changes","default_cache_size","empty_result_callbacks","encoding","foreign_keys","full_column_names","fullfsync","journal_mode","journal_size_limit","legacy_file_format","locking_mode","page_size","max_page_count","read_uncommitted","recursive_triggers","reverse_unordered_selects","secure_delete","short_column_names","synchronous","temp_store","temp_store_directory","schema_version","integrity_check","quick_check")as$y)$H[$y]=$h->result("PRAGMA $y");return$H;}function
show_status(){$H=array();foreach(get_vals("PRAGMA compile_options")as$Bf){list($y,$X)=explode("=",$Bf,2);$H[$y]=$X;}return$H;}function
convert_field($o){}function
unconvert_field($o,$H){return$H;}function
support($Tc){return
preg_match('~^(columns|database|drop_col|dump|indexes|descidx|move_col|sql|status|table|trigger|variables|view|view_trigger)$~',$Tc);}$x="sqlite";$U=array("integer"=>0,"real"=>0,"numeric"=>0,"text"=>0,"blob"=>0);$Mh=array_keys($U);$Ni=array();$_f=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL");$od=array("hex","length","lower","round","unixepoch","upper");$ud=array("avg","count","count distinct","group_concat","max","min","sum");$qc=array(array(),array("integer|real|numeric"=>"+/-","text"=>"||",));}$ic["pgsql"]="PostgreSQL";if(isset($_GET["pgsql"])){$mg=array("PgSQL","PDO_PgSQL");define("DRIVER","pgsql");if(extension_loaded("pgsql")){class
Min_DB{var$extension="PgSQL",$_link,$_result,$_string,$_database=true,$server_info,$affected_rows,$error,$timeout;function
_error($Ac,$n){if(ini_bool("html_errors"))$n=html_entity_decode(strip_tags($n));$n=preg_replace('~^[^:]*: ~','',$n);$this->error=$n;}function
connect($M,$V,$E){global$b;$l=$b->database();set_error_handler(array($this,'_error'));$this->_string="host='".str_replace(":","' port='",addcslashes($M,"'\\"))."' user='".addcslashes($V,"'\\")."' password='".addcslashes($E,"'\\")."'";$this->_link=@pg_connect("$this->_string dbname='".($l!=""?addcslashes($l,"'\\"):"postgres")."'",PGSQL_CONNECT_FORCE_NEW);if(!$this->_link&&$l!=""){$this->_database=false;$this->_link=@pg_connect("$this->_string dbname='postgres'",PGSQL_CONNECT_FORCE_NEW);}restore_error_handler();if($this->_link){$dj=pg_version($this->_link);$this->server_info=$dj["server"];pg_set_client_encoding($this->_link,"UTF8");}return(bool)$this->_link;}function
quote($P){return"'".pg_escape_string($this->_link,$P)."'";}function
value($X,$o){return($o["type"]=="bytea"?pg_unescape_bytea($X):$X);}function
quoteBinary($P){return"'".pg_escape_bytea($this->_link,$P)."'";}function
select_db($j){global$b;if($j==$b->database())return$this->_database;$H=@pg_connect("$this->_string dbname='".addcslashes($j,"'\\")."'",PGSQL_CONNECT_FORCE_NEW);if($H)$this->_link=$H;return$H;}function
close(){$this->_link=@pg_connect("$this->_string dbname='postgres'");}function
query($F,$Hi=false){$G=@pg_query($this->_link,$F);$this->error="";if(!$G){$this->error=pg_last_error($this->_link);$H=false;}elseif(!pg_num_fields($G)){$this->affected_rows=pg_affected_rows($G);$H=true;}else$H=new
Min_Result($G);if($this->timeout){$this->timeout=0;$this->query("RESET statement_timeout");}return$H;}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($F,$o=0){$G=$this->query($F);if(!$G||!$G->num_rows)return
false;return
pg_fetch_result($G->_result,0,$o);}function
warnings(){return
h(pg_last_notice($this->_link));}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($G){$this->_result=$G;$this->num_rows=pg_num_rows($G);}function
fetch_assoc(){return
pg_fetch_assoc($this->_result);}function
fetch_row(){return
pg_fetch_row($this->_result);}function
fetch_field(){$e=$this->_offset++;$H=new
stdClass;if(function_exists('pg_field_table'))$H->orgtable=pg_field_table($this->_result,$e);$H->name=pg_field_name($this->_result,$e);$H->orgname=$H->name;$H->type=pg_field_type($this->_result,$e);$H->charsetnr=($H->type=="bytea"?63:0);return$H;}function
__destruct(){pg_free_result($this->_result);}}}elseif(extension_loaded("pdo_pgsql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_PgSQL",$timeout;function
connect($M,$V,$E){global$b;$l=$b->database();$P="pgsql:host='".str_replace(":","' port='",addcslashes($M,"'\\"))."' options='-c client_encoding=utf8'";$this->dsn("$P dbname='".($l!=""?addcslashes($l,"'\\"):"postgres")."'",$V,$E);return
true;}function
select_db($j){global$b;return($b->database()==$j);}function
quoteBinary($dh){return
q($dh);}function
query($F,$Hi=false){$H=parent::query($F,$Hi);if($this->timeout){$this->timeout=0;parent::query("RESET statement_timeout");}return$H;}function
warnings(){return'';}function
close(){}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$J,$pg){global$h;foreach($J
as$N){$Oi=array();$Z=array();foreach($N
as$y=>$X){$Oi[]="$y = $X";if(isset($pg[idf_unescape($y)]))$Z[]="$y = $X";}if(!(($Z&&queries("UPDATE ".table($Q)." SET ".implode(", ",$Oi)." WHERE ".implode(" AND ",$Z))&&$h->affected_rows)||queries("INSERT INTO ".table($Q)." (".implode(", ",array_keys($N)).") VALUES (".implode(", ",$N).")")))return
false;}return
true;}function
slowQuery($F,$ki){$this->_conn->query("SET statement_timeout = ".(1000*$ki));$this->_conn->timeout=1000*$ki;return$F;}function
convertSearch($u,$X,$o){return(preg_match('~char|text'.(!preg_match('~LIKE~',$X["op"])?'|date|time(stamp)?|boolean|uuid|'.number_type():'').'~',$o["type"])?$u:"CAST($u AS text)");}function
quoteBinary($dh){return$this->_conn->quoteBinary($dh);}function
warnings(){return$this->_conn->warnings();}function
tableHelp($B){$Ae=array("information_schema"=>"infoschema","pg_catalog"=>"catalog",);$_=$Ae[$_GET["ns"]];if($_)return"$_-".str_replace("_","-",$B).".html";}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b,$U,$Mh;$h=new
Min_DB;$Kb=$b->credentials();if($h->connect($Kb[0],$Kb[1],$Kb[2])){if(min_version(9,0,$h)){$h->query("SET application_name = 'Adminer'");if(min_version(9.2,0,$h)){$Mh[lang(25)][]="json";$U["json"]=4294967295;if(min_version(9.4,0,$h)){$Mh[lang(25)][]="jsonb";$U["jsonb"]=4294967295;}}}return$h;}return$h->error;}function
get_databases(){return
get_vals("SELECT datname FROM pg_database WHERE has_database_privilege(datname, 'CONNECT') ORDER BY datname");}function
limit($F,$Z,$z,$C=0,$L=" "){return" $F$Z".($z!==null?$L."LIMIT $z".($C?" OFFSET $C":""):"");}function
limit1($Q,$F,$Z,$L="\n"){return(preg_match('~^INTO~',$F)?limit($F,$Z,1,0,$L):" $F".(is_view(table_status1($Q))?$Z:" WHERE ctid = (SELECT ctid FROM ".table($Q).$Z.$L."LIMIT 1)"));}function
db_collation($l,$qb){global$h;return$h->result("SHOW LC_COLLATE");}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT user");}function
tables_list(){$F="SELECT table_name, table_type FROM information_schema.tables WHERE table_schema = current_schema()";if(support('materializedview'))$F.="
UNION ALL
SELECT matviewname, 'MATERIALIZED VIEW'
FROM pg_matviews
WHERE schemaname = current_schema()";$F.="
ORDER BY 1";return
get_key_vals($F);}function
count_tables($k){return
array();}function
table_status($B=""){$H=array();foreach(get_rows("SELECT c.relname AS \"Name\", CASE c.relkind WHEN 'r' THEN 'table' WHEN 'm' THEN 'materialized view' ELSE 'view' END AS \"Engine\", pg_relation_size(c.oid) AS \"Data_length\", pg_total_relation_size(c.oid) - pg_relation_size(c.oid) AS \"Index_length\", obj_description(c.oid, 'pg_class') AS \"Comment\", ".(min_version(12)?"''":"CASE WHEN c.relhasoids THEN 'oid' ELSE '' END")." AS \"Oid\", c.reltuples as \"Rows\", n.nspname
FROM pg_class c
JOIN pg_namespace n ON(n.nspname = current_schema() AND n.oid = c.relnamespace)
WHERE relkind IN ('r', 'm', 'v', 'f')
".($B!=""?"AND relname = ".q($B):"ORDER BY relname"))as$I)$H[$I["Name"]]=$I;return($B!=""?$H[$B]:$H);}function
is_view($R){return
in_array($R["Engine"],array("view","materialized view"));}function
fk_support($R){return
true;}function
fields($Q){$H=array();$Da=array('timestamp without time zone'=>'timestamp','timestamp with time zone'=>'timestamptz',);$Hd=min_version(10)?"(a.attidentity = 'd')::int":'0';foreach(get_rows("SELECT a.attname AS field, format_type(a.atttypid, a.atttypmod) AS full_type, pg_get_expr(d.adbin, d.adrelid) AS default, a.attnotnull::int, col_description(c.oid, a.attnum) AS comment, $Hd AS identity
FROM pg_class c
JOIN pg_namespace n ON c.relnamespace = n.oid
JOIN pg_attribute a ON c.oid = a.attrelid
LEFT JOIN pg_attrdef d ON c.oid = d.adrelid AND a.attnum = d.adnum
WHERE c.relname = ".q($Q)."
AND n.nspname = current_schema()
AND NOT a.attisdropped
AND a.attnum > 0
ORDER BY a.attnum")as$I){preg_match('~([^([]+)(\((.*)\))?([a-z ]+)?((\[[0-9]*])*)$~',$I["full_type"],$A);list(,$T,$ye,$I["length"],$xa,$Ga)=$A;$I["length"].=$Ga;$fb=$T.$xa;if(isset($Da[$fb])){$I["type"]=$Da[$fb];$I["full_type"]=$I["type"].$ye.$Ga;}else{$I["type"]=$T;$I["full_type"]=$I["type"].$ye.$xa.$Ga;}if($I['identity'])$I['default']='GENERATED BY DEFAULT AS IDENTITY';$I["null"]=!$I["attnotnull"];$I["auto_increment"]=$I['identity']||preg_match('~^nextval\(~i',$I["default"]);$I["privileges"]=array("insert"=>1,"select"=>1,"update"=>1);if(preg_match('~(.+)::[^)]+(.*)~',$I["default"],$A))$I["default"]=($A[1]=="NULL"?null:(($A[1][0]=="'"?idf_unescape($A[1]):$A[1]).$A[2]));$H[$I["field"]]=$I;}return$H;}function
indexes($Q,$i=null){global$h;if(!is_object($i))$i=$h;$H=array();$Vh=$i->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($Q));$f=get_key_vals("SELECT attnum, attname FROM pg_attribute WHERE attrelid = $Vh AND attnum > 0",$i);foreach(get_rows("SELECT relname, indisunique::int, indisprimary::int, indkey, indoption , (indpred IS NOT NULL)::int as indispartial FROM pg_index i, pg_class ci WHERE i.indrelid = $Vh AND ci.oid = i.indexrelid",$i)as$I){$Ng=$I["relname"];$H[$Ng]["type"]=($I["indispartial"]?"INDEX":($I["indisprimary"]?"PRIMARY":($I["indisunique"]?"UNIQUE":"INDEX")));$H[$Ng]["columns"]=array();foreach(explode(" ",$I["indkey"])as$Rd)$H[$Ng]["columns"][]=$f[$Rd];$H[$Ng]["descs"]=array();foreach(explode(" ",$I["indoption"])as$Sd)$H[$Ng]["descs"][]=($Sd&1?'1':null);$H[$Ng]["lengths"]=array();}return$H;}function
foreign_keys($Q){global$vf;$H=array();foreach(get_rows("SELECT conname, condeferrable::int AS deferrable, pg_get_constraintdef(oid) AS definition
FROM pg_constraint
WHERE conrelid = (SELECT pc.oid FROM pg_class AS pc INNER JOIN pg_namespace AS pn ON (pn.oid = pc.relnamespace) WHERE pc.relname = ".q($Q)." AND pn.nspname = current_schema())
AND contype = 'f'::char
ORDER BY conkey, conname")as$I){if(preg_match('~FOREIGN KEY\s*\((.+)\)\s*REFERENCES (.+)\((.+)\)(.*)$~iA',$I['definition'],$A)){$I['source']=array_map('trim',explode(',',$A[1]));if(preg_match('~^(("([^"]|"")+"|[^"]+)\.)?"?("([^"]|"")+"|[^"]+)$~',$A[2],$He)){$I['ns']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$He[2]));$I['table']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$He[4]));}$I['target']=array_map('trim',explode(',',$A[3]));$I['on_delete']=(preg_match("~ON DELETE ($vf)~",$A[4],$He)?$He[1]:'NO ACTION');$I['on_update']=(preg_match("~ON UPDATE ($vf)~",$A[4],$He)?$He[1]:'NO ACTION');$H[$I['conname']]=$I;}}return$H;}function
view($B){global$h;return
array("select"=>trim($h->result("SELECT pg_get_viewdef(".$h->result("SELECT oid FROM pg_class WHERE relname = ".q($B)).")")));}function
collations(){return
array();}function
information_schema($l){return($l=="information_schema");}function
error(){global$h;$H=h($h->error);if(preg_match('~^(.*\n)?([^\n]*)\n( *)\^(\n.*)?$~s',$H,$A))$H=$A[1].preg_replace('~((?:[^&]|&[^;]*;){'.strlen($A[3]).'})(.*)~','\1<b>\2</b>',$A[2]).$A[4];return
nl_br($H);}function
create_database($l,$d){return
queries("CREATE DATABASE ".idf_escape($l).($d?" ENCODING ".idf_escape($d):""));}function
drop_databases($k){global$h;$h->close();return
apply_queries("DROP DATABASE",$k,'idf_escape');}function
rename_database($B,$d){return
queries("ALTER DATABASE ".idf_escape(DB)." RENAME TO ".idf_escape($B));}function
auto_increment(){return"";}function
alter_table($Q,$B,$p,$gd,$vb,$yc,$d,$Na,$Zf){$c=array();$_g=array();if($Q!=""&&$Q!=$B)$_g[]="ALTER TABLE ".table($Q)." RENAME TO ".table($B);foreach($p
as$o){$e=idf_escape($o[0]);$X=$o[1];if(!$X)$c[]="DROP $e";else{$Zi=$X[5];unset($X[5]);if(isset($X[6])&&$o[0]=="")$X[1]=($X[1]=="bigint"?" big":" ")."serial";if($o[0]=="")$c[]=($Q!=""?"ADD ":"  ").implode($X);else{if($e!=$X[0])$_g[]="ALTER TABLE ".table($B)." RENAME $e TO $X[0]";$c[]="ALTER $e TYPE$X[1]";if(!$X[6]){$c[]="ALTER $e ".($X[3]?"SET$X[3]":"DROP DEFAULT");$c[]="ALTER $e ".($X[2]==" NULL"?"DROP NOT":"SET").$X[2];}}if($o[0]!=""||$Zi!="")$_g[]="COMMENT ON COLUMN ".table($B).".$X[0] IS ".($Zi!=""?substr($Zi,9):"''");}}$c=array_merge($c,$gd);if($Q=="")array_unshift($_g,"CREATE TABLE ".table($B)." (\n".implode(",\n",$c)."\n)");elseif($c)array_unshift($_g,"ALTER TABLE ".table($Q)."\n".implode(",\n",$c));if($Q!=""||$vb!="")$_g[]="COMMENT ON TABLE ".table($B)." IS ".q($vb);if($Na!=""){}foreach($_g
as$F){if(!queries($F))return
false;}return
true;}function
alter_indexes($Q,$c){$Hb=array();$jc=array();$_g=array();foreach($c
as$X){if($X[0]!="INDEX")$Hb[]=($X[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($X[1]):"\nADD".($X[1]!=""?" CONSTRAINT ".idf_escape($X[1]):"")." $X[0] ".($X[0]=="PRIMARY"?"KEY ":"")."(".implode(", ",$X[2]).")");elseif($X[2]=="DROP")$jc[]=idf_escape($X[1]);else$_g[]="CREATE INDEX ".idf_escape($X[1]!=""?$X[1]:uniqid($Q."_"))." ON ".table($Q)." (".implode(", ",$X[2]).")";}if($Hb)array_unshift($_g,"ALTER TABLE ".table($Q).implode(",",$Hb));if($jc)array_unshift($_g,"DROP INDEX ".implode(", ",$jc));foreach($_g
as$F){if(!queries($F))return
false;}return
true;}function
truncate_tables($S){return
queries("TRUNCATE ".implode(", ",array_map('table',$S)));return
true;}function
drop_views($fj){return
drop_tables($fj);}function
drop_tables($S){foreach($S
as$Q){$O=table_status($Q);if(!queries("DROP ".strtoupper($O["Engine"])." ".table($Q)))return
false;}return
true;}function
move_tables($S,$fj,$ci){foreach(array_merge($S,$fj)as$Q){$O=table_status($Q);if(!queries("ALTER ".strtoupper($O["Engine"])." ".table($Q)." SET SCHEMA ".idf_escape($ci)))return
false;}return
true;}function
trigger($B,$Q=null){if($B=="")return
array("Statement"=>"EXECUTE PROCEDURE ()");if($Q===null)$Q=$_GET['trigger'];$J=get_rows('SELECT t.trigger_name AS "Trigger", t.action_timing AS "Timing", (SELECT STRING_AGG(event_manipulation, \' OR \') FROM information_schema.triggers WHERE event_object_table = t.event_object_table AND trigger_name = t.trigger_name ) AS "Events", t.event_manipulation AS "Event", \'FOR EACH \' || t.action_orientation AS "Type", t.action_statement AS "Statement" FROM information_schema.triggers t WHERE t.event_object_table = '.q($Q).' AND t.trigger_name = '.q($B));return
reset($J);}function
triggers($Q){$H=array();foreach(get_rows("SELECT * FROM information_schema.triggers WHERE event_object_table = ".q($Q))as$I)$H[$I["trigger_name"]]=array($I["action_timing"],$I["event_manipulation"]);return$H;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW","FOR EACH STATEMENT"),);}function
routine($B,$T){$J=get_rows('SELECT routine_definition AS definition, LOWER(external_language) AS language, *
FROM information_schema.routines
WHERE routine_schema = current_schema() AND specific_name = '.q($B));$H=$J[0];$H["returns"]=array("type"=>$H["type_udt_name"]);$H["fields"]=get_rows('SELECT parameter_name AS field, data_type AS type, character_maximum_length AS length, parameter_mode AS inout
FROM information_schema.parameters
WHERE specific_schema = current_schema() AND specific_name = '.q($B).'
ORDER BY ordinal_position');return$H;}function
routines(){return
get_rows('SELECT specific_name AS "SPECIFIC_NAME", routine_type AS "ROUTINE_TYPE", routine_name AS "ROUTINE_NAME", type_udt_name AS "DTD_IDENTIFIER"
FROM information_schema.routines
WHERE routine_schema = current_schema()
ORDER BY SPECIFIC_NAME');}function
routine_languages(){return
get_vals("SELECT LOWER(lanname) FROM pg_catalog.pg_language");}function
routine_id($B,$I){$H=array();foreach($I["fields"]as$o)$H[]=$o["type"];return
idf_escape($B)."(".implode(", ",$H).")";}function
last_id(){return
0;}function
explain($h,$F){return$h->query("EXPLAIN $F");}function
found_rows($R,$Z){global$h;if(preg_match("~ rows=([0-9]+)~",$h->result("EXPLAIN SELECT * FROM ".idf_escape($R["Name"]).($Z?" WHERE ".implode(" AND ",$Z):"")),$Mg))return$Mg[1];return
false;}function
types(){return
get_vals("SELECT typname
FROM pg_type
WHERE typnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
AND typtype IN ('b','d','e')
AND typelem = 0");}function
schemas(){return
get_vals("SELECT nspname FROM pg_namespace ORDER BY nspname");}function
get_schema(){global$h;return$h->result("SELECT current_schema()");}function
set_schema($fh,$i=null){global$h,$U,$Mh;if(!$i)$i=$h;$H=$i->query("SET search_path TO ".idf_escape($fh));foreach(types()as$T){if(!isset($U[$T])){$U[$T]=0;$Mh[lang(26)][]=$T;}}return$H;}function
create_sql($Q,$Na,$Nh){global$h;$H='';$Vg=array();$ph=array();$O=table_status($Q);if(is_view($O)){$ej=view($Q);return
rtrim("CREATE VIEW ".idf_escape($Q)." AS $ej[select]",";");}$p=fields($Q);$w=indexes($Q);ksort($w);$dd=foreign_keys($Q);ksort($dd);if(!$O||empty($p))return
false;$H="CREATE TABLE ".idf_escape($O['nspname']).".".idf_escape($O['Name'])." (\n    ";foreach($p
as$Vc=>$o){$Wf=idf_escape($o['field']).' '.$o['full_type'].default_value($o).($o['attnotnull']?" NOT NULL":"");$Vg[]=$Wf;if(preg_match('~nextval\(\'([^\']+)\'\)~',$o['default'],$Ie)){$oh=$Ie[1];$Ch=reset(get_rows(min_version(10)?"SELECT *, cache_size AS cache_value FROM pg_sequences WHERE schemaname = current_schema() AND sequencename = ".q($oh):"SELECT * FROM $oh"));$ph[]=($Nh=="DROP+CREATE"?"DROP SEQUENCE IF EXISTS $oh;\n":"")."CREATE SEQUENCE $oh INCREMENT $Ch[increment_by] MINVALUE $Ch[min_value] MAXVALUE $Ch[max_value] START ".($Na?$Ch['last_value']:1)." CACHE $Ch[cache_value];";}}if(!empty($ph))$H=implode("\n\n",$ph)."\n\n$H";foreach($w
as$Md=>$v){switch($v['type']){case'UNIQUE':$Vg[]="CONSTRAINT ".idf_escape($Md)." UNIQUE (".implode(', ',array_map('idf_escape',$v['columns'])).")";break;case'PRIMARY':$Vg[]="CONSTRAINT ".idf_escape($Md)." PRIMARY KEY (".implode(', ',array_map('idf_escape',$v['columns'])).")";break;}}foreach($dd
as$cd=>$bd)$Vg[]="CONSTRAINT ".idf_escape($cd)." $bd[definition] ".($bd['deferrable']?'DEFERRABLE':'NOT DEFERRABLE');$H.=implode(",\n    ",$Vg)."\n) WITH (oids = ".($O['Oid']?'true':'false').");";foreach($w
as$Md=>$v){if($v['type']=='INDEX'){$f=array();foreach($v['columns']as$y=>$X)$f[]=idf_escape($X).($v['descs'][$y]?" DESC":"");$H.="\n\nCREATE INDEX ".idf_escape($Md)." ON ".idf_escape($O['nspname']).".".idf_escape($O['Name'])." USING btree (".implode(', ',$f).");";}}if($O['Comment'])$H.="\n\nCOMMENT ON TABLE ".idf_escape($O['nspname']).".".idf_escape($O['Name'])." IS ".q($O['Comment']).";";foreach($p
as$Vc=>$o){if($o['comment'])$H.="\n\nCOMMENT ON COLUMN ".idf_escape($O['nspname']).".".idf_escape($O['Name']).".".idf_escape($Vc)." IS ".q($o['comment']).";";}return
rtrim($H,';');}function
truncate_sql($Q){return"TRUNCATE ".table($Q);}function
trigger_sql($Q){$O=table_status($Q);$H="";foreach(triggers($Q)as$Ai=>$_i){$Bi=trigger($Ai,$O['Name']);$H.="\nCREATE TRIGGER ".idf_escape($Bi['Trigger'])." $Bi[Timing] $Bi[Events] ON ".idf_escape($O["nspname"]).".".idf_escape($O['Name'])." $Bi[Type] $Bi[Statement];;\n";}return$H;}function
use_sql($j){return"\connect ".idf_escape($j);}function
show_variables(){return
get_key_vals("SHOW ALL");}function
process_list(){return
get_rows("SELECT * FROM pg_stat_activity ORDER BY ".(min_version(9.2)?"pid":"procpid"));}function
show_status(){}function
convert_field($o){}function
unconvert_field($o,$H){return$H;}function
support($Tc){return
preg_match('~^(database|table|columns|sql|indexes|descidx|comment|view|'.(min_version(9.3)?'materializedview|':'').'scheme|routine|processlist|sequence|trigger|type|variables|drop_col|kill|dump)$~',$Tc);}function
kill_process($X){return
queries("SELECT pg_terminate_backend(".number($X).")");}function
connection_id(){return"SELECT pg_backend_pid()";}function
max_connections(){global$h;return$h->result("SHOW max_connections");}$x="pgsql";$U=array();$Mh=array();foreach(array(lang(27)=>array("smallint"=>5,"integer"=>10,"bigint"=>19,"boolean"=>1,"numeric"=>0,"real"=>7,"double precision"=>16,"money"=>20),lang(28)=>array("date"=>13,"time"=>17,"timestamp"=>20,"timestamptz"=>21,"interval"=>0),lang(25)=>array("character"=>0,"character varying"=>0,"text"=>0,"tsquery"=>0,"tsvector"=>0,"uuid"=>0,"xml"=>0),lang(29)=>array("bit"=>0,"bit varying"=>0,"bytea"=>0),lang(30)=>array("cidr"=>43,"inet"=>43,"macaddr"=>17,"txid_snapshot"=>0),lang(31)=>array("box"=>0,"circle"=>0,"line"=>0,"lseg"=>0,"path"=>0,"point"=>0,"polygon"=>0),)as$y=>$X){$U+=$X;$Mh[$y]=array_keys($X);}$Ni=array();$_f=array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","ILIKE","ILIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$od=array("char_length","lower","round","to_hex","to_timestamp","upper");$ud=array("avg","count","count distinct","max","min","sum");$qc=array(array("char"=>"md5","date|time"=>"now",),array(number_type()=>"+/-","date|time"=>"+ interval/- interval","char|text"=>"||",));}$ic["oracle"]="Oracle (beta)";if(isset($_GET["oracle"])){$mg=array("OCI8","PDO_OCI");define("DRIVER","oracle");if(extension_loaded("oci8")){class
Min_DB{var$extension="oci8",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_error($Ac,$n){if(ini_bool("html_errors"))$n=html_entity_decode(strip_tags($n));$n=preg_replace('~^[^:]*: ~','',$n);$this->error=$n;}function
connect($M,$V,$E){$this->_link=@oci_new_connect($V,$E,$M,"AL32UTF8");if($this->_link){$this->server_info=oci_server_version($this->_link);return
true;}$n=oci_error();$this->error=$n["message"];return
false;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($j){return
true;}function
query($F,$Hi=false){$G=oci_parse($this->_link,$F);$this->error="";if(!$G){$n=oci_error($this->_link);$this->errno=$n["code"];$this->error=$n["message"];return
false;}set_error_handler(array($this,'_error'));$H=@oci_execute($G);restore_error_handler();if($H){if(oci_num_fields($G))return
new
Min_Result($G);$this->affected_rows=oci_num_rows($G);}return$H;}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($F,$o=1){$G=$this->query($F);if(!is_object($G)||!oci_fetch($G->_result))return
false;return
oci_result($G->_result,$o);}}class
Min_Result{var$_result,$_offset=1,$num_rows;function
__construct($G){$this->_result=$G;}function
_convert($I){foreach((array)$I
as$y=>$X){if(is_a($X,'OCI-Lob'))$I[$y]=$X->load();}return$I;}function
fetch_assoc(){return$this->_convert(oci_fetch_assoc($this->_result));}function
fetch_row(){return$this->_convert(oci_fetch_row($this->_result));}function
fetch_field(){$e=$this->_offset++;$H=new
stdClass;$H->name=oci_field_name($this->_result,$e);$H->orgname=$H->name;$H->type=oci_field_type($this->_result,$e);$H->charsetnr=(preg_match("~raw|blob|bfile~",$H->type)?63:0);return$H;}function
__destruct(){oci_free_statement($this->_result);}}}elseif(extension_loaded("pdo_oci")){class
Min_DB
extends
Min_PDO{var$extension="PDO_OCI";function
connect($M,$V,$E){$this->dsn("oci:dbname=//$M;charset=AL32UTF8",$V,$E);return
true;}function
select_db($j){return
true;}}}class
Min_Driver
extends
Min_SQL{function
begin(){return
true;}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b;$h=new
Min_DB;$Kb=$b->credentials();if($h->connect($Kb[0],$Kb[1],$Kb[2]))return$h;return$h->error;}function
get_databases(){return
get_vals("SELECT tablespace_name FROM user_tablespaces");}function
limit($F,$Z,$z,$C=0,$L=" "){return($C?" * FROM (SELECT t.*, rownum AS rnum FROM (SELECT $F$Z) t WHERE rownum <= ".($z+$C).") WHERE rnum > $C":($z!==null?" * FROM (SELECT $F$Z) WHERE rownum <= ".($z+$C):" $F$Z"));}function
limit1($Q,$F,$Z,$L="\n"){return" $F$Z";}function
db_collation($l,$qb){global$h;return$h->result("SELECT value FROM nls_database_parameters WHERE parameter = 'NLS_CHARACTERSET'");}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT USER FROM DUAL");}function
tables_list(){return
get_key_vals("SELECT table_name, 'table' FROM all_tables WHERE tablespace_name = ".q(DB)."
UNION SELECT view_name, 'view' FROM user_views
ORDER BY 1");}function
count_tables($k){return
array();}function
table_status($B=""){$H=array();$hh=q($B);foreach(get_rows('SELECT table_name "Name", \'table\' "Engine", avg_row_len * num_rows "Data_length", num_rows "Rows" FROM all_tables WHERE tablespace_name = '.q(DB).($B!=""?" AND table_name = $hh":"")."
UNION SELECT view_name, 'view', 0, 0 FROM user_views".($B!=""?" WHERE view_name = $hh":"")."
ORDER BY 1")as$I){if($B!="")return$I;$H[$I["Name"]]=$I;}return$H;}function
is_view($R){return$R["Engine"]=="view";}function
fk_support($R){return
true;}function
fields($Q){$H=array();foreach(get_rows("SELECT * FROM all_tab_columns WHERE table_name = ".q($Q)." ORDER BY column_id")as$I){$T=$I["DATA_TYPE"];$ye="$I[DATA_PRECISION],$I[DATA_SCALE]";if($ye==",")$ye=$I["DATA_LENGTH"];$H[$I["COLUMN_NAME"]]=array("field"=>$I["COLUMN_NAME"],"full_type"=>$T.($ye?"($ye)":""),"type"=>strtolower($T),"length"=>$ye,"default"=>$I["DATA_DEFAULT"],"null"=>($I["NULLABLE"]=="Y"),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);}return$H;}function
indexes($Q,$i=null){$H=array();foreach(get_rows("SELECT uic.*, uc.constraint_type
FROM user_ind_columns uic
LEFT JOIN user_constraints uc ON uic.index_name = uc.constraint_name AND uic.table_name = uc.table_name
WHERE uic.table_name = ".q($Q)."
ORDER BY uc.constraint_type, uic.column_position",$i)as$I){$Md=$I["INDEX_NAME"];$H[$Md]["type"]=($I["CONSTRAINT_TYPE"]=="P"?"PRIMARY":($I["CONSTRAINT_TYPE"]=="U"?"UNIQUE":"INDEX"));$H[$Md]["columns"][]=$I["COLUMN_NAME"];$H[$Md]["lengths"][]=($I["CHAR_LENGTH"]&&$I["CHAR_LENGTH"]!=$I["COLUMN_LENGTH"]?$I["CHAR_LENGTH"]:null);$H[$Md]["descs"][]=($I["DESCEND"]?'1':null);}return$H;}function
view($B){$J=get_rows('SELECT text "select" FROM user_views WHERE view_name = '.q($B));return
reset($J);}function
collations(){return
array();}function
information_schema($l){return
false;}function
error(){global$h;return
h($h->error);}function
explain($h,$F){$h->query("EXPLAIN PLAN FOR $F");return$h->query("SELECT * FROM plan_table");}function
found_rows($R,$Z){}function
alter_table($Q,$B,$p,$gd,$vb,$yc,$d,$Na,$Zf){$c=$jc=array();foreach($p
as$o){$X=$o[1];if($X&&$o[0]!=""&&idf_escape($o[0])!=$X[0])queries("ALTER TABLE ".table($Q)." RENAME COLUMN ".idf_escape($o[0])." TO $X[0]");if($X)$c[]=($Q!=""?($o[0]!=""?"MODIFY (":"ADD ("):"  ").implode($X).($Q!=""?")":"");else$jc[]=idf_escape($o[0]);}if($Q=="")return
queries("CREATE TABLE ".table($B)." (\n".implode(",\n",$c)."\n)");return(!$c||queries("ALTER TABLE ".table($Q)."\n".implode("\n",$c)))&&(!$jc||queries("ALTER TABLE ".table($Q)." DROP (".implode(", ",$jc).")"))&&($Q==$B||queries("ALTER TABLE ".table($Q)." RENAME TO ".table($B)));}function
foreign_keys($Q){$H=array();$F="SELECT c_list.CONSTRAINT_NAME as NAME,
c_src.COLUMN_NAME as SRC_COLUMN,
c_dest.OWNER as DEST_DB,
c_dest.TABLE_NAME as DEST_TABLE,
c_dest.COLUMN_NAME as DEST_COLUMN,
c_list.DELETE_RULE as ON_DELETE
FROM ALL_CONSTRAINTS c_list, ALL_CONS_COLUMNS c_src, ALL_CONS_COLUMNS c_dest
WHERE c_list.CONSTRAINT_NAME = c_src.CONSTRAINT_NAME
AND c_list.R_CONSTRAINT_NAME = c_dest.CONSTRAINT_NAME
AND c_list.CONSTRAINT_TYPE = 'R'
AND c_src.TABLE_NAME = ".q($Q);foreach(get_rows($F)as$I)$H[$I['NAME']]=array("db"=>$I['DEST_DB'],"table"=>$I['DEST_TABLE'],"source"=>array($I['SRC_COLUMN']),"target"=>array($I['DEST_COLUMN']),"on_delete"=>$I['ON_DELETE'],"on_update"=>null,);return$H;}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($fj){return
apply_queries("DROP VIEW",$fj);}function
drop_tables($S){return
apply_queries("DROP TABLE",$S);}function
last_id(){return
0;}function
schemas(){return
get_vals("SELECT DISTINCT owner FROM dba_segments WHERE owner IN (SELECT username FROM dba_users WHERE default_tablespace NOT IN ('SYSTEM','SYSAUX'))");}function
get_schema(){global$h;return$h->result("SELECT sys_context('USERENV', 'SESSION_USER') FROM dual");}function
set_schema($gh,$i=null){global$h;if(!$i)$i=$h;return$i->query("ALTER SESSION SET CURRENT_SCHEMA = ".idf_escape($gh));}function
show_variables(){return
get_key_vals('SELECT name, display_value FROM v$parameter');}function
process_list(){return
get_rows('SELECT sess.process AS "process", sess.username AS "user", sess.schemaname AS "schema", sess.status AS "status", sess.wait_class AS "wait_class", sess.seconds_in_wait AS "seconds_in_wait", sql.sql_text AS "sql_text", sess.machine AS "machine", sess.port AS "port"
FROM v$session sess LEFT OUTER JOIN v$sql sql
ON sql.sql_id = sess.sql_id
WHERE sess.type = \'USER\'
ORDER BY PROCESS
');}function
show_status(){$J=get_rows('SELECT * FROM v$instance');return
reset($J);}function
convert_field($o){}function
unconvert_field($o,$H){return$H;}function
support($Tc){return
preg_match('~^(columns|database|drop_col|indexes|descidx|processlist|scheme|sql|status|table|variables|view|view_trigger)$~',$Tc);}$x="oracle";$U=array();$Mh=array();foreach(array(lang(27)=>array("number"=>38,"binary_float"=>12,"binary_double"=>21),lang(28)=>array("date"=>10,"timestamp"=>29,"interval year"=>12,"interval day"=>28),lang(25)=>array("char"=>2000,"varchar2"=>4000,"nchar"=>2000,"nvarchar2"=>4000,"clob"=>4294967295,"nclob"=>4294967295),lang(29)=>array("raw"=>2000,"long raw"=>2147483648,"blob"=>4294967295,"bfile"=>4294967296),)as$y=>$X){$U+=$X;$Mh[$y]=array_keys($X);}$Ni=array();$_f=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$od=array("length","lower","round","upper");$ud=array("avg","count","count distinct","max","min","sum");$qc=array(array("date"=>"current_date","timestamp"=>"current_timestamp",),array("number|float|double"=>"+/-","date|timestamp"=>"+ interval/- interval","char|clob"=>"||",));}$ic["mssql"]="MS SQL (beta)";if(isset($_GET["mssql"])){$mg=array("SQLSRV","MSSQL","PDO_DBLIB");define("DRIVER","mssql");if(extension_loaded("sqlsrv")){class
Min_DB{var$extension="sqlsrv",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_get_error(){$this->error="";foreach(sqlsrv_errors()as$n){$this->errno=$n["code"];$this->error.="$n[message]\n";}$this->error=rtrim($this->error);}function
connect($M,$V,$E){global$b;$l=$b->database();$_b=array("UID"=>$V,"PWD"=>$E,"CharacterSet"=>"UTF-8");if($l!="")$_b["Database"]=$l;$this->_link=@sqlsrv_connect(preg_replace('~:~',',',$M),$_b);if($this->_link){$Td=sqlsrv_server_info($this->_link);$this->server_info=$Td['SQLServerVersion'];}else$this->_get_error();return(bool)$this->_link;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($j){return$this->query("USE ".idf_escape($j));}function
query($F,$Hi=false){$G=sqlsrv_query($this->_link,$F);$this->error="";if(!$G){$this->_get_error();return
false;}return$this->store_result($G);}function
multi_query($F){$this->_result=sqlsrv_query($this->_link,$F);$this->error="";if(!$this->_result){$this->_get_error();return
false;}return
true;}function
store_result($G=null){if(!$G)$G=$this->_result;if(!$G)return
false;if(sqlsrv_field_metadata($G))return
new
Min_Result($G);$this->affected_rows=sqlsrv_rows_affected($G);return
true;}function
next_result(){return$this->_result?sqlsrv_next_result($this->_result):null;}function
result($F,$o=0){$G=$this->query($F);if(!is_object($G))return
false;$I=$G->fetch_row();return$I[$o];}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($G){$this->_result=$G;}function
_convert($I){foreach((array)$I
as$y=>$X){if(is_a($X,'DateTime'))$I[$y]=$X->format("Y-m-d H:i:s");}return$I;}function
fetch_assoc(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_ASSOC));}function
fetch_row(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_NUMERIC));}function
fetch_field(){if(!$this->_fields)$this->_fields=sqlsrv_field_metadata($this->_result);$o=$this->_fields[$this->_offset++];$H=new
stdClass;$H->name=$o["Name"];$H->orgname=$o["Name"];$H->type=($o["Type"]==1?254:0);return$H;}function
seek($C){for($s=0;$s<$C;$s++)sqlsrv_fetch($this->_result);}function
__destruct(){sqlsrv_free_stmt($this->_result);}}}elseif(extension_loaded("mssql")){class
Min_DB{var$extension="MSSQL",$_link,$_result,$server_info,$affected_rows,$error;function
connect($M,$V,$E){$this->_link=@mssql_connect($M,$V,$E);if($this->_link){$G=$this->query("SELECT SERVERPROPERTY('ProductLevel'), SERVERPROPERTY('Edition')");if($G){$I=$G->fetch_row();$this->server_info=$this->result("sp_server_info 2",2)." [$I[0]] $I[1]";}}else$this->error=mssql_get_last_message();return(bool)$this->_link;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($j){return
mssql_select_db($j);}function
query($F,$Hi=false){$G=@mssql_query($F,$this->_link);$this->error="";if(!$G){$this->error=mssql_get_last_message();return
false;}if($G===true){$this->affected_rows=mssql_rows_affected($this->_link);return
true;}return
new
Min_Result($G);}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
mssql_next_result($this->_result->_result);}function
result($F,$o=0){$G=$this->query($F);if(!is_object($G))return
false;return
mssql_result($G->_result,0,$o);}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($G){$this->_result=$G;$this->num_rows=mssql_num_rows($G);}function
fetch_assoc(){return
mssql_fetch_assoc($this->_result);}function
fetch_row(){return
mssql_fetch_row($this->_result);}function
num_rows(){return
mssql_num_rows($this->_result);}function
fetch_field(){$H=mssql_fetch_field($this->_result);$H->orgtable=$H->table;$H->orgname=$H->name;return$H;}function
seek($C){mssql_data_seek($this->_result,$C);}function
__destruct(){mssql_free_result($this->_result);}}}elseif(extension_loaded("pdo_dblib")){class
Min_DB
extends
Min_PDO{var$extension="PDO_DBLIB";function
connect($M,$V,$E){$this->dsn("dblib:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\d)~',';port=\1',$M)),$V,$E);return
true;}function
select_db($j){return$this->query("USE ".idf_escape($j));}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$J,$pg){foreach($J
as$N){$Oi=array();$Z=array();foreach($N
as$y=>$X){$Oi[]="$y = $X";if(isset($pg[idf_unescape($y)]))$Z[]="$y = $X";}if(!queries("MERGE ".table($Q)." USING (VALUES(".implode(", ",$N).")) AS source (c".implode(", c",range(1,count($N))).") ON ".implode(" AND ",$Z)." WHEN MATCHED THEN UPDATE SET ".implode(", ",$Oi)." WHEN NOT MATCHED THEN INSERT (".implode(", ",array_keys($N)).") VALUES (".implode(", ",$N).");"))return
false;}return
true;}function
begin(){return
queries("BEGIN TRANSACTION");}}function
idf_escape($u){return"[".str_replace("]","]]",$u)."]";}function
table($u){return($_GET["ns"]!=""?idf_escape($_GET["ns"]).".":"").idf_escape($u);}function
connect(){global$b;$h=new
Min_DB;$Kb=$b->credentials();if($h->connect($Kb[0],$Kb[1],$Kb[2]))return$h;return$h->error;}function
get_databases(){return
get_vals("SELECT name FROM sys.databases WHERE name NOT IN ('master', 'tempdb', 'model', 'msdb')");}function
limit($F,$Z,$z,$C=0,$L=" "){return($z!==null?" TOP (".($z+$C).")":"")." $F$Z";}function
limit1($Q,$F,$Z,$L="\n"){return
limit($F,$Z,1,0,$L);}function
db_collation($l,$qb){global$h;return$h->result("SELECT collation_name FROM sys.databases WHERE name = ".q($l));}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT SUSER_NAME()");}function
tables_list(){return
get_key_vals("SELECT name, type_desc FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ORDER BY name");}function
count_tables($k){global$h;$H=array();foreach($k
as$l){$h->select_db($l);$H[$l]=$h->result("SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES");}return$H;}function
table_status($B=""){$H=array();foreach(get_rows("SELECT ao.name AS Name, ao.type_desc AS Engine, (SELECT value FROM fn_listextendedproperty(default, 'SCHEMA', schema_name(schema_id), 'TABLE', ao.name, null, null)) AS Comment FROM sys.all_objects AS ao WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ".($B!=""?"AND name = ".q($B):"ORDER BY name"))as$I){if($B!="")return$I;$H[$I["Name"]]=$I;}return$H;}function
is_view($R){return$R["Engine"]=="VIEW";}function
fk_support($R){return
true;}function
fields($Q){$xb=get_key_vals("SELECT objname, cast(value as varchar) FROM fn_listextendedproperty('MS_DESCRIPTION', 'schema', ".q(get_schema()).", 'table', ".q($Q).", 'column', NULL)");$H=array();foreach(get_rows("SELECT c.max_length, c.precision, c.scale, c.name, c.is_nullable, c.is_identity, c.collation_name, t.name type, CAST(d.definition as text) [default]
FROM sys.all_columns c
JOIN sys.all_objects o ON c.object_id = o.object_id
JOIN sys.types t ON c.user_type_id = t.user_type_id
LEFT JOIN sys.default_constraints d ON c.default_object_id = d.parent_column_id
WHERE o.schema_id = SCHEMA_ID(".q(get_schema()).") AND o.type IN ('S', 'U', 'V') AND o.name = ".q($Q))as$I){$T=$I["type"];$ye=(preg_match("~char|binary~",$T)?$I["max_length"]:($T=="decimal"?"$I[precision],$I[scale]":""));$H[$I["name"]]=array("field"=>$I["name"],"full_type"=>$T.($ye?"($ye)":""),"type"=>$T,"length"=>$ye,"default"=>$I["default"],"null"=>$I["is_nullable"],"auto_increment"=>$I["is_identity"],"collation"=>$I["collation_name"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"primary"=>$I["is_identity"],"comment"=>$xb[$I["name"]],);}return$H;}function
indexes($Q,$i=null){$H=array();foreach(get_rows("SELECT i.name, key_ordinal, is_unique, is_primary_key, c.name AS column_name, is_descending_key
FROM sys.indexes i
INNER JOIN sys.index_columns ic ON i.object_id = ic.object_id AND i.index_id = ic.index_id
INNER JOIN sys.columns c ON ic.object_id = c.object_id AND ic.column_id = c.column_id
WHERE OBJECT_NAME(i.object_id) = ".q($Q),$i)as$I){$B=$I["name"];$H[$B]["type"]=($I["is_primary_key"]?"PRIMARY":($I["is_unique"]?"UNIQUE":"INDEX"));$H[$B]["lengths"]=array();$H[$B]["columns"][$I["key_ordinal"]]=$I["column_name"];$H[$B]["descs"][$I["key_ordinal"]]=($I["is_descending_key"]?'1':null);}return$H;}function
view($B){global$h;return
array("select"=>preg_replace('~^(?:[^[]|\[[^]]*])*\s+AS\s+~isU','',$h->result("SELECT VIEW_DEFINITION FROM INFORMATION_SCHEMA.VIEWS WHERE TABLE_SCHEMA = SCHEMA_NAME() AND TABLE_NAME = ".q($B))));}function
collations(){$H=array();foreach(get_vals("SELECT name FROM fn_helpcollations()")as$d)$H[preg_replace('~_.*~','',$d)][]=$d;return$H;}function
information_schema($l){return
false;}function
error(){global$h;return
nl_br(h(preg_replace('~^(\[[^]]*])+~m','',$h->error)));}function
create_database($l,$d){return
queries("CREATE DATABASE ".idf_escape($l).(preg_match('~^[a-z0-9_]+$~i',$d)?" COLLATE $d":""));}function
drop_databases($k){return
queries("DROP DATABASE ".implode(", ",array_map('idf_escape',$k)));}function
rename_database($B,$d){if(preg_match('~^[a-z0-9_]+$~i',$d))queries("ALTER DATABASE ".idf_escape(DB)." COLLATE $d");queries("ALTER DATABASE ".idf_escape(DB)." MODIFY NAME = ".idf_escape($B));return
true;}function
auto_increment(){return" IDENTITY".($_POST["Auto_increment"]!=""?"(".number($_POST["Auto_increment"]).",1)":"")." PRIMARY KEY";}function
alter_table($Q,$B,$p,$gd,$vb,$yc,$d,$Na,$Zf){$c=array();$xb=array();foreach($p
as$o){$e=idf_escape($o[0]);$X=$o[1];if(!$X)$c["DROP"][]=" COLUMN $e";else{$X[1]=preg_replace("~( COLLATE )'(\\w+)'~",'\1\2',$X[1]);$xb[$o[0]]=$X[5];unset($X[5]);if($o[0]=="")$c["ADD"][]="\n  ".implode("",$X).($Q==""?substr($gd[$X[0]],16+strlen($X[0])):"");else{unset($X[6]);if($e!=$X[0])queries("EXEC sp_rename ".q(table($Q).".$e").", ".q(idf_unescape($X[0])).", 'COLUMN'");$c["ALTER COLUMN ".implode("",$X)][]="";}}}if($Q=="")return
queries("CREATE TABLE ".table($B)." (".implode(",",(array)$c["ADD"])."\n)");if($Q!=$B)queries("EXEC sp_rename ".q(table($Q)).", ".q($B));if($gd)$c[""]=$gd;foreach($c
as$y=>$X){if(!queries("ALTER TABLE ".idf_escape($B)." $y".implode(",",$X)))return
false;}foreach($xb
as$y=>$X){$vb=substr($X,9);queries("EXEC sp_dropextendedproperty @name = N'MS_Description', @level0type = N'Schema', @level0name = ".q(get_schema()).", @level1type = N'Table',  @level1name = ".q($B).", @level2type = N'Column', @level2name = ".q($y));queries("EXEC sp_addextendedproperty @name = N'MS_Description', @value = ".$vb.", @level0type = N'Schema', @level0name = ".q(get_schema()).", @level1type = N'Table',  @level1name = ".q($B).", @level2type = N'Column', @level2name = ".q($y));}return
true;}function
alter_indexes($Q,$c){$v=array();$jc=array();foreach($c
as$X){if($X[2]=="DROP"){if($X[0]=="PRIMARY")$jc[]=idf_escape($X[1]);else$v[]=idf_escape($X[1])." ON ".table($Q);}elseif(!queries(($X[0]!="PRIMARY"?"CREATE $X[0] ".($X[0]!="INDEX"?"INDEX ":"").idf_escape($X[1]!=""?$X[1]:uniqid($Q."_"))." ON ".table($Q):"ALTER TABLE ".table($Q)." ADD PRIMARY KEY")." (".implode(", ",$X[2]).")"))return
false;}return(!$v||queries("DROP INDEX ".implode(", ",$v)))&&(!$jc||queries("ALTER TABLE ".table($Q)." DROP ".implode(", ",$jc)));}function
last_id(){global$h;return$h->result("SELECT SCOPE_IDENTITY()");}function
explain($h,$F){$h->query("SET SHOWPLAN_ALL ON");$H=$h->query($F);$h->query("SET SHOWPLAN_ALL OFF");return$H;}function
found_rows($R,$Z){}function
foreign_keys($Q){$H=array();foreach(get_rows("EXEC sp_fkeys @fktable_name = ".q($Q))as$I){$q=&$H[$I["FK_NAME"]];$q["db"]=$I["PKTABLE_QUALIFIER"];$q["table"]=$I["PKTABLE_NAME"];$q["source"][]=$I["FKCOLUMN_NAME"];$q["target"][]=$I["PKCOLUMN_NAME"];}return$H;}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($fj){return
queries("DROP VIEW ".implode(", ",array_map('table',$fj)));}function
drop_tables($S){return
queries("DROP TABLE ".implode(", ",array_map('table',$S)));}function
move_tables($S,$fj,$ci){return
apply_queries("ALTER SCHEMA ".idf_escape($ci)." TRANSFER",array_merge($S,$fj));}function
trigger($B){if($B=="")return
array();$J=get_rows("SELECT s.name [Trigger],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(s.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(s.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing],
c.text
FROM sysobjects s
JOIN syscomments c ON s.id = c.id
WHERE s.xtype = 'TR' AND s.name = ".q($B));$H=reset($J);if($H)$H["Statement"]=preg_replace('~^.+\s+AS\s+~isU','',$H["text"]);return$H;}function
triggers($Q){$H=array();foreach(get_rows("SELECT sys1.name,
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing]
FROM sysobjects sys1
JOIN sysobjects sys2 ON sys1.parent_obj = sys2.id
WHERE sys1.xtype = 'TR' AND sys2.name = ".q($Q))as$I)$H[$I["name"]]=array($I["Timing"],$I["Event"]);return$H;}function
trigger_options(){return
array("Timing"=>array("AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("AS"),);}function
schemas(){return
get_vals("SELECT name FROM sys.schemas");}function
get_schema(){global$h;if($_GET["ns"]!="")return$_GET["ns"];return$h->result("SELECT SCHEMA_NAME()");}function
set_schema($fh){return
true;}function
use_sql($j){return"USE ".idf_escape($j);}function
show_variables(){return
array();}function
show_status(){return
array();}function
convert_field($o){}function
unconvert_field($o,$H){return$H;}function
support($Tc){return
preg_match('~^(comment|columns|database|drop_col|indexes|descidx|scheme|sql|table|trigger|view|view_trigger)$~',$Tc);}$x="mssql";$U=array();$Mh=array();foreach(array(lang(27)=>array("tinyint"=>3,"smallint"=>5,"int"=>10,"bigint"=>20,"bit"=>1,"decimal"=>0,"real"=>12,"float"=>53,"smallmoney"=>10,"money"=>20),lang(28)=>array("date"=>10,"smalldatetime"=>19,"datetime"=>19,"datetime2"=>19,"time"=>8,"datetimeoffset"=>10),lang(25)=>array("char"=>8000,"varchar"=>8000,"text"=>2147483647,"nchar"=>4000,"nvarchar"=>4000,"ntext"=>1073741823),lang(29)=>array("binary"=>8000,"varbinary"=>8000,"image"=>2147483647),)as$y=>$X){$U+=$X;$Mh[$y]=array_keys($X);}$Ni=array();$_f=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$od=array("len","lower","round","upper");$ud=array("avg","count","count distinct","max","min","sum");$qc=array(array("date|time"=>"getdate",),array("int|decimal|real|float|money|datetime"=>"+/-","char|text"=>"+",));}$ic['firebird']='Firebird (alpha)';if(isset($_GET["firebird"])){$mg=array("interbase");define("DRIVER","firebird");if(extension_loaded("interbase")){class
Min_DB{var$extension="Firebird",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($M,$V,$E){$this->_link=ibase_connect($M,$V,$E);if($this->_link){$Ri=explode(':',$M);$this->service_link=ibase_service_attach($Ri[0],$V,$E);$this->server_info=ibase_server_info($this->service_link,IBASE_SVC_SERVER_VERSION);}else{$this->errno=ibase_errcode();$this->error=ibase_errmsg();}return(bool)$this->_link;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($j){return($j=="domain");}function
query($F,$Hi=false){$G=ibase_query($F,$this->_link);if(!$G){$this->errno=ibase_errcode();$this->error=ibase_errmsg();return
false;}$this->error="";if($G===true){$this->affected_rows=ibase_affected_rows($this->_link);return
true;}return
new
Min_Result($G);}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($F,$o=0){$G=$this->query($F);if(!$G||!$G->num_rows)return
false;$I=$G->fetch_row();return$I[$o];}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($G){$this->_result=$G;}function
fetch_assoc(){return
ibase_fetch_assoc($this->_result);}function
fetch_row(){return
ibase_fetch_row($this->_result);}function
fetch_field(){$o=ibase_field_info($this->_result,$this->_offset++);return(object)array('name'=>$o['name'],'orgname'=>$o['name'],'type'=>$o['type'],'charsetnr'=>$o['length'],);}function
__destruct(){ibase_free_result($this->_result);}}}class
Min_Driver
extends
Min_SQL{}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b;$h=new
Min_DB;$Kb=$b->credentials();if($h->connect($Kb[0],$Kb[1],$Kb[2]))return$h;return$h->error;}function
get_databases($ed){return
array("domain");}function
limit($F,$Z,$z,$C=0,$L=" "){$H='';$H.=($z!==null?$L."FIRST $z".($C?" SKIP $C":""):"");$H.=" $F$Z";return$H;}function
limit1($Q,$F,$Z,$L="\n"){return
limit($F,$Z,1,0,$L);}function
db_collation($l,$qb){}function
engines(){return
array();}function
logged_user(){global$b;$Kb=$b->credentials();return$Kb[1];}function
tables_list(){global$h;$F='SELECT RDB$RELATION_NAME FROM rdb$relations WHERE rdb$system_flag = 0';$G=ibase_query($h->_link,$F);$H=array();while($I=ibase_fetch_assoc($G))$H[$I['RDB$RELATION_NAME']]='table';ksort($H);return$H;}function
count_tables($k){return
array();}function
table_status($B="",$Sc=false){global$h;$H=array();$Pb=tables_list();foreach($Pb
as$v=>$X){$v=trim($v);$H[$v]=array('Name'=>$v,'Engine'=>'standard',);if($B==$v)return$H[$v];}return$H;}function
is_view($R){return
false;}function
fk_support($R){return
preg_match('~InnoDB|IBMDB2I~i',$R["Engine"]);}function
fields($Q){global$h;$H=array();$F='SELECT r.RDB$FIELD_NAME AS field_name,
r.RDB$DESCRIPTION AS field_description,
r.RDB$DEFAULT_VALUE AS field_default_value,
r.RDB$NULL_FLAG AS field_not_null_constraint,
f.RDB$FIELD_LENGTH AS field_length,
f.RDB$FIELD_PRECISION AS field_precision,
f.RDB$FIELD_SCALE AS field_scale,
CASE f.RDB$FIELD_TYPE
WHEN 261 THEN \'BLOB\'
WHEN 14 THEN \'CHAR\'
WHEN 40 THEN \'CSTRING\'
WHEN 11 THEN \'D_FLOAT\'
WHEN 27 THEN \'DOUBLE\'
WHEN 10 THEN \'FLOAT\'
WHEN 16 THEN \'INT64\'
WHEN 8 THEN \'INTEGER\'
WHEN 9 THEN \'QUAD\'
WHEN 7 THEN \'SMALLINT\'
WHEN 12 THEN \'DATE\'
WHEN 13 THEN \'TIME\'
WHEN 35 THEN \'TIMESTAMP\'
WHEN 37 THEN \'VARCHAR\'
ELSE \'UNKNOWN\'
END AS field_type,
f.RDB$FIELD_SUB_TYPE AS field_subtype,
coll.RDB$COLLATION_NAME AS field_collation,
cset.RDB$CHARACTER_SET_NAME AS field_charset
FROM RDB$RELATION_FIELDS r
LEFT JOIN RDB$FIELDS f ON r.RDB$FIELD_SOURCE = f.RDB$FIELD_NAME
LEFT JOIN RDB$COLLATIONS coll ON f.RDB$COLLATION_ID = coll.RDB$COLLATION_ID
LEFT JOIN RDB$CHARACTER_SETS cset ON f.RDB$CHARACTER_SET_ID = cset.RDB$CHARACTER_SET_ID
WHERE r.RDB$RELATION_NAME = '.q($Q).'
ORDER BY r.RDB$FIELD_POSITION';$G=ibase_query($h->_link,$F);while($I=ibase_fetch_assoc($G))$H[trim($I['FIELD_NAME'])]=array("field"=>trim($I["FIELD_NAME"]),"full_type"=>trim($I["FIELD_TYPE"]),"type"=>trim($I["FIELD_SUB_TYPE"]),"default"=>trim($I['FIELD_DEFAULT_VALUE']),"null"=>(trim($I["FIELD_NOT_NULL_CONSTRAINT"])=="YES"),"auto_increment"=>'0',"collation"=>trim($I["FIELD_COLLATION"]),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"comment"=>trim($I["FIELD_DESCRIPTION"]),);return$H;}function
indexes($Q,$i=null){$H=array();return$H;}function
foreign_keys($Q){return
array();}function
collations(){return
array();}function
information_schema($l){return
false;}function
error(){global$h;return
h($h->error);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($fh){return
true;}function
support($Tc){return
preg_match("~^(columns|sql|status|table)$~",$Tc);}$x="firebird";$_f=array("=");$od=array();$ud=array();$qc=array();}$ic["simpledb"]="SimpleDB";if(isset($_GET["simpledb"])){$mg=array("SimpleXML + allow_url_fopen");define("DRIVER","simpledb");if(class_exists('SimpleXMLElement')&&ini_bool('allow_url_fopen')){class
Min_DB{var$extension="SimpleXML",$server_info='2009-04-15',$error,$timeout,$next,$affected_rows,$_result;function
select_db($j){return($j=="domain");}function
query($F,$Hi=false){$Tf=array('SelectExpression'=>$F,'ConsistentRead'=>'true');if($this->next)$Tf['NextToken']=$this->next;$G=sdb_request_all('Select','Item',$Tf,$this->timeout);$this->timeout=0;if($G===false)return$G;if(preg_match('~^\s*SELECT\s+COUNT\(~i',$F)){$Qh=0;foreach($G
as$fe)$Qh+=$fe->Attribute->Value;$G=array((object)array('Attribute'=>array((object)array('Name'=>'Count','Value'=>$Qh,))));}return
new
Min_Result($G);}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
quote($P){return"'".str_replace("'","''",$P)."'";}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0;function
__construct($G){foreach($G
as$fe){$I=array();if($fe->Name!='')$I['itemName()']=(string)$fe->Name;foreach($fe->Attribute
as$Ja){$B=$this->_processValue($Ja->Name);$Y=$this->_processValue($Ja->Value);if(isset($I[$B])){$I[$B]=(array)$I[$B];$I[$B][]=$Y;}else$I[$B]=$Y;}$this->_rows[]=$I;foreach($I
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=count($this->_rows);}function
_processValue($tc){return(is_object($tc)&&$tc['encoding']=='base64'?base64_decode($tc):(string)$tc);}function
fetch_assoc(){$I=current($this->_rows);if(!$I)return$I;$H=array();foreach($this->_rows[0]as$y=>$X)$H[$y]=$I[$y];next($this->_rows);return$H;}function
fetch_row(){$H=$this->fetch_assoc();if(!$H)return$H;return
array_values($H);}function
fetch_field(){$le=array_keys($this->_rows[0]);return(object)array('name'=>$le[$this->_offset++]);}}}class
Min_Driver
extends
Min_SQL{public$pg="itemName()";function
_chunkRequest($Id,$wa,$Tf,$Ic=array()){global$h;foreach(array_chunk($Id,25)as$jb){$Uf=$Tf;foreach($jb
as$s=>$t){$Uf["Item.$s.ItemName"]=$t;foreach($Ic
as$y=>$X)$Uf["Item.$s.$y"]=$X;}if(!sdb_request($wa,$Uf))return
false;}$h->affected_rows=count($Id);return
true;}function
_extractIds($Q,$Ag,$z){$H=array();if(preg_match_all("~itemName\(\) = (('[^']*+')+)~",$Ag,$Ie))$H=array_map('idf_unescape',$Ie[1]);else{foreach(sdb_request_all('Select','Item',array('SelectExpression'=>'SELECT itemName() FROM '.table($Q).$Ag.($z?" LIMIT 1":"")))as$fe)$H[]=$fe->Name;}return$H;}function
select($Q,$K,$Z,$rd,$Ef=array(),$z=1,$D=0,$rg=false){global$h;$h->next=$_GET["next"];$H=parent::select($Q,$K,$Z,$rd,$Ef,$z,$D,$rg);$h->next=0;return$H;}function
delete($Q,$Ag,$z=0){return$this->_chunkRequest($this->_extractIds($Q,$Ag,$z),'BatchDeleteAttributes',array('DomainName'=>$Q));}function
update($Q,$N,$Ag,$z=0,$L="\n"){$Zb=array();$Xd=array();$s=0;$Id=$this->_extractIds($Q,$Ag,$z);$t=idf_unescape($N["`itemName()`"]);unset($N["`itemName()`"]);foreach($N
as$y=>$X){$y=idf_unescape($y);if($X=="NULL"||($t!=""&&array($t)!=$Id))$Zb["Attribute.".count($Zb).".Name"]=$y;if($X!="NULL"){foreach((array)$X
as$he=>$W){$Xd["Attribute.$s.Name"]=$y;$Xd["Attribute.$s.Value"]=(is_array($X)?$W:idf_unescape($W));if(!$he)$Xd["Attribute.$s.Replace"]="true";$s++;}}}$Tf=array('DomainName'=>$Q);return(!$Xd||$this->_chunkRequest(($t!=""?array($t):$Id),'BatchPutAttributes',$Tf,$Xd))&&(!$Zb||$this->_chunkRequest($Id,'BatchDeleteAttributes',$Tf,$Zb));}function
insert($Q,$N){$Tf=array("DomainName"=>$Q);$s=0;foreach($N
as$B=>$Y){if($Y!="NULL"){$B=idf_unescape($B);if($B=="itemName()")$Tf["ItemName"]=idf_unescape($Y);else{foreach((array)$Y
as$X){$Tf["Attribute.$s.Name"]=$B;$Tf["Attribute.$s.Value"]=(is_array($Y)?$X:idf_unescape($Y));$s++;}}}}return
sdb_request('PutAttributes',$Tf);}function
insertUpdate($Q,$J,$pg){foreach($J
as$N){if(!$this->update($Q,$N,"WHERE `itemName()` = ".q($N["`itemName()`"])))return
false;}return
true;}function
begin(){return
false;}function
commit(){return
false;}function
rollback(){return
false;}function
slowQuery($F,$ki){$this->_conn->timeout=$ki;return$F;}}function
connect(){global$b;list(,,$E)=$b->credentials();if($E!="")return
lang(22);return
new
Min_DB;}function
support($Tc){return
preg_match('~sql~',$Tc);}function
logged_user(){global$b;$Kb=$b->credentials();return$Kb[1];}function
get_databases(){return
array("domain");}function
collations(){return
array();}function
db_collation($l,$qb){}function
tables_list(){global$h;$H=array();foreach(sdb_request_all('ListDomains','DomainName')as$Q)$H[(string)$Q]='table';if($h->error&&defined("PAGE_HEADER"))echo"<p class='error'>".error()."\n";return$H;}function
table_status($B="",$Sc=false){$H=array();foreach(($B!=""?array($B=>true):tables_list())as$Q=>$T){$I=array("Name"=>$Q,"Auto_increment"=>"");if(!$Sc){$Ve=sdb_request('DomainMetadata',array('DomainName'=>$Q));if($Ve){foreach(array("Rows"=>"ItemCount","Data_length"=>"ItemNamesSizeBytes","Index_length"=>"AttributeValuesSizeBytes","Data_free"=>"AttributeNamesSizeBytes",)as$y=>$X)$I[$y]=(string)$Ve->$X;}}if($B!="")return$I;$H[$Q]=$I;}return$H;}function
explain($h,$F){}function
error(){global$h;return
h($h->error);}function
information_schema(){}function
is_view($R){}function
indexes($Q,$i=null){return
array(array("type"=>"PRIMARY","columns"=>array("itemName()")),);}function
fields($Q){return
fields_from_edit();}function
foreign_keys($Q){return
array();}function
table($u){return
idf_escape($u);}function
idf_escape($u){return"`".str_replace("`","``",$u)."`";}function
limit($F,$Z,$z,$C=0,$L=" "){return" $F$Z".($z!==null?$L."LIMIT $z":"");}function
unconvert_field($o,$H){return$H;}function
fk_support($R){}function
engines(){return
array();}function
alter_table($Q,$B,$p,$gd,$vb,$yc,$d,$Na,$Zf){return($Q==""&&sdb_request('CreateDomain',array('DomainName'=>$B)));}function
drop_tables($S){foreach($S
as$Q){if(!sdb_request('DeleteDomain',array('DomainName'=>$Q)))return
false;}return
true;}function
count_tables($k){foreach($k
as$l)return
array($l=>count(tables_list()));}function
found_rows($R,$Z){return($Z?null:$R["Rows"]);}function
last_id(){}function
hmac($Ca,$Pb,$y,$Eg=false){$Wa=64;if(strlen($y)>$Wa)$y=pack("H*",$Ca($y));$y=str_pad($y,$Wa,"\0");$ie=$y^str_repeat("\x36",$Wa);$je=$y^str_repeat("\x5C",$Wa);$H=$Ca($je.pack("H*",$Ca($ie.$Pb)));if($Eg)$H=pack("H*",$H);return$H;}function
sdb_request($wa,$Tf=array()){global$b,$h;list($Ed,$Tf['AWSAccessKeyId'],$ih)=$b->credentials();$Tf['Action']=$wa;$Tf['Timestamp']=gmdate('Y-m-d\TH:i:s+00:00');$Tf['Version']='2009-04-15';$Tf['SignatureVersion']=2;$Tf['SignatureMethod']='HmacSHA1';ksort($Tf);$F='';foreach($Tf
as$y=>$X)$F.='&'.rawurlencode($y).'='.rawurlencode($X);$F=str_replace('%7E','~',substr($F,1));$F.="&Signature=".urlencode(base64_encode(hmac('sha1',"POST\n".preg_replace('~^https?://~','',$Ed)."\n/\n$F",$ih,true)));@ini_set('track_errors',1);$Xc=@file_get_contents((preg_match('~^https?://~',$Ed)?$Ed:"http://$Ed"),false,stream_context_create(array('http'=>array('method'=>'POST','content'=>$F,'ignore_errors'=>1,))));if(!$Xc){$h->error=$php_errormsg;return
false;}libxml_use_internal_errors(true);$sj=simplexml_load_string($Xc);if(!$sj){$n=libxml_get_last_error();$h->error=$n->message;return
false;}if($sj->Errors){$n=$sj->Errors->Error;$h->error="$n->Message ($n->Code)";return
false;}$h->error='';$bi=$wa."Result";return($sj->$bi?$sj->$bi:true);}function
sdb_request_all($wa,$bi,$Tf=array(),$ki=0){$H=array();$Ih=($ki?microtime(true):0);$z=(preg_match('~LIMIT\s+(\d+)\s*$~i',$Tf['SelectExpression'],$A)?$A[1]:0);do{$sj=sdb_request($wa,$Tf);if(!$sj)break;foreach($sj->$bi
as$tc)$H[]=$tc;if($z&&count($H)>=$z){$_GET["next"]=$sj->NextToken;break;}if($ki&&microtime(true)-$Ih>$ki)return
false;$Tf['NextToken']=$sj->NextToken;if($z)$Tf['SelectExpression']=preg_replace('~\d+\s*$~',$z-count($H),$Tf['SelectExpression']);}while($sj->NextToken);return$H;}$x="simpledb";$_f=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","IS NOT NULL");$od=array();$ud=array("count");$qc=array(array("json"));}$ic["mongo"]="MongoDB";if(isset($_GET["mongo"])){$mg=array("mongo","mongodb");define("DRIVER","mongo");if(class_exists('MongoDB')){class
Min_DB{var$extension="Mongo",$server_info=MongoClient::VERSION,$error,$last_id,$_link,$_db;function
connect($Pi,$Cf){return@new
MongoClient($Pi,$Cf);}function
query($F){return
false;}function
select_db($j){try{$this->_db=$this->_link->selectDB($j);return
true;}catch(Exception$Ec){$this->error=$Ec->getMessage();return
false;}}function
quote($P){return$P;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($G){foreach($G
as$fe){$I=array();foreach($fe
as$y=>$X){if(is_a($X,'MongoBinData'))$this->_charset[$y]=63;$I[$y]=(is_a($X,'MongoId')?'ObjectId("'.strval($X).'")':(is_a($X,'MongoDate')?gmdate("Y-m-d H:i:s",$X->sec)." GMT":(is_a($X,'MongoBinData')?$X->bin:(is_a($X,'MongoRegex')?strval($X):(is_object($X)?get_class($X):$X)))));}$this->_rows[]=$I;foreach($I
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=count($this->_rows);}function
fetch_assoc(){$I=current($this->_rows);if(!$I)return$I;$H=array();foreach($this->_rows[0]as$y=>$X)$H[$y]=$I[$y];next($this->_rows);return$H;}function
fetch_row(){$H=$this->fetch_assoc();if(!$H)return$H;return
array_values($H);}function
fetch_field(){$le=array_keys($this->_rows[0]);$B=$le[$this->_offset++];return(object)array('name'=>$B,'charsetnr'=>$this->_charset[$B],);}}class
Min_Driver
extends
Min_SQL{public$pg="_id";function
select($Q,$K,$Z,$rd,$Ef=array(),$z=1,$D=0,$rg=false){$K=($K==array("*")?array():array_fill_keys($K,true));$_h=array();foreach($Ef
as$X){$X=preg_replace('~ DESC$~','',$X,1,$Gb);$_h[$X]=($Gb?-1:1);}return
new
Min_Result($this->_conn->_db->selectCollection($Q)->find(array(),$K)->sort($_h)->limit($z!=""?+$z:0)->skip($D*$z));}function
insert($Q,$N){try{$H=$this->_conn->_db->selectCollection($Q)->insert($N);$this->_conn->errno=$H['code'];$this->_conn->error=$H['err'];$this->_conn->last_id=$N['_id'];return!$H['err'];}catch(Exception$Ec){$this->_conn->error=$Ec->getMessage();return
false;}}}function
get_databases($ed){global$h;$H=array();$Ub=$h->_link->listDBs();foreach($Ub['databases']as$l)$H[]=$l['name'];return$H;}function
count_tables($k){global$h;$H=array();foreach($k
as$l)$H[$l]=count($h->_link->selectDB($l)->getCollectionNames(true));return$H;}function
tables_list(){global$h;return
array_fill_keys($h->_db->getCollectionNames(true),'table');}function
drop_databases($k){global$h;foreach($k
as$l){$Rg=$h->_link->selectDB($l)->drop();if(!$Rg['ok'])return
false;}return
true;}function
indexes($Q,$i=null){global$h;$H=array();foreach($h->_db->selectCollection($Q)->getIndexInfo()as$v){$cc=array();foreach($v["key"]as$e=>$T)$cc[]=($T==-1?'1':null);$H[$v["name"]]=array("type"=>($v["name"]=="_id_"?"PRIMARY":($v["unique"]?"UNIQUE":"INDEX")),"columns"=>array_keys($v["key"]),"lengths"=>array(),"descs"=>$cc,);}return$H;}function
fields($Q){return
fields_from_edit();}function
found_rows($R,$Z){global$h;return$h->_db->selectCollection($_GET["select"])->count($Z);}$_f=array("=");}elseif(class_exists('MongoDB\Driver\Manager')){class
Min_DB{var$extension="MongoDB",$server_info=MONGODB_VERSION,$error,$last_id;var$_link;var$_db,$_db_name;function
connect($Pi,$Cf){$lb='MongoDB\Driver\Manager';return
new$lb($Pi,$Cf);}function
query($F){return
false;}function
select_db($j){$this->_db_name=$j;return
true;}function
quote($P){return$P;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($G){foreach($G
as$fe){$I=array();foreach($fe
as$y=>$X){if(is_a($X,'MongoDB\BSON\Binary'))$this->_charset[$y]=63;$I[$y]=(is_a($X,'MongoDB\BSON\ObjectID')?'MongoDB\BSON\ObjectID("'.strval($X).'")':(is_a($X,'MongoDB\BSON\UTCDatetime')?$X->toDateTime()->format('Y-m-d H:i:s'):(is_a($X,'MongoDB\BSON\Binary')?$X->bin:(is_a($X,'MongoDB\BSON\Regex')?strval($X):(is_object($X)?json_encode($X,256):$X)))));}$this->_rows[]=$I;foreach($I
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=$G->count;}function
fetch_assoc(){$I=current($this->_rows);if(!$I)return$I;$H=array();foreach($this->_rows[0]as$y=>$X)$H[$y]=$I[$y];next($this->_rows);return$H;}function
fetch_row(){$H=$this->fetch_assoc();if(!$H)return$H;return
array_values($H);}function
fetch_field(){$le=array_keys($this->_rows[0]);$B=$le[$this->_offset++];return(object)array('name'=>$B,'charsetnr'=>$this->_charset[$B],);}}class
Min_Driver
extends
Min_SQL{public$pg="_id";function
select($Q,$K,$Z,$rd,$Ef=array(),$z=1,$D=0,$rg=false){global$h;$K=($K==array("*")?array():array_fill_keys($K,1));if(count($K)&&!isset($K['_id']))$K['_id']=0;$Z=where_to_query($Z);$_h=array();foreach($Ef
as$X){$X=preg_replace('~ DESC$~','',$X,1,$Gb);$_h[$X]=($Gb?-1:1);}if(isset($_GET['limit'])&&is_numeric($_GET['limit'])&&$_GET['limit']>0)$z=$_GET['limit'];$z=min(200,max(1,(int)$z));$xh=$D*$z;$lb='MongoDB\Driver\Query';$F=new$lb($Z,array('projection'=>$K,'limit'=>$z,'skip'=>$xh,'sort'=>$_h));$Ug=$h->_link->executeQuery("$h->_db_name.$Q",$F);return
new
Min_Result($Ug);}function
update($Q,$N,$Ag,$z=0,$L="\n"){global$h;$l=$h->_db_name;$Z=sql_query_where_parser($Ag);$lb='MongoDB\Driver\BulkWrite';$ab=new$lb(array());if(isset($N['_id']))unset($N['_id']);$Og=array();foreach($N
as$y=>$Y){if($Y=='NULL'){$Og[$y]=1;unset($N[$y]);}}$Oi=array('$set'=>$N);if(count($Og))$Oi['$unset']=$Og;$ab->update($Z,$Oi,array('upsert'=>false));$Ug=$h->_link->executeBulkWrite("$l.$Q",$ab);$h->affected_rows=$Ug->getModifiedCount();return
true;}function
delete($Q,$Ag,$z=0){global$h;$l=$h->_db_name;$Z=sql_query_where_parser($Ag);$lb='MongoDB\Driver\BulkWrite';$ab=new$lb(array());$ab->delete($Z,array('limit'=>$z));$Ug=$h->_link->executeBulkWrite("$l.$Q",$ab);$h->affected_rows=$Ug->getDeletedCount();return
true;}function
insert($Q,$N){global$h;$l=$h->_db_name;$lb='MongoDB\Driver\BulkWrite';$ab=new$lb(array());if(isset($N['_id'])&&empty($N['_id']))unset($N['_id']);$ab->insert($N);$Ug=$h->_link->executeBulkWrite("$l.$Q",$ab);$h->affected_rows=$Ug->getInsertedCount();return
true;}}function
get_databases($ed){global$h;$H=array();$lb='MongoDB\Driver\Command';$tb=new$lb(array('listDatabases'=>1));$Ug=$h->_link->executeCommand('admin',$tb);foreach($Ug
as$Ub){foreach($Ub->databases
as$l)$H[]=$l->name;}return$H;}function
count_tables($k){$H=array();return$H;}function
tables_list(){global$h;$lb='MongoDB\Driver\Command';$tb=new$lb(array('listCollections'=>1));$Ug=$h->_link->executeCommand($h->_db_name,$tb);$rb=array();foreach($Ug
as$G)$rb[$G->name]='table';return$rb;}function
drop_databases($k){return
false;}function
indexes($Q,$i=null){global$h;$H=array();$lb='MongoDB\Driver\Command';$tb=new$lb(array('listIndexes'=>$Q));$Ug=$h->_link->executeCommand($h->_db_name,$tb);foreach($Ug
as$v){$cc=array();$f=array();foreach(get_object_vars($v->key)as$e=>$T){$cc[]=($T==-1?'1':null);$f[]=$e;}$H[$v->name]=array("type"=>($v->name=="_id_"?"PRIMARY":(isset($v->unique)?"UNIQUE":"INDEX")),"columns"=>$f,"lengths"=>array(),"descs"=>$cc,);}return$H;}function
fields($Q){$p=fields_from_edit();if(!count($p)){global$m;$G=$m->select($Q,array("*"),null,null,array(),10);while($I=$G->fetch_assoc()){foreach($I
as$y=>$X){$I[$y]=null;$p[$y]=array("field"=>$y,"type"=>"string","null"=>($y!=$m->primary),"auto_increment"=>($y==$m->primary),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1,),);}}}return$p;}function
found_rows($R,$Z){global$h;$Z=where_to_query($Z);$lb='MongoDB\Driver\Command';$tb=new$lb(array('count'=>$R['Name'],'query'=>$Z));$Ug=$h->_link->executeCommand($h->_db_name,$tb);$si=$Ug->toArray();return$si[0]->n;}function
sql_query_where_parser($Ag){$Ag=trim(preg_replace('/WHERE[\s]?[(]?\(?/','',$Ag));$Ag=preg_replace('/\)\)\)$/',')',$Ag);$pj=explode(' AND ',$Ag);$qj=explode(') OR (',$Ag);$Z=array();foreach($pj
as$nj)$Z[]=trim($nj);if(count($qj)==1)$qj=array();elseif(count($qj)>1)$Z=array();return
where_to_query($Z,$qj);}function
where_to_query($lj=array(),$mj=array()){global$b;$Pb=array();foreach(array('and'=>$lj,'or'=>$mj)as$T=>$Z){if(is_array($Z)){foreach($Z
as$Lc){list($ob,$yf,$X)=explode(" ",$Lc,3);if($ob=="_id"){$X=str_replace('MongoDB\BSON\ObjectID("',"",$X);$X=str_replace('")',"",$X);$lb='MongoDB\BSON\ObjectID';$X=new$lb($X);}if(!in_array($yf,$b->operators))continue;if(preg_match('~^\(f\)(.+)~',$yf,$A)){$X=(float)$X;$yf=$A[1];}elseif(preg_match('~^\(date\)(.+)~',$yf,$A)){$Rb=new
DateTime($X);$lb='MongoDB\BSON\UTCDatetime';$X=new$lb($Rb->getTimestamp()*1000);$yf=$A[1];}switch($yf){case'=':$yf='$eq';break;case'!=':$yf='$ne';break;case'>':$yf='$gt';break;case'<':$yf='$lt';break;case'>=':$yf='$gte';break;case'<=':$yf='$lte';break;case'regex':$yf='$regex';break;default:continue
2;}if($T=='and')$Pb['$and'][]=array($ob=>array($yf=>$X));elseif($T=='or')$Pb['$or'][]=array($ob=>array($yf=>$X));}}}return$Pb;}$_f=array("=","!=",">","<",">=","<=","regex","(f)=","(f)!=","(f)>","(f)<","(f)>=","(f)<=","(date)=","(date)!=","(date)>","(date)<","(date)>=","(date)<=",);}function
table($u){return$u;}function
idf_escape($u){return$u;}function
table_status($B="",$Sc=false){$H=array();foreach(tables_list()as$Q=>$T){$H[$Q]=array("Name"=>$Q);if($B==$Q)return$H[$Q];}return$H;}function
create_database($l,$d){return
true;}function
last_id(){global$h;return$h->last_id;}function
error(){global$h;return
h($h->error);}function
collations(){return
array();}function
logged_user(){global$b;$Kb=$b->credentials();return$Kb[1];}function
connect(){global$b;$h=new
Min_DB;list($M,$V,$E)=$b->credentials();$Cf=array();if($V.$E!=""){$Cf["username"]=$V;$Cf["password"]=$E;}$l=$b->database();if($l!="")$Cf["db"]=$l;if(($Ma=getenv("MONGO_AUTH_SOURCE")))$Cf["authSource"]=$Ma;try{$h->_link=$h->connect("mongodb://$M",$Cf);if($E!=""){$Cf["password"]="";try{$h->connect("mongodb://$M",$Cf);return
lang(22);}catch(Exception$Ec){}}return$h;}catch(Exception$Ec){return$Ec->getMessage();}}function
alter_indexes($Q,$c){global$h;foreach($c
as$X){list($T,$B,$N)=$X;if($N=="DROP")$H=$h->_db->command(array("deleteIndexes"=>$Q,"index"=>$B));else{$f=array();foreach($N
as$e){$e=preg_replace('~ DESC$~','',$e,1,$Gb);$f[$e]=($Gb?-1:1);}$H=$h->_db->selectCollection($Q)->ensureIndex($f,array("unique"=>($T=="UNIQUE"),"name"=>$B,));}if($H['errmsg']){$h->error=$H['errmsg'];return
false;}}return
true;}function
support($Tc){return
preg_match("~database|indexes|descidx~",$Tc);}function
db_collation($l,$qb){}function
information_schema(){}function
is_view($R){}function
convert_field($o){}function
unconvert_field($o,$H){return$H;}function
foreign_keys($Q){return
array();}function
fk_support($R){}function
engines(){return
array();}function
alter_table($Q,$B,$p,$gd,$vb,$yc,$d,$Na,$Zf){global$h;if($Q==""){$h->_db->createCollection($B);return
true;}}function
drop_tables($S){global$h;foreach($S
as$Q){$Rg=$h->_db->selectCollection($Q)->drop();if(!$Rg['ok'])return
false;}return
true;}function
truncate_tables($S){global$h;foreach($S
as$Q){$Rg=$h->_db->selectCollection($Q)->remove();if(!$Rg['ok'])return
false;}return
true;}$x="mongo";$od=array();$ud=array();$qc=array(array("json"));}$ic["elastic"]="Elasticsearch (beta)";if(isset($_GET["elastic"])){$mg=array("json + allow_url_fopen");define("DRIVER","elastic");if(function_exists('json_decode')&&ini_bool('allow_url_fopen')){class
Min_DB{var$extension="JSON",$server_info,$errno,$error,$_url;function
rootQuery($dg,$Bb=array(),$We='GET'){@ini_set('track_errors',1);$Xc=@file_get_contents("$this->_url/".ltrim($dg,'/'),false,stream_context_create(array('http'=>array('method'=>$We,'content'=>$Bb===null?$Bb:json_encode($Bb),'header'=>'Content-Type: application/json','ignore_errors'=>1,))));if(!$Xc){$this->error=$php_errormsg;return$Xc;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error=$Xc;return
false;}$H=json_decode($Xc,true);if($H===null){$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$Ab=get_defined_constants(true);foreach($Ab['json']as$B=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$B)){$this->error=$B;break;}}}}return$H;}function
query($dg,$Bb=array(),$We='GET'){return$this->rootQuery(($this->_db!=""?"$this->_db/":"/").ltrim($dg,'/'),$Bb,$We);}function
connect($M,$V,$E){preg_match('~^(https?://)?(.*)~',$M,$A);$this->_url=($A[1]?$A[1]:"http://")."$V:$E@$A[2]";$H=$this->query('');if($H)$this->server_info=$H['version']['number'];return(bool)$H;}function
select_db($j){$this->_db=$j;return
true;}function
quote($P){return$P;}}class
Min_Result{var$num_rows,$_rows;function
__construct($J){$this->num_rows=count($J);$this->_rows=$J;reset($this->_rows);}function
fetch_assoc(){$H=current($this->_rows);next($this->_rows);return$H;}function
fetch_row(){return
array_values($this->fetch_assoc());}}}class
Min_Driver
extends
Min_SQL{function
select($Q,$K,$Z,$rd,$Ef=array(),$z=1,$D=0,$rg=false){global$b;$Pb=array();$F="$Q/_search";if($K!=array("*"))$Pb["fields"]=$K;if($Ef){$_h=array();foreach($Ef
as$ob){$ob=preg_replace('~ DESC$~','',$ob,1,$Gb);$_h[]=($Gb?array($ob=>"desc"):$ob);}$Pb["sort"]=$_h;}if($z){$Pb["size"]=+$z;if($D)$Pb["from"]=($D*$z);}foreach($Z
as$X){list($ob,$yf,$X)=explode(" ",$X,3);if($ob=="_id")$Pb["query"]["ids"]["values"][]=$X;elseif($ob.$X!=""){$fi=array("term"=>array(($ob!=""?$ob:"_all")=>$X));if($yf=="=")$Pb["query"]["filtered"]["filter"]["and"][]=$fi;else$Pb["query"]["filtered"]["query"]["bool"]["must"][]=$fi;}}if($Pb["query"]&&!$Pb["query"]["filtered"]["query"]&&!$Pb["query"]["ids"])$Pb["query"]["filtered"]["query"]=array("match_all"=>array());$Ih=microtime(true);$hh=$this->_conn->query($F,$Pb);if($rg)echo$b->selectQuery("$F: ".json_encode($Pb),$Ih,!$hh);if(!$hh)return
false;$H=array();foreach($hh['hits']['hits']as$Dd){$I=array();if($K==array("*"))$I["_id"]=$Dd["_id"];$p=$Dd['_source'];if($K!=array("*")){$p=array();foreach($K
as$y)$p[$y]=$Dd['fields'][$y];}foreach($p
as$y=>$X){if($Pb["fields"])$X=$X[0];$I[$y]=(is_array($X)?json_encode($X):$X);}$H[]=$I;}return
new
Min_Result($H);}function
update($T,$Fg,$Ag,$z=0,$L="\n"){$bg=preg_split('~ *= *~',$Ag);if(count($bg)==2){$t=trim($bg[1]);$F="$T/$t";return$this->_conn->query($F,$Fg,'POST');}return
false;}function
insert($T,$Fg){$t="";$F="$T/$t";$Rg=$this->_conn->query($F,$Fg,'POST');$this->_conn->last_id=$Rg['_id'];return$Rg['created'];}function
delete($T,$Ag,$z=0){$Id=array();if(is_array($_GET["where"])&&$_GET["where"]["_id"])$Id[]=$_GET["where"]["_id"];if(is_array($_POST['check'])){foreach($_POST['check']as$eb){$bg=preg_split('~ *= *~',$eb);if(count($bg)==2)$Id[]=trim($bg[1]);}}$this->_conn->affected_rows=0;foreach($Id
as$t){$F="{$T}/{$t}";$Rg=$this->_conn->query($F,'{}','DELETE');if(is_array($Rg)&&$Rg['found']==true)$this->_conn->affected_rows++;}return$this->_conn->affected_rows;}}function
connect(){global$b;$h=new
Min_DB;list($M,$V,$E)=$b->credentials();if($E!=""&&$h->connect($M,$V,""))return
lang(22);if($h->connect($M,$V,$E))return$h;return$h->error;}function
support($Tc){return
preg_match("~database|table|columns~",$Tc);}function
logged_user(){global$b;$Kb=$b->credentials();return$Kb[1];}function
get_databases(){global$h;$H=$h->rootQuery('_aliases');if($H){$H=array_keys($H);sort($H,SORT_STRING);}return$H;}function
collations(){return
array();}function
db_collation($l,$qb){}function
engines(){return
array();}function
count_tables($k){global$h;$H=array();$G=$h->query('_stats');if($G&&$G['indices']){$Qd=$G['indices'];foreach($Qd
as$Pd=>$Jh){$Od=$Jh['total']['indexing'];$H[$Pd]=$Od['index_total'];}}return$H;}function
tables_list(){global$h;$H=$h->query('_mapping');if($H)$H=array_fill_keys(array_keys($H[$h->_db]["mappings"]),'table');return$H;}function
table_status($B="",$Sc=false){global$h;$hh=$h->query("_search",array("size"=>0,"aggregations"=>array("count_by_type"=>array("terms"=>array("field"=>"_type")))),"POST");$H=array();if($hh){$S=$hh["aggregations"]["count_by_type"]["buckets"];foreach($S
as$Q){$H[$Q["key"]]=array("Name"=>$Q["key"],"Engine"=>"table","Rows"=>$Q["doc_count"],);if($B!=""&&$B==$Q["key"])return$H[$B];}}return$H;}function
error(){global$h;return
h($h->error);}function
information_schema(){}function
is_view($R){}function
indexes($Q,$i=null){return
array(array("type"=>"PRIMARY","columns"=>array("_id")),);}function
fields($Q){global$h;$G=$h->query("$Q/_mapping");$H=array();if($G){$Ee=$G[$Q]['properties'];if(!$Ee)$Ee=$G[$h->_db]['mappings'][$Q]['properties'];if($Ee){foreach($Ee
as$B=>$o){$H[$B]=array("field"=>$B,"full_type"=>$o["type"],"type"=>$o["type"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);if($o["properties"]){unset($H[$B]["privileges"]["insert"]);unset($H[$B]["privileges"]["update"]);}}}}return$H;}function
foreign_keys($Q){return
array();}function
table($u){return$u;}function
idf_escape($u){return$u;}function
convert_field($o){}function
unconvert_field($o,$H){return$H;}function
fk_support($R){}function
found_rows($R,$Z){return
null;}function
create_database($l){global$h;return$h->rootQuery(urlencode($l),null,'PUT');}function
drop_databases($k){global$h;return$h->rootQuery(urlencode(implode(',',$k)),array(),'DELETE');}function
alter_table($Q,$B,$p,$gd,$vb,$yc,$d,$Na,$Zf){global$h;$xg=array();foreach($p
as$Qc){$Vc=trim($Qc[1][0]);$Wc=trim($Qc[1][1]?$Qc[1][1]:"text");$xg[$Vc]=array('type'=>$Wc);}if(!empty($xg))$xg=array('properties'=>$xg);return$h->query("_mapping/{$B}",$xg,'PUT');}function
drop_tables($S){global$h;$H=true;foreach($S
as$Q)$H=$H&&$h->query(urlencode($Q),array(),'DELETE');return$H;}function
last_id(){global$h;return$h->last_id;}$x="elastic";$_f=array("=","query");$od=array();$ud=array();$qc=array(array("json"));$U=array();$Mh=array();foreach(array(lang(27)=>array("long"=>3,"integer"=>5,"short"=>8,"byte"=>10,"double"=>20,"float"=>66,"half_float"=>12,"scaled_float"=>21),lang(28)=>array("date"=>10),lang(25)=>array("string"=>65535,"text"=>65535),lang(29)=>array("binary"=>255),)as$y=>$X){$U+=$X;$Mh[$y]=array_keys($X);}}$ic["clickhouse"]="ClickHouse (alpha)";if(isset($_GET["clickhouse"])){define("DRIVER","clickhouse");class
Min_DB{var$extension="JSON",$server_info,$errno,$_result,$error,$_url;var$_db='default';function
rootQuery($l,$F){@ini_set('track_errors',1);$Xc=@file_get_contents("$this->_url/?database=$l",false,stream_context_create(array('http'=>array('method'=>'POST','content'=>$this->isQuerySelectLike($F)?"$F FORMAT JSONCompact":$F,'header'=>'Content-type: application/x-www-form-urlencoded','ignore_errors'=>1,))));if($Xc===false){$this->error=$php_errormsg;return$Xc;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error=$Xc;return
false;}$H=json_decode($Xc,true);if($H===null){if(!$this->isQuerySelectLike($F)&&$Xc==='')return
true;$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$Ab=get_defined_constants(true);foreach($Ab['json']as$B=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$B)){$this->error=$B;break;}}}}return
new
Min_Result($H);}function
isQuerySelectLike($F){return(bool)preg_match('~^(select|show)~i',$F);}function
query($F){return$this->rootQuery($this->_db,$F);}function
connect($M,$V,$E){preg_match('~^(https?://)?(.*)~',$M,$A);$this->_url=($A[1]?$A[1]:"http://")."$V:$E@$A[2]";$H=$this->query('SELECT 1');return(bool)$H;}function
select_db($j){$this->_db=$j;return
true;}function
quote($P){return"'".addcslashes($P,"\\'")."'";}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($F,$o=0){$G=$this->query($F);return$G['data'];}}class
Min_Result{var$num_rows,$_rows,$columns,$meta,$_offset=0;function
__construct($G){$this->num_rows=$G['rows'];$this->_rows=$G['data'];$this->meta=$G['meta'];$this->columns=array_column($this->meta,'name');reset($this->_rows);}function
fetch_assoc(){$I=current($this->_rows);next($this->_rows);return$I===false?false:array_combine($this->columns,$I);}function
fetch_row(){$I=current($this->_rows);next($this->_rows);return$I;}function
fetch_field(){$e=$this->_offset++;$H=new
stdClass;if($e<count($this->columns)){$H->name=$this->meta[$e]['name'];$H->orgname=$H->name;$H->type=$this->meta[$e]['type'];}return$H;}}class
Min_Driver
extends
Min_SQL{function
delete($Q,$Ag,$z=0){if($Ag==='')$Ag='WHERE 1=1';return
queries("ALTER TABLE ".table($Q)." DELETE $Ag");}function
update($Q,$N,$Ag,$z=0,$L="\n"){$aj=array();foreach($N
as$y=>$X)$aj[]="$y = $X";$F=$L.implode(",$L",$aj);return
queries("ALTER TABLE ".table($Q)." UPDATE $F$Ag");}}function
idf_escape($u){return"`".str_replace("`","``",$u)."`";}function
table($u){return
idf_escape($u);}function
explain($h,$F){return'';}function
found_rows($R,$Z){$J=get_vals("SELECT COUNT(*) FROM ".idf_escape($R["Name"]).($Z?" WHERE ".implode(" AND ",$Z):""));return
empty($J)?false:$J[0];}function
alter_table($Q,$B,$p,$gd,$vb,$yc,$d,$Na,$Zf){$c=$Ef=array();foreach($p
as$o){if($o[1][2]===" NULL")$o[1][1]=" Nullable({$o[1][1]})";elseif($o[1][2]===' NOT NULL')$o[1][2]='';if($o[1][3])$o[1][3]='';$c[]=($o[1]?($Q!=""?($o[0]!=""?"MODIFY COLUMN ":"ADD COLUMN "):" ").implode($o[1]):"DROP COLUMN ".idf_escape($o[0]));$Ef[]=$o[1][0];}$c=array_merge($c,$gd);$O=($yc?" ENGINE ".$yc:"");if($Q=="")return
queries("CREATE TABLE ".table($B)." (\n".implode(",\n",$c)."\n)$O$Zf".' ORDER BY ('.implode(',',$Ef).')');if($Q!=$B){$G=queries("RENAME TABLE ".table($Q)." TO ".table($B));if($c)$Q=$B;else
return$G;}if($O)$c[]=ltrim($O);return($c||$Zf?queries("ALTER TABLE ".table($Q)."\n".implode(",\n",$c).$Zf):true);}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($fj){return
drop_tables($fj);}function
drop_tables($S){return
apply_queries("DROP TABLE",$S);}function
connect(){global$b;$h=new
Min_DB;$Kb=$b->credentials();if($h->connect($Kb[0],$Kb[1],$Kb[2]))return$h;return$h->error;}function
get_databases($ed){global$h;$G=get_rows('SHOW DATABASES');$H=array();foreach($G
as$I)$H[]=$I['name'];sort($H);return$H;}function
limit($F,$Z,$z,$C=0,$L=" "){return" $F$Z".($z!==null?$L."LIMIT $z".($C?", $C":""):"");}function
limit1($Q,$F,$Z,$L="\n"){return
limit($F,$Z,1,0,$L);}function
db_collation($l,$qb){}function
engines(){return
array('MergeTree');}function
logged_user(){global$b;$Kb=$b->credentials();return$Kb[1];}function
tables_list(){$G=get_rows('SHOW TABLES');$H=array();foreach($G
as$I)$H[$I['name']]='table';ksort($H);return$H;}function
count_tables($k){return
array();}function
table_status($B="",$Sc=false){global$h;$H=array();$S=get_rows("SELECT name, engine FROM system.tables WHERE database = ".q($h->_db));foreach($S
as$Q){$H[$Q['name']]=array('Name'=>$Q['name'],'Engine'=>$Q['engine'],);if($B===$Q['name'])return$H[$Q['name']];}return$H;}function
is_view($R){return
false;}function
fk_support($R){return
false;}function
convert_field($o){}function
unconvert_field($o,$H){if(in_array($o['type'],array("Int8","Int16","Int32","Int64","UInt8","UInt16","UInt32","UInt64","Float32","Float64")))return"to$o[type]($H)";return$H;}function
fields($Q){$H=array();$G=get_rows("SELECT name, type, default_expression FROM system.columns WHERE ".idf_escape('table')." = ".q($Q));foreach($G
as$I){$T=trim($I['type']);$kf=strpos($T,'Nullable(')===0;$H[trim($I['name'])]=array("field"=>trim($I['name']),"full_type"=>$T,"type"=>$T,"default"=>trim($I['default_expression']),"null"=>$kf,"auto_increment"=>'0',"privileges"=>array("insert"=>1,"select"=>1,"update"=>0),);}return$H;}function
indexes($Q,$i=null){return
array();}function
foreign_keys($Q){return
array();}function
collations(){return
array();}function
information_schema($l){return
false;}function
error(){global$h;return
h($h->error);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($fh){return
true;}function
auto_increment(){return'';}function
last_id(){return
0;}function
support($Tc){return
preg_match("~^(columns|sql|status|table|drop_col)$~",$Tc);}$x="clickhouse";$U=array();$Mh=array();foreach(array(lang(27)=>array("Int8"=>3,"Int16"=>5,"Int32"=>10,"Int64"=>19,"UInt8"=>3,"UInt16"=>5,"UInt32"=>10,"UInt64"=>20,"Float32"=>7,"Float64"=>16,'Decimal'=>38,'Decimal32'=>9,'Decimal64'=>18,'Decimal128'=>38),lang(28)=>array("Date"=>13,"DateTime"=>20),lang(25)=>array("String"=>0),lang(29)=>array("FixedString"=>0),)as$y=>$X){$U+=$X;$Mh[$y]=array_keys($X);}$Ni=array();$_f=array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL");$od=array();$ud=array("avg","count","count distinct","max","min","sum");$qc=array();}$ic=array("server"=>"MySQL")+$ic;if(!defined("DRIVER")){$mg=array("MySQLi","MySQL","PDO_MySQL");define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
__construct(){parent::init();}function
connect($M="",$V="",$E="",$j=null,$ig=null,$zh=null){global$b;mysqli_report(MYSQLI_REPORT_OFF);list($Ed,$ig)=explode(":",$M,2);$Hh=$b->connectSsl();if($Hh)$this->ssl_set($Hh['key'],$Hh['cert'],$Hh['ca'],'','');$H=@$this->real_connect(($M!=""?$Ed:ini_get("mysqli.default_host")),($M.$V!=""?$V:ini_get("mysqli.default_user")),($M.$V.$E!=""?$E:ini_get("mysqli.default_pw")),$j,(is_numeric($ig)?$ig:ini_get("mysqli.default_port")),(!is_numeric($ig)?$ig:$zh),($Hh?64:0));$this->options(MYSQLI_OPT_LOCAL_INFILE,false);return$H;}function
set_charset($db){if(parent::set_charset($db))return
true;parent::set_charset('utf8');return$this->query("SET NAMES $db");}function
result($F,$o=0){$G=$this->query($F);if(!$G)return
false;$I=$G->fetch_array();return$I[$o];}function
quote($P){return"'".$this->escape_string($P)."'";}}}elseif(extension_loaded("mysql")&&!((ini_bool("sql.safe_mode")||ini_bool("mysql.allow_local_infile"))&&extension_loaded("pdo_mysql"))){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($M,$V,$E){if(ini_bool("mysql.allow_local_infile")){$this->error=lang(32,"'mysql.allow_local_infile'","MySQLi","PDO_MySQL");return
false;}$this->_link=@mysql_connect(($M!=""?$M:ini_get("mysql.default_host")),("$M$V"!=""?$V:ini_get("mysql.default_user")),("$M$V$E"!=""?$E:ini_get("mysql.default_password")),true,131072);if($this->_link)$this->server_info=mysql_get_server_info($this->_link);else$this->error=mysql_error();return(bool)$this->_link;}function
set_charset($db){if(function_exists('mysql_set_charset')){if(mysql_set_charset($db,$this->_link))return
true;mysql_set_charset('utf8',$this->_link);}return$this->query("SET NAMES $db");}function
quote($P){return"'".mysql_real_escape_string($P,$this->_link)."'";}function
select_db($j){return
mysql_select_db($j,$this->_link);}function
query($F,$Hi=false){$G=@($Hi?mysql_unbuffered_query($F,$this->_link):mysql_query($F,$this->_link));$this->error="";if(!$G){$this->errno=mysql_errno($this->_link);$this->error=mysql_error($this->_link);return
false;}if($G===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return
true;}return
new
Min_Result($G);}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($F,$o=0){$G=$this->query($F);if(!$G||!$G->num_rows)return
false;return
mysql_result($G->_result,0,$o);}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($G){$this->_result=$G;$this->num_rows=mysql_num_rows($G);}function
fetch_assoc(){return
mysql_fetch_assoc($this->_result);}function
fetch_row(){return
mysql_fetch_row($this->_result);}function
fetch_field(){$H=mysql_fetch_field($this->_result,$this->_offset++);$H->orgtable=$H->table;$H->orgname=$H->name;$H->charsetnr=($H->blob?63:0);return$H;}function
__destruct(){mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
connect($M,$V,$E){global$b;$Cf=array(PDO::MYSQL_ATTR_LOCAL_INFILE=>false);$Hh=$b->connectSsl();if($Hh){if(!empty($Hh['key']))$Cf[PDO::MYSQL_ATTR_SSL_KEY]=$Hh['key'];if(!empty($Hh['cert']))$Cf[PDO::MYSQL_ATTR_SSL_CERT]=$Hh['cert'];if(!empty($Hh['ca']))$Cf[PDO::MYSQL_ATTR_SSL_CA]=$Hh['ca'];}$this->dsn("mysql:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\d)~',';port=\1',$M)),$V,$E,$Cf);return
true;}function
set_charset($db){$this->query("SET NAMES $db");}function
select_db($j){return$this->query("USE ".idf_escape($j));}function
query($F,$Hi=false){$this->setAttribute(1000,!$Hi);return
parent::query($F,$Hi);}}}class
Min_Driver
extends
Min_SQL{function
insert($Q,$N){return($N?parent::insert($Q,$N):queries("INSERT INTO ".table($Q)." ()\nVALUES ()"));}function
insertUpdate($Q,$J,$pg){$f=array_keys(reset($J));$ng="INSERT INTO ".table($Q)." (".implode(", ",$f).") VALUES\n";$aj=array();foreach($f
as$y)$aj[$y]="$y = VALUES($y)";$Ph="\nON DUPLICATE KEY UPDATE ".implode(", ",$aj);$aj=array();$ye=0;foreach($J
as$N){$Y="(".implode(", ",$N).")";if($aj&&(strlen($ng)+$ye+strlen($Y)+strlen($Ph)>1e6)){if(!queries($ng.implode(",\n",$aj).$Ph))return
false;$aj=array();$ye=0;}$aj[]=$Y;$ye+=strlen($Y)+2;}return
queries($ng.implode(",\n",$aj).$Ph);}function
slowQuery($F,$ki){if(min_version('5.7.8','10.1.2')){if(preg_match('~MariaDB~',$this->_conn->server_info))return"SET STATEMENT max_statement_time=$ki FOR $F";elseif(preg_match('~^(SELECT\b)(.+)~is',$F,$A))return"$A[1] /*+ MAX_EXECUTION_TIME(".($ki*1000).") */ $A[2]";}}function
convertSearch($u,$X,$o){return(preg_match('~char|text|enum|set~',$o["type"])&&!preg_match("~^utf8~",$o["collation"])&&preg_match('~[\x80-\xFF]~',$X['val'])?"CONVERT($u USING ".charset($this->_conn).")":$u);}function
warnings(){$G=$this->_conn->query("SHOW WARNINGS");if($G&&$G->num_rows){ob_start();select($G);return
ob_get_clean();}}function
tableHelp($B){$Fe=preg_match('~MariaDB~',$this->_conn->server_info);if(information_schema(DB))return
strtolower(($Fe?"information-schema-$B-table/":str_replace("_","-",$B)."-table.html"));if(DB=="mysql")return($Fe?"mysql$B-table/":"system-database.html");}}function
idf_escape($u){return"`".str_replace("`","``",$u)."`";}function
table($u){return
idf_escape($u);}function
connect(){global$b,$U,$Mh;$h=new
Min_DB;$Kb=$b->credentials();if($h->connect($Kb[0],$Kb[1],$Kb[2])){$h->set_charset(charset($h));$h->query("SET sql_quote_show_create = 1, autocommit = 1");if(min_version('5.7.8',10.2,$h)){$Mh[lang(25)][]="json";$U["json"]=4294967295;}return$h;}$H=$h->error;if(function_exists('iconv')&&!is_utf8($H)&&strlen($dh=iconv("windows-1250","utf-8",$H))>strlen($H))$H=$dh;return$H;}function
get_databases($ed){$H=get_session("dbs");if($H===null){$F=(min_version(5)?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA ORDER BY SCHEMA_NAME":"SHOW DATABASES");$H=($ed?slow_query($F):get_vals($F));restart_session();set_session("dbs",$H);stop_session();}return$H;}function
limit($F,$Z,$z,$C=0,$L=" "){return" $F$Z".($z!==null?$L."LIMIT $z".($C?" OFFSET $C":""):"");}function
limit1($Q,$F,$Z,$L="\n"){return
limit($F,$Z,1,0,$L);}function
db_collation($l,$qb){global$h;$H=null;$Hb=$h->result("SHOW CREATE DATABASE ".idf_escape($l),1);if(preg_match('~ COLLATE ([^ ]+)~',$Hb,$A))$H=$A[1];elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$Hb,$A))$H=$qb[$A[1]][-1];return$H;}function
engines(){$H=array();foreach(get_rows("SHOW ENGINES")as$I){if(preg_match("~YES|DEFAULT~",$I["Support"]))$H[]=$I["Engine"];}return$H;}function
logged_user(){global$h;return$h->result("SELECT USER()");}function
tables_list(){return
get_key_vals(min_version(5)?"SELECT TABLE_NAME, TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ORDER BY TABLE_NAME":"SHOW TABLES");}function
count_tables($k){$H=array();foreach($k
as$l)$H[$l]=count(get_vals("SHOW TABLES IN ".idf_escape($l)));return$H;}function
table_status($B="",$Sc=false){$H=array();foreach(get_rows($Sc&&min_version(5)?"SELECT TABLE_NAME AS Name, ENGINE AS Engine, TABLE_COMMENT AS Comment FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ".($B!=""?"AND TABLE_NAME = ".q($B):"ORDER BY Name"):"SHOW TABLE STATUS".($B!=""?" LIKE ".q(addcslashes($B,"%_\\")):""))as$I){if($I["Engine"]=="InnoDB")$I["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\1',$I["Comment"]);if(!isset($I["Engine"]))$I["Comment"]="";if($B!="")return$I;$H[$I["Name"]]=$I;}return$H;}function
is_view($R){return$R["Engine"]===null;}function
fk_support($R){return
preg_match('~InnoDB|IBMDB2I~i',$R["Engine"])||(preg_match('~NDB~i',$R["Engine"])&&min_version(5.6));}function
fields($Q){$H=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($Q))as$I){preg_match('~^([^( ]+)(?:\((.+)\))?( unsigned)?( zerofill)?$~',$I["Type"],$A);$H[$I["Field"]]=array("field"=>$I["Field"],"full_type"=>$I["Type"],"type"=>$A[1],"length"=>$A[2],"unsigned"=>ltrim($A[3].$A[4]),"default"=>($I["Default"]!=""||preg_match("~char|set~",$A[1])?$I["Default"]:null),"null"=>($I["Null"]=="YES"),"auto_increment"=>($I["Extra"]=="auto_increment"),"on_update"=>(preg_match('~^on update (.+)~i',$I["Extra"],$A)?$A[1]:""),"collation"=>$I["Collation"],"privileges"=>array_flip(preg_split('~, *~',$I["Privileges"])),"comment"=>$I["Comment"],"primary"=>($I["Key"]=="PRI"),"generated"=>preg_match('~^(VIRTUAL|PERSISTENT|STORED)~',$I["Extra"]),);}return$H;}function
indexes($Q,$i=null){$H=array();foreach(get_rows("SHOW INDEX FROM ".table($Q),$i)as$I){$B=$I["Key_name"];$H[$B]["type"]=($B=="PRIMARY"?"PRIMARY":($I["Index_type"]=="FULLTEXT"?"FULLTEXT":($I["Non_unique"]?($I["Index_type"]=="SPATIAL"?"SPATIAL":"INDEX"):"UNIQUE")));$H[$B]["columns"][]=$I["Column_name"];$H[$B]["lengths"][]=($I["Index_type"]=="SPATIAL"?null:$I["Sub_part"]);$H[$B]["descs"][]=null;}return$H;}function
foreign_keys($Q){global$h,$vf;static$fg='(?:`(?:[^`]|``)+`|"(?:[^"]|"")+")';$H=array();$Ib=$h->result("SHOW CREATE TABLE ".table($Q),1);if($Ib){preg_match_all("~CONSTRAINT ($fg) FOREIGN KEY ?\\(((?:$fg,? ?)+)\\) REFERENCES ($fg)(?:\\.($fg))? \\(((?:$fg,? ?)+)\\)(?: ON DELETE ($vf))?(?: ON UPDATE ($vf))?~",$Ib,$Ie,PREG_SET_ORDER);foreach($Ie
as$A){preg_match_all("~$fg~",$A[2],$Ah);preg_match_all("~$fg~",$A[5],$ci);$H[idf_unescape($A[1])]=array("db"=>idf_unescape($A[4]!=""?$A[3]:$A[4]),"table"=>idf_unescape($A[4]!=""?$A[4]:$A[3]),"source"=>array_map('idf_unescape',$Ah[0]),"target"=>array_map('idf_unescape',$ci[0]),"on_delete"=>($A[6]?$A[6]:"RESTRICT"),"on_update"=>($A[7]?$A[7]:"RESTRICT"),);}}return$H;}function
view($B){global$h;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\s+AS\s+~isU','',$h->result("SHOW CREATE VIEW ".table($B),1)));}function
collations(){$H=array();foreach(get_rows("SHOW COLLATION")as$I){if($I["Default"])$H[$I["Charset"]][-1]=$I["Collation"];else$H[$I["Charset"]][]=$I["Collation"];}ksort($H);foreach($H
as$y=>$X)asort($H[$y]);return$H;}function
information_schema($l){return(min_version(5)&&$l=="information_schema")||(min_version(5.5)&&$l=="performance_schema");}function
error(){global$h;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$h->error));}function
create_database($l,$d){return
queries("CREATE DATABASE ".idf_escape($l).($d?" COLLATE ".q($d):""));}function
drop_databases($k){$H=apply_queries("DROP DATABASE",$k,'idf_escape');restart_session();set_session("dbs",null);return$H;}function
rename_database($B,$d){$H=false;if(create_database($B,$d)){$Pg=array();foreach(tables_list()as$Q=>$T)$Pg[]=table($Q)." TO ".idf_escape($B).".".table($Q);$H=(!$Pg||queries("RENAME TABLE ".implode(", ",$Pg)));if($H)queries("DROP DATABASE ".idf_escape(DB));restart_session();set_session("dbs",null);}return$H;}function
auto_increment(){$Oa=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$v){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$v["columns"],true)){$Oa="";break;}if($v["type"]=="PRIMARY")$Oa=" UNIQUE";}}return" AUTO_INCREMENT$Oa";}function
alter_table($Q,$B,$p,$gd,$vb,$yc,$d,$Na,$Zf){$c=array();foreach($p
as$o)$c[]=($o[1]?($Q!=""?($o[0]!=""?"CHANGE ".idf_escape($o[0]):"ADD"):" ")." ".implode($o[1]).($Q!=""?$o[2]:""):"DROP ".idf_escape($o[0]));$c=array_merge($c,$gd);$O=($vb!==null?" COMMENT=".q($vb):"").($yc?" ENGINE=".q($yc):"").($d?" COLLATE ".q($d):"").($Na!=""?" AUTO_INCREMENT=$Na":"");if($Q=="")return
queries("CREATE TABLE ".table($B)." (\n".implode(",\n",$c)."\n)$O$Zf");if($Q!=$B)$c[]="RENAME TO ".table($B);if($O)$c[]=ltrim($O);return($c||$Zf?queries("ALTER TABLE ".table($Q)."\n".implode(",\n",$c).$Zf):true);}function
alter_indexes($Q,$c){foreach($c
as$y=>$X)$c[$y]=($X[2]=="DROP"?"\nDROP INDEX ".idf_escape($X[1]):"\nADD $X[0] ".($X[0]=="PRIMARY"?"KEY ":"").($X[1]!=""?idf_escape($X[1])." ":"")."(".implode(", ",$X[2]).")");return
queries("ALTER TABLE ".table($Q).implode(",",$c));}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($fj){return
queries("DROP VIEW ".implode(", ",array_map('table',$fj)));}function
drop_tables($S){return
queries("DROP TABLE ".implode(", ",array_map('table',$S)));}function
move_tables($S,$fj,$ci){$Pg=array();foreach(array_merge($S,$fj)as$Q)$Pg[]=table($Q)." TO ".idf_escape($ci).".".table($Q);return
queries("RENAME TABLE ".implode(", ",$Pg));}function
copy_tables($S,$fj,$ci){queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");foreach($S
as$Q){$B=($ci==DB?table("copy_$Q"):idf_escape($ci).".".table($Q));if(($_POST["overwrite"]&&!queries("\nDROP TABLE IF EXISTS $B"))||!queries("CREATE TABLE $B LIKE ".table($Q))||!queries("INSERT INTO $B SELECT * FROM ".table($Q)))return
false;foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($Q,"%_\\")))as$I){$Bi=$I["Trigger"];if(!queries("CREATE TRIGGER ".($ci==DB?idf_escape("copy_$Bi"):idf_escape($ci).".".idf_escape($Bi))." $I[Timing] $I[Event] ON $B FOR EACH ROW\n$I[Statement];"))return
false;}}foreach($fj
as$Q){$B=($ci==DB?table("copy_$Q"):idf_escape($ci).".".table($Q));$ej=view($Q);if(($_POST["overwrite"]&&!queries("DROP VIEW IF EXISTS $B"))||!queries("CREATE VIEW $B AS $ej[select]"))return
false;}return
true;}function
trigger($B){if($B=="")return
array();$J=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($B));return
reset($J);}function
triggers($Q){$H=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($Q,"%_\\")))as$I)$H[$I["Trigger"]]=array($I["Timing"],$I["Event"]);return$H;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($B,$T){global$h,$_c,$Vd,$U;$Da=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$Bh="(?:\\s|/\\*[\s\S]*?\\*/|(?:#|-- )[^\n]*\n?|--\r?\n)";$Gi="((".implode("|",array_merge(array_keys($U),$Da)).")\\b(?:\\s*\\(((?:[^'\")]|$_c)++)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s,]+)['\"]?)?";$fg="$Bh*(".($T=="FUNCTION"?"":$Vd).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$Gi";$Hb=$h->result("SHOW CREATE $T ".idf_escape($B),2);preg_match("~\\(((?:$fg\\s*,?)*)\\)\\s*".($T=="FUNCTION"?"RETURNS\\s+$Gi\\s+":"")."(.*)~is",$Hb,$A);$p=array();preg_match_all("~$fg\\s*,?~is",$A[1],$Ie,PREG_SET_ORDER);foreach($Ie
as$Sf)$p[]=array("field"=>str_replace("``","`",$Sf[2]).$Sf[3],"type"=>strtolower($Sf[5]),"length"=>preg_replace_callback("~$_c~s",'normalize_enum',$Sf[6]),"unsigned"=>strtolower(preg_replace('~\s+~',' ',trim("$Sf[8] $Sf[7]"))),"null"=>1,"full_type"=>$Sf[4],"inout"=>strtoupper($Sf[1]),"collation"=>strtolower($Sf[9]),);if($T!="FUNCTION")return
array("fields"=>$p,"definition"=>$A[11]);return
array("fields"=>$p,"returns"=>array("type"=>$A[12],"length"=>$A[13],"unsigned"=>$A[15],"collation"=>$A[16]),"definition"=>$A[17],"language"=>"SQL",);}function
routines(){return
get_rows("SELECT ROUTINE_NAME AS SPECIFIC_NAME, ROUTINE_NAME, ROUTINE_TYPE, DTD_IDENTIFIER FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".q(DB));}function
routine_languages(){return
array();}function
routine_id($B,$I){return
idf_escape($B);}function
last_id(){global$h;return$h->result("SELECT LAST_INSERT_ID()");}function
explain($h,$F){return$h->query("EXPLAIN ".(min_version(5.1)?"PARTITIONS ":"").$F);}function
found_rows($R,$Z){return($Z||$R["Engine"]!="InnoDB"?null:$R["Rows"]);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($fh,$i=null){return
true;}function
create_sql($Q,$Na,$Nh){global$h;$H=$h->result("SHOW CREATE TABLE ".table($Q),1);if(!$Na)$H=preg_replace('~ AUTO_INCREMENT=\d+~','',$H);return$H;}function
truncate_sql($Q){return"TRUNCATE ".table($Q);}function
use_sql($j){return"USE ".idf_escape($j);}function
trigger_sql($Q){$H="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($Q,"%_\\")),null,"-- ")as$I)$H.="\nCREATE TRIGGER ".idf_escape($I["Trigger"])." $I[Timing] $I[Event] ON ".table($I["Table"])." FOR EACH ROW\n$I[Statement];;\n";return$H;}function
show_variables(){return
get_key_vals("SHOW VARIABLES");}function
process_list(){return
get_rows("SHOW FULL PROCESSLIST");}function
show_status(){return
get_key_vals("SHOW STATUS");}function
convert_field($o){if(preg_match("~binary~",$o["type"]))return"HEX(".idf_escape($o["field"]).")";if($o["type"]=="bit")return"BIN(".idf_escape($o["field"])." + 0)";if(preg_match("~geometry|point|linestring|polygon~",$o["type"]))return(min_version(8)?"ST_":"")."AsWKT(".idf_escape($o["field"]).")";}function
unconvert_field($o,$H){if(preg_match("~binary~",$o["type"]))$H="UNHEX($H)";if($o["type"]=="bit")$H="CONV($H, 2, 10) + 0";if(preg_match("~geometry|point|linestring|polygon~",$o["type"]))$H=(min_version(8)?"ST_":"")."GeomFromText($H, SRID($o[field]))";return$H;}function
support($Tc){return!preg_match("~scheme|sequence|type|view_trigger|materializedview".(min_version(8)?"":"|descidx".(min_version(5.1)?"":"|event|partitioning".(min_version(5)?"":"|routine|trigger|view")))."~",$Tc);}function
kill_process($X){return
queries("KILL ".number($X));}function
connection_id(){return"SELECT CONNECTION_ID()";}function
max_connections(){global$h;return$h->result("SELECT @@max_connections");}$x="sql";$U=array();$Mh=array();foreach(array(lang(27)=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),lang(28)=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),lang(25)=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),lang(33)=>array("enum"=>65535,"set"=>64),lang(29)=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),lang(31)=>array("geometry"=>0,"point"=>0,"linestring"=>0,"polygon"=>0,"multipoint"=>0,"multilinestring"=>0,"multipolygon"=>0,"geometrycollection"=>0),)as$y=>$X){$U+=$X;$Mh[$y]=array_keys($X);}$Ni=array("unsigned","zerofill","unsigned zerofill");$_f=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","FIND_IN_SET","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$od=array("char_length","date","from_unixtime","lower","round","floor","ceil","sec_to_time","time_to_sec","upper");$ud=array("avg","count","count distinct","group_concat","max","min","sum");$qc=array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1","date|time"=>"now",),array(number_type()=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",));}define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",str_replace(":","%3a",preg_replace('~\?.*~','',relative_uri())).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$ia="4.7.7";class
Adminer{var$operators;function
name(){return"<a href='https://www.adminer.org/'".target_blank()." id='h1'>Adminer</a>";}function
credentials(){return
array(SERVER,$_GET["username"],get_password());}function
connectSsl(){}function
permanentLogin($Hb=false){return
password_file($Hb);}function
bruteForceKey(){return$_SERVER["REMOTE_ADDR"];}function
serverName($M){return
h($M);}function
database(){return
DB;}function
databases($ed=true){return
get_databases($ed);}function
schemas(){return
schemas();}function
queryTimeout(){return
2;}function
headers(){}function
csp(){return
csp();}function
head(){return
true;}function
css(){$H=array();$Yc="adminer.css";if(file_exists($Yc))$H[]="$Yc?v=".crc32(file_get_contents($Yc));return$H;}function
loginForm(){global$ic;echo"<table cellspacing='0' class='layout'>\n",$this->loginFormField('driver','<tr><th>'.lang(34).'<td>',html_select("auth[driver]",$ic,DRIVER,"loginDriver(this);")."\n"),$this->loginFormField('server','<tr><th>'.lang(35).'<td>','<input name="auth[server]" value="'.h(SERVER).'" title="hostname[:port]" placeholder="localhost" autocapitalize="off">'."\n"),$this->loginFormField('username','<tr><th>'.lang(36).'<td>','<input name="auth[username]" id="username" value="'.h($_GET["username"]).'" autocomplete="username" autocapitalize="off">'.script("focus(qs('#username')); qs('#username').form['auth[driver]'].onchange();")),$this->loginFormField('password','<tr><th>'.lang(37).'<td>','<input type="password" name="auth[password]" autocomplete="current-password">'."\n"),$this->loginFormField('db','<tr><th>'.lang(38).'<td>','<input name="auth[db]" value="'.h($_GET["db"]).'" autocapitalize="off">'."\n"),"</table>\n","<p><input type='submit' value='".lang(39)."'>\n",checkbox("auth[permanent]",1,$_COOKIE["adminer_permanent"],lang(40))."\n";}function
loginFormField($B,$Ad,$Y){return$Ad.$Y;}function
login($Ce,$E){if($E=="")return
lang(41,target_blank());return
true;}function
tableName($Th){return
h($Th["Name"]);}function
fieldName($o,$Ef=0){return'<span title="'.h($o["full_type"]).'">'.h($o["field"]).'</span>';}function
selectLinks($Th,$N=""){global$x,$m;echo'<p class="links">';$Ae=array("select"=>lang(42));if(support("table")||support("indexes"))$Ae["table"]=lang(43);if(support("table")){if(is_view($Th))$Ae["view"]=lang(44);else$Ae["create"]=lang(45);}if($N!==null)$Ae["edit"]=lang(46);$B=$Th["Name"];foreach($Ae
as$y=>$X)echo" <a href='".h(ME)."$y=".urlencode($B).($y=="edit"?$N:"")."'".bold(isset($_GET[$y])).">$X</a>";echo
doc_link(array($x=>$m->tableHelp($B)),"?"),"\n";}function
foreignKeys($Q){return
foreign_keys($Q);}function
backwardKeys($Q,$Sh){return
array();}function
backwardKeysPrint($Qa,$I){}function
selectQuery($F,$Ih,$Rc=false){global$x,$m;$H="</p>\n";if(!$Rc&&($ij=$m->warnings())){$t="warnings";$H=", <a href='#$t'>".lang(47)."</a>".script("qsl('a').onclick = partial(toggle, '$t');","")."$H<div id='$t' class='hidden'>\n$ij</div>\n";}return"<p><code class='jush-$x'>".h(str_replace("\n"," ",$F))."</code> <span class='time'>(".format_time($Ih).")</span>".(support("sql")?" <a href='".h(ME)."sql=".urlencode($F)."'>".lang(10)."</a>":"").$H;}function
sqlCommandQuery($F){return
shorten_utf8(trim($F),1000);}function
rowDescription($Q){return"";}function
rowDescriptions($J,$hd){return$J;}function
selectLink($X,$o){}function
selectVal($X,$_,$o,$Mf){$H=($X===null?"<i>NULL</i>":(preg_match("~char|binary|boolean~",$o["type"])&&!preg_match("~var~",$o["type"])?"<code>$X</code>":$X));if(preg_match('~blob|bytea|raw|file~',$o["type"])&&!is_utf8($X))$H="<i>".lang(48,strlen($Mf))."</i>";if(preg_match('~json~',$o["type"]))$H="<code class='jush-js'>$H</code>";return($_?"<a href='".h($_)."'".(is_url($_)?target_blank():"").">$H</a>":$H);}function
editVal($X,$o){return$X;}function
tableStructurePrint($p){echo"<div class='scrollable'>\n","<table cellspacing='0' class='nowrap'>\n","<thead><tr><th>".lang(49)."<td>".lang(50).(support("comment")?"<td>".lang(51):"")."</thead>\n";foreach($p
as$o){echo"<tr".odd()."><th>".h($o["field"]),"<td><span title='".h($o["collation"])."'>".h($o["full_type"])."</span>",($o["null"]?" <i>NULL</i>":""),($o["auto_increment"]?" <i>".lang(52)."</i>":""),(isset($o["default"])?" <span title='".lang(53)."'>[<b>".h($o["default"])."</b>]</span>":""),(support("comment")?"<td>".h($o["comment"]):""),"\n";}echo"</table>\n","</div>\n";}function
tableIndexesPrint($w){echo"<table cellspacing='0'>\n";foreach($w
as$B=>$v){ksort($v["columns"]);$rg=array();foreach($v["columns"]as$y=>$X)$rg[]="<i>".h($X)."</i>".($v["lengths"][$y]?"(".$v["lengths"][$y].")":"").($v["descs"][$y]?" DESC":"");echo"<tr title='".h($B)."'><th>$v[type]<td>".implode(", ",$rg)."\n";}echo"</table>\n";}function
selectColumnsPrint($K,$f){global$od,$ud;print_fieldset("select",lang(54),$K);$s=0;$K[""]=array();foreach($K
as$y=>$X){$X=$_GET["columns"][$y];$e=select_input(" name='columns[$s][col]'",$f,$X["col"],($y!==""?"selectFieldChange":"selectAddRow"));echo"<div>".($od||$ud?"<select name='columns[$s][fun]'>".optionlist(array(-1=>"")+array_filter(array(lang(55)=>$od,lang(56)=>$ud)),$X["fun"])."</select>".on_help("getTarget(event).value && getTarget(event).value.replace(/ |\$/, '(') + ')'",1).script("qsl('select').onchange = function () { helpClose();".($y!==""?"":" qsl('select, input', this.parentNode).onchange();")." };","")."($e)":$e)."</div>\n";$s++;}echo"</div></fieldset>\n";}function
selectSearchPrint($Z,$f,$w){print_fieldset("search",lang(57),$Z);foreach($w
as$s=>$v){if($v["type"]=="FULLTEXT"){echo"<div>(<i>".implode("</i>, <i>",array_map('h',$v["columns"]))."</i>) AGAINST"," <input type='search' name='fulltext[$s]' value='".h($_GET["fulltext"][$s])."'>",script("qsl('input').oninput = selectFieldChange;",""),checkbox("boolean[$s]",1,isset($_GET["boolean"][$s]),"BOOL"),"</div>\n";}}$cb="this.parentNode.firstChild.onchange();";foreach(array_merge((array)$_GET["where"],array(array()))as$s=>$X){if(!$X||("$X[col]$X[val]"!=""&&in_array($X["op"],$this->operators))){echo"<div>".select_input(" name='where[$s][col]'",$f,$X["col"],($X?"selectFieldChange":"selectAddRow"),"(".lang(58).")"),html_select("where[$s][op]",$this->operators,$X["op"],$cb),"<input type='search' name='where[$s][val]' value='".h($X["val"])."'>",script("mixin(qsl('input'), {oninput: function () { $cb }, onkeydown: selectSearchKeydown, onsearch: selectSearchSearch});",""),"</div>\n";}}echo"</div></fieldset>\n";}function
selectOrderPrint($Ef,$f,$w){print_fieldset("sort",lang(59),$Ef);$s=0;foreach((array)$_GET["order"]as$y=>$X){if($X!=""){echo"<div>".select_input(" name='order[$s]'",$f,$X,"selectFieldChange"),checkbox("desc[$s]",1,isset($_GET["desc"][$y]),lang(60))."</div>\n";$s++;}}echo"<div>".select_input(" name='order[$s]'",$f,"","selectAddRow"),checkbox("desc[$s]",1,false,lang(60))."</div>\n","</div></fieldset>\n";}function
selectLimitPrint($z){echo"<fieldset><legend>".lang(61)."</legend><div>";echo"<input type='number' name='limit' class='size' value='".h($z)."'>",script("qsl('input').oninput = selectFieldChange;",""),"</div></fieldset>\n";}function
selectLengthPrint($ii){if($ii!==null){echo"<fieldset><legend>".lang(62)."</legend><div>","<input type='number' name='text_length' class='size' value='".h($ii)."'>","</div></fieldset>\n";}}function
selectActionPrint($w){echo"<fieldset><legend>".lang(63)."</legend><div>","<input type='submit' value='".lang(54)."'>"," <span id='noindex' title='".lang(64)."'></span>","<script".nonce().">\n","var indexColumns = ";$f=array();foreach($w
as$v){$Ob=reset($v["columns"]);if($v["type"]!="FULLTEXT"&&$Ob)$f[$Ob]=1;}$f[""]=1;foreach($f
as$y=>$X)json_row($y);echo";\n","selectFieldChange.call(qs('#form')['select']);\n","</script>\n","</div></fieldset>\n";}function
selectCommandPrint(){return!information_schema(DB);}function
selectImportPrint(){return!information_schema(DB);}function
selectEmailPrint($vc,$f){}function
selectColumnsProcess($f,$w){global$od,$ud;$K=array();$rd=array();foreach((array)$_GET["columns"]as$y=>$X){if($X["fun"]=="count"||($X["col"]!=""&&(!$X["fun"]||in_array($X["fun"],$od)||in_array($X["fun"],$ud)))){$K[$y]=apply_sql_function($X["fun"],($X["col"]!=""?idf_escape($X["col"]):"*"));if(!in_array($X["fun"],$ud))$rd[]=$K[$y];}}return
array($K,$rd);}function
selectSearchProcess($p,$w){global$h,$m;$H=array();foreach($w
as$s=>$v){if($v["type"]=="FULLTEXT"&&$_GET["fulltext"][$s]!="")$H[]="MATCH (".implode(", ",array_map('idf_escape',$v["columns"])).") AGAINST (".q($_GET["fulltext"][$s]).(isset($_GET["boolean"][$s])?" IN BOOLEAN MODE":"").")";}foreach((array)$_GET["where"]as$y=>$X){if("$X[col]$X[val]"!=""&&in_array($X["op"],$this->operators)){$ng="";$yb=" $X[op]";if(preg_match('~IN$~',$X["op"])){$Ld=process_length($X["val"]);$yb.=" ".($Ld!=""?$Ld:"(NULL)");}elseif($X["op"]=="SQL")$yb=" $X[val]";elseif($X["op"]=="LIKE %%")$yb=" LIKE ".$this->processInput($p[$X["col"]],"%$X[val]%");elseif($X["op"]=="ILIKE %%")$yb=" ILIKE ".$this->processInput($p[$X["col"]],"%$X[val]%");elseif($X["op"]=="FIND_IN_SET"){$ng="$X[op](".q($X["val"]).", ";$yb=")";}elseif(!preg_match('~NULL$~',$X["op"]))$yb.=" ".$this->processInput($p[$X["col"]],$X["val"]);if($X["col"]!="")$H[]=$ng.$m->convertSearch(idf_escape($X["col"]),$X,$p[$X["col"]]).$yb;else{$sb=array();foreach($p
as$B=>$o){if((preg_match('~^[-\d.'.(preg_match('~IN$~',$X["op"])?',':'').']+$~',$X["val"])||!preg_match('~'.number_type().'|bit~',$o["type"]))&&(!preg_match("~[\x80-\xFF]~",$X["val"])||preg_match('~char|text|enum|set~',$o["type"])))$sb[]=$ng.$m->convertSearch(idf_escape($B),$X,$o).$yb;}$H[]=($sb?"(".implode(" OR ",$sb).")":"1 = 0");}}}return$H;}function
selectOrderProcess($p,$w){$H=array();foreach((array)$_GET["order"]as$y=>$X){if($X!="")$H[]=(preg_match('~^((COUNT\(DISTINCT |[A-Z0-9_]+\()(`(?:[^`]|``)+`|"(?:[^"]|"")+")\)|COUNT\(\*\))$~',$X)?$X:idf_escape($X)).(isset($_GET["desc"][$y])?" DESC":"");}return$H;}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"50");}function
selectLengthProcess(){return(isset($_GET["text_length"])?$_GET["text_length"]:"100");}function
selectEmailProcess($Z,$hd){return
false;}function
selectQueryBuild($K,$Z,$rd,$Ef,$z,$D){return"";}function
messageQuery($F,$ji,$Rc=false){global$x,$m;restart_session();$Bd=&get_session("queries");if(!$Bd[$_GET["db"]])$Bd[$_GET["db"]]=array();if(strlen($F)>1e6)$F=preg_replace('~[\x80-\xFF]+$~','',substr($F,0,1e6))."\nâ¦";$Bd[$_GET["db"]][]=array($F,time(),$ji);$Fh="sql-".count($Bd[$_GET["db"]]);$H="<a href='#$Fh' class='toggle'>".lang(65)."</a>\n";if(!$Rc&&($ij=$m->warnings())){$t="warnings-".count($Bd[$_GET["db"]]);$H="<a href='#$t' class='toggle'>".lang(47)."</a>, $H<div id='$t' class='hidden'>\n$ij</div>\n";}return" <span class='time'>".@date("H:i:s")."</span>"." $H<div id='$Fh' class='hidden'><pre><code class='jush-$x'>".shorten_utf8($F,1000)."</code></pre>".($ji?" <span class='time'>($ji)</span>":'').(support("sql")?'<p><a href="'.h(str_replace("db=".urlencode(DB),"db=".urlencode($_GET["db"]),ME).'sql=&history='.(count($Bd[$_GET["db"]])-1)).'">'.lang(10).'</a>':'').'</div>';}function
editFunctions($o){global$qc;$H=($o["null"]?"NULL/":"");foreach($qc
as$y=>$od){if(!$y||(!isset($_GET["call"])&&(isset($_GET["select"])||where($_GET)))){foreach($od
as$fg=>$X){if(!$fg||preg_match("~$fg~",$o["type"]))$H.="/$X";}if($y&&!preg_match('~set|blob|bytea|raw|file~',$o["type"]))$H.="/SQL";}}if($o["auto_increment"]&&!isset($_GET["select"])&&!where($_GET))$H=lang(52);return
explode("/",$H);}function
editInput($Q,$o,$Ka,$Y){if($o["type"]=="enum")return(isset($_GET["select"])?"<label><input type='radio'$Ka value='-1' checked><i>".lang(8)."</i></label> ":"").($o["null"]?"<label><input type='radio'$Ka value=''".($Y!==null||isset($_GET["select"])?"":" checked")."><i>NULL</i></label> ":"").enum_input("radio",$Ka,$o,$Y,0);return"";}function
editHint($Q,$o,$Y){return"";}function
processInput($o,$Y,$r=""){if($r=="SQL")return$Y;$B=$o["field"];$H=q($Y);if(preg_match('~^(now|getdate|uuid)$~',$r))$H="$r()";elseif(preg_match('~^current_(date|timestamp)$~',$r))$H=$r;elseif(preg_match('~^([+-]|\|\|)$~',$r))$H=idf_escape($B)." $r $H";elseif(preg_match('~^[+-] interval$~',$r))$H=idf_escape($B)." $r ".(preg_match("~^(\\d+|'[0-9.: -]') [A-Z_]+\$~i",$Y)?$Y:$H);elseif(preg_match('~^(addtime|subtime|concat)$~',$r))$H="$r(".idf_escape($B).", $H)";elseif(preg_match('~^(md5|sha1|password|encrypt)$~',$r))$H="$r($H)";return
unconvert_field($o,$H);}function
dumpOutput(){$H=array('text'=>lang(66),'file'=>lang(67));if(function_exists('gzencode'))$H['gz']='gzip';return$H;}function
dumpFormat(){return
array('sql'=>'SQL','csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');}function
dumpDatabase($l){}function
dumpTable($Q,$Nh,$ee=0){if($_POST["format"]!="sql"){echo"\xef\xbb\xbf";if($Nh)dump_csv(array_keys(fields($Q)));}else{if($ee==2){$p=array();foreach(fields($Q)as$B=>$o)$p[]=idf_escape($B)." $o[full_type]";$Hb="CREATE TABLE ".table($Q)." (".implode(", ",$p).")";}else$Hb=create_sql($Q,$_POST["auto_increment"],$Nh);set_utf8mb4($Hb);if($Nh&&$Hb){if($Nh=="DROP+CREATE"||$ee==1)echo"DROP ".($ee==2?"VIEW":"TABLE")." IF EXISTS ".table($Q).";\n";if($ee==1)$Hb=remove_definer($Hb);echo"$Hb;\n\n";}}}function
dumpData($Q,$Nh,$F){global$h,$x;$Ke=($x=="sqlite"?0:1048576);if($Nh){if($_POST["format"]=="sql"){if($Nh=="TRUNCATE+INSERT")echo
truncate_sql($Q).";\n";$p=fields($Q);}$G=$h->query($F,1);if($G){$Xd="";$Za="";$le=array();$Ph="";$Uc=($Q!=''?'fetch_assoc':'fetch_row');while($I=$G->$Uc()){if(!$le){$aj=array();foreach($I
as$X){$o=$G->fetch_field();$le[]=$o->name;$y=idf_escape($o->name);$aj[]="$y = VALUES($y)";}$Ph=($Nh=="INSERT+UPDATE"?"\nON DUPLICATE KEY UPDATE ".implode(", ",$aj):"").";\n";}if($_POST["format"]!="sql"){if($Nh=="table"){dump_csv($le);$Nh="INSERT";}dump_csv($I);}else{if(!$Xd)$Xd="INSERT INTO ".table($Q)." (".implode(", ",array_map('idf_escape',$le)).") VALUES";foreach($I
as$y=>$X){$o=$p[$y];$I[$y]=($X!==null?unconvert_field($o,preg_match(number_type(),$o["type"])&&!preg_match('~\[~',$o["full_type"])&&is_numeric($X)?$X:q(($X===false?0:$X))):"NULL");}$dh=($Ke?"\n":" ")."(".implode(",\t",$I).")";if(!$Za)$Za=$Xd.$dh;elseif(strlen($Za)+4+strlen($dh)+strlen($Ph)<$Ke)$Za.=",$dh";else{echo$Za.$Ph;$Za=$Xd.$dh;}}}if($Za)echo$Za.$Ph;}elseif($_POST["format"]=="sql")echo"-- ".str_replace("\n"," ",$h->error)."\n";}}function
dumpFilename($Gd){return
friendly_url($Gd!=""?$Gd:(SERVER!=""?SERVER:"localhost"));}function
dumpHeaders($Gd,$Ze=false){$Pf=$_POST["output"];$Mc=(preg_match('~sql~',$_POST["format"])?"sql":($Ze?"tar":"csv"));header("Content-Type: ".($Pf=="gz"?"application/x-gzip":($Mc=="tar"?"application/x-tar":($Mc=="sql"||$Pf!="file"?"text/plain":"text/csv")."; charset=utf-8")));if($Pf=="gz")ob_start('ob_gzencode',1e6);return$Mc;}function
importServerPath(){return"adminer.sql";}function
homepage(){echo'<p class="links">'.($_GET["ns"]==""&&support("database")?'<a href="'.h(ME).'database=">'.lang(68)."</a>\n":""),(support("scheme")?"<a href='".h(ME)."scheme='>".($_GET["ns"]!=""?lang(69):lang(70))."</a>\n":""),($_GET["ns"]!==""?'<a href="'.h(ME).'schema=">'.lang(71)."</a>\n":""),(support("privileges")?"<a href='".h(ME)."privileges='>".lang(72)."</a>\n":"");return
true;}function
navigation($Ye){global$ia,$x,$ic,$h;echo'<h1>
',$this->name(),' <span class="version">',$ia,'</span>
<a href="https://www.adminer.org/#download"',target_blank(),' id="version">',(version_compare($ia,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a>
</h1>
';if($Ye=="auth"){$Pf="";foreach((array)$_SESSION["pwds"]as$cj=>$rh){foreach($rh
as$M=>$Xi){foreach($Xi
as$V=>$E){if($E!==null){$Ub=$_SESSION["db"][$cj][$M][$V];foreach(($Ub?array_keys($Ub):array(""))as$l)$Pf.="<li><a href='".h(auth_url($cj,$M,$V,$l))."'>($ic[$cj]) ".h($V.($M!=""?"@".$this->serverName($M):"").($l!=""?" - $l":""))."</a>\n";}}}}if($Pf)echo"<ul id='logins'>\n$Pf</ul>\n".script("mixin(qs('#logins'), {onmouseover: menuOver, onmouseout: menuOut});");}else{if($_GET["ns"]!==""&&!$Ye&&DB!=""){$h->select_db(DB);$S=table_status('',true);}echo
script_src(preg_replace("~\\?.*~","",ME)."?file=jush.js&version=4.7.7");if(support("sql")){echo'<script',nonce(),'>
';if($S){$Ae=array();foreach($S
as$Q=>$T)$Ae[]=preg_quote($Q,'/');echo"var jushLinks = { $x: [ '".js_escape(ME).(support("table")?"table=":"select=")."\$&', /\\b(".implode("|",$Ae).")\\b/g ] };\n";foreach(array("bac","bra","sqlite_quo","mssql_bra")as$X)echo"jushLinks.$X = jushLinks.$x;\n";}$qh=$h->server_info;echo'bodyLoad(\'',(is_object($h)?preg_replace('~^(\d\.?\d).*~s','\1',$qh):""),'\'',(preg_match('~MariaDB~',$qh)?", true":""),');
</script>
';}$this->databasesPrint($Ye);if(DB==""||!$Ye){echo"<p class='links'>".(support("sql")?"<a href='".h(ME)."sql='".bold(isset($_GET["sql"])&&!isset($_GET["import"])).">".lang(65)."</a>\n<a href='".h(ME)."import='".bold(isset($_GET["import"])).">".lang(73)."</a>\n":"")."";if(support("dump"))echo"<a href='".h(ME)."dump=".urlencode(isset($_GET["table"])?$_GET["table"]:$_GET["select"])."' id='dump'".bold(isset($_GET["dump"])).">".lang(74)."</a>\n";}if($_GET["ns"]!==""&&!$Ye&&DB!=""){echo'<a href="'.h(ME).'create="'.bold($_GET["create"]==="").">".lang(75)."</a>\n";if(!$S)echo"<p class='message'>".lang(9)."\n";else$this->tablesPrint($S);}}}function
databasesPrint($Ye){global$b,$h;$k=$this->databases();if($k&&!in_array(DB,$k))array_unshift($k,DB);echo'<form action="">
<p id="dbs">
';hidden_fields_get();$Sb=script("mixin(qsl('select'), {onmousedown: dbMouseDown, onchange: dbChange});");echo"<span title='".lang(76)."'>".lang(77)."</span>: ".($k?"<select name='db'>".optionlist(array(""=>"")+$k,DB)."</select>$Sb":"<input name='db' value='".h(DB)."' autocapitalize='off'>\n"),"<input type='submit' value='".lang(20)."'".($k?" class='hidden'":"").">\n";if($Ye!="db"&&DB!=""&&$h->select_db(DB)){if(support("scheme")){echo"<br>".lang(78).": <select name='ns'>".optionlist(array(""=>"")+$b->schemas(),$_GET["ns"])."</select>$Sb";if($_GET["ns"]!="")set_schema($_GET["ns"]);}}foreach(array("import","sql","schema","dump","privileges")as$X){if(isset($_GET[$X])){echo"<input type='hidden' name='$X' value=''>";break;}}echo"</p></form>\n";}function
tablesPrint($S){echo"<ul id='tables'>".script("mixin(qs('#tables'), {onmouseover: menuOver, onmouseout: menuOut});");foreach($S
as$Q=>$O){$B=$this->tableName($O);if($B!=""){echo'<li><a href="'.h(ME).'select='.urlencode($Q).'"'.bold($_GET["select"]==$Q||$_GET["edit"]==$Q,"select").">".lang(79)."</a> ",(support("table")||support("indexes")?'<a href="'.h(ME).'table='.urlencode($Q).'"'.bold(in_array($Q,array($_GET["table"],$_GET["create"],$_GET["indexes"],$_GET["foreign"],$_GET["trigger"])),(is_view($O)?"view":"structure"))." title='".lang(43)."'>$B</a>":"<span>$B</span>")."\n";}}echo"</ul>\n";}}$b=(function_exists('adminer_object')?adminer_object():new
Adminer);if($b->operators===null)$b->operators=$_f;function
page_header($mi,$n="",$Ya=array(),$ni=""){global$ca,$ia,$b,$ic,$x;page_headers();if(is_ajax()&&$n){page_messages($n);exit;}$oi=$mi.($ni!=""?": $ni":"");$pi=strip_tags($oi.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$b->name());echo'<!DOCTYPE html>
<html lang="',$ca,'" dir="',lang(80),'">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex">
<title>',$pi,'</title>
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME)."?file=default.css&version=4.7.7"),'">
',script_src(preg_replace("~\\?.*~","",ME)."?file=functions.js&version=4.7.7");if($b->head()){echo'<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.7.7"),'">
<link rel="apple-touch-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.7.7"),'">
';foreach($b->css()as$Mb){echo'<link rel="stylesheet" type="text/css" href="',h($Mb),'">
';}}echo'
<body class="',lang(80),' nojs">
';$Yc=get_temp_dir()."/adminer.version";if(!$_COOKIE["adminer_version"]&&function_exists('openssl_verify')&&file_exists($Yc)&&filemtime($Yc)+86400>time()){$dj=unserialize(file_get_contents($Yc));$yg="-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwqWOVuF5uw7/+Z70djoK
RlHIZFZPO0uYRezq90+7Amk+FDNd7KkL5eDve+vHRJBLAszF/7XKXe11xwliIsFs
DFWQlsABVZB3oisKCBEuI71J4kPH8dKGEWR9jDHFw3cWmoH3PmqImX6FISWbG3B8
h7FIx3jEaw5ckVPVTeo5JRm/1DZzJxjyDenXvBQ/6o9DgZKeNDgxwKzH+sw9/YCO
jHnq1cFpOIISzARlrHMa/43YfeNRAm/tsBXjSxembBPo7aQZLAWHmaj5+K19H10B
nCpz9Y++cipkVEiKRGih4ZEvjoFysEOdRLj6WiD/uUNky4xGeA6LaJqh5XpkFkcQ
fQIDAQAB
-----END PUBLIC KEY-----
";if(openssl_verify($dj["version"],base64_decode($dj["signature"]),$yg)==1)$_COOKIE["adminer_version"]=$dj["version"];}echo'<script',nonce(),'>
mixin(document.body, {onkeydown: bodyKeydown, onclick: bodyClick',(isset($_COOKIE["adminer_version"])?"":", onload: partial(verifyVersion, '$ia', '".js_escape(ME)."', '".get_token()."')");?>});
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = '<?php echo
js_escape(lang(81)),'\';
var thousandsSeparator = \'',js_escape(lang(5)),'\';
</script>

<div id="help" class="jush-',$x,' jsonly hidden"></div>
',script("mixin(qs('#help'), {onmouseover: function () { helpOpen = 1; }, onmouseout: helpMouseout});"),'
<div id="content">
';if($Ya!==null){$_=substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.h($_?$_:".").'">'.$ic[DRIVER].'</a> &raquo; ';$_=substr(preg_replace('~\b(db|ns)=[^&]*&~','',ME),0,-1);$M=$b->serverName(SERVER);$M=($M!=""?$M:lang(35));if($Ya===false)echo"$M\n";else{echo"<a href='".($_?h($_):".")."' accesskey='1' title='Alt+Shift+1'>$M</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($Ya)))echo'<a href="'.h($_."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';if(is_array($Ya)){if($_GET["ns"]!="")echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';foreach($Ya
as$y=>$X){$bc=(is_array($X)?$X[1]:h($X));if($bc!="")echo"<a href='".h(ME."$y=").urlencode(is_array($X)?$X[0]:$X)."'>$bc</a> &raquo; ";}}echo"$mi\n";}}echo"<h2>$oi</h2>\n","<div id='ajaxstatus' class='jsonly hidden'></div>\n";restart_session();page_messages($n);$k=&get_session("dbs");if(DB!=""&&$k&&!in_array(DB,$k,true))$k=null;stop_session();define("PAGE_HEADER",1);}function
page_headers(){global$b;header("Content-Type: text/html; charset=utf-8");header("Cache-Control: no-cache");header("X-Frame-Options: deny");header("X-XSS-Protection: 0");header("X-Content-Type-Options: nosniff");header("Referrer-Policy: origin-when-cross-origin");foreach($b->csp()as$Lb){$_d=array();foreach($Lb
as$y=>$X)$_d[]="$y $X";header("Content-Security-Policy: ".implode("; ",$_d));}$b->headers();}function
csp(){return
array(array("script-src"=>"'self' 'unsafe-inline' 'nonce-".get_nonce()."' 'strict-dynamic'","connect-src"=>"'self'","frame-src"=>"https://www.adminer.org","object-src"=>"'none'","base-uri"=>"'none'","form-action"=>"'self'",),);}function
get_nonce(){static$if;if(!$if)$if=base64_encode(rand_string());return$if;}function
page_messages($n){$Pi=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$Ue=$_SESSION["messages"][$Pi];if($Ue){echo"<div class='message'>".implode("</div>\n<div class='message'>",$Ue)."</div>".script("messagesPrint();");unset($_SESSION["messages"][$Pi]);}if($n)echo"<div class='error'>$n</div>\n";}function
page_footer($Ye=""){global$b,$ti;echo'</div>

';switch_lang();if($Ye!="auth"){echo'<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="',lang(82),'" id="logout">
<input type="hidden" name="token" value="',$ti,'">
</p>
</form>
';}echo'<div id="menu">
';$b->navigation($Ye);echo'</div>
',script("setupSubmitHighlight(document);");}function
int32($bf){while($bf>=2147483648)$bf-=4294967296;while($bf<=-2147483649)$bf+=4294967296;return(int)$bf;}function
long2str($W,$hj){$dh='';foreach($W
as$X)$dh.=pack('V',$X);if($hj)return
substr($dh,0,end($W));return$dh;}function
str2long($dh,$hj){$W=array_values(unpack('V*',str_pad($dh,4*ceil(strlen($dh)/4),"\0")));if($hj)$W[]=strlen($dh);return$W;}function
xxtea_mx($uj,$tj,$Qh,$he){return
int32((($uj>>5&0x7FFFFFF)^$tj<<2)+(($tj>>3&0x1FFFFFFF)^$uj<<4))^int32(($Qh^$tj)+($he^$uj));}function
encrypt_string($Lh,$y){if($Lh=="")return"";$y=array_values(unpack("V*",pack("H*",md5($y))));$W=str2long($Lh,true);$bf=count($W)-1;$uj=$W[$bf];$tj=$W[0];$zg=floor(6+52/($bf+1));$Qh=0;while($zg-->0){$Qh=int32($Qh+0x9E3779B9);$pc=$Qh>>2&3;for($Qf=0;$Qf<$bf;$Qf++){$tj=$W[$Qf+1];$af=xxtea_mx($uj,$tj,$Qh,$y[$Qf&3^$pc]);$uj=int32($W[$Qf]+$af);$W[$Qf]=$uj;}$tj=$W[0];$af=xxtea_mx($uj,$tj,$Qh,$y[$Qf&3^$pc]);$uj=int32($W[$bf]+$af);$W[$bf]=$uj;}return
long2str($W,false);}function
decrypt_string($Lh,$y){if($Lh=="")return"";if(!$y)return
false;$y=array_values(unpack("V*",pack("H*",md5($y))));$W=str2long($Lh,false);$bf=count($W)-1;$uj=$W[$bf];$tj=$W[0];$zg=floor(6+52/($bf+1));$Qh=int32($zg*0x9E3779B9);while($Qh){$pc=$Qh>>2&3;for($Qf=$bf;$Qf>0;$Qf--){$uj=$W[$Qf-1];$af=xxtea_mx($uj,$tj,$Qh,$y[$Qf&3^$pc]);$tj=int32($W[$Qf]-$af);$W[$Qf]=$tj;}$uj=$W[$bf];$af=xxtea_mx($uj,$tj,$Qh,$y[$Qf&3^$pc]);$tj=int32($W[0]-$af);$W[0]=$tj;$Qh=int32($Qh-0x9E3779B9);}return
long2str($W,true);}$h='';$zd=$_SESSION["token"];if(!$zd)$_SESSION["token"]=rand(1,1e6);$ti=get_token();$gg=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$X){list($y)=explode(":",$X);$gg[$y]=$X;}}function
add_invalid_login(){global$b;$md=file_open_lock(get_temp_dir()."/adminer.invalid");if(!$md)return;$ae=unserialize(stream_get_contents($md));$ji=time();if($ae){foreach($ae
as$be=>$X){if($X[0]<$ji)unset($ae[$be]);}}$Zd=&$ae[$b->bruteForceKey()];if(!$Zd)$Zd=array($ji+30*60,0);$Zd[1]++;file_write_unlock($md,serialize($ae));}function
check_invalid_login(){global$b;$ae=unserialize(@file_get_contents(get_temp_dir()."/adminer.invalid"));$Zd=$ae[$b->bruteForceKey()];$hf=($Zd[1]>29?$Zd[0]-time():0);if($hf>0)auth_error(lang(83,ceil($hf/60)));}$La=$_POST["auth"];if($La){session_regenerate_id();$cj=$La["driver"];$M=$La["server"];$V=$La["username"];$E=(string)$La["password"];$l=$La["db"];set_password($cj,$M,$V,$E);$_SESSION["db"][$cj][$M][$V][$l]=true;if($La["permanent"]){$y=base64_encode($cj)."-".base64_encode($M)."-".base64_encode($V)."-".base64_encode($l);$sg=$b->permanentLogin(true);$gg[$y]="$y:".base64_encode($sg?encrypt_string($E,$sg):"");cookie("adminer_permanent",implode(" ",$gg));}if(count($_POST)==1||DRIVER!=$cj||SERVER!=$M||$_GET["username"]!==$V||DB!=$l)redirect(auth_url($cj,$M,$V,$l));}elseif($_POST["logout"]){if($zd&&!verify_token()){page_header(lang(82),lang(84));page_footer("db");exit;}else{foreach(array("pwds","db","dbs","queries")as$y)set_session($y,null);unset_permanent();redirect(substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1),lang(85).' '.lang(86));}}elseif($gg&&!$_SESSION["pwds"]){session_regenerate_id();$sg=$b->permanentLogin();foreach($gg
as$y=>$X){list(,$kb)=explode(":",$X);list($cj,$M,$V,$l)=array_map('base64_decode',explode("-",$y));set_password($cj,$M,$V,decrypt_string(base64_decode($kb),$sg));$_SESSION["db"][$cj][$M][$V][$l]=true;}}function
unset_permanent(){global$gg;foreach($gg
as$y=>$X){list($cj,$M,$V,$l)=array_map('base64_decode',explode("-",$y));if($cj==DRIVER&&$M==SERVER&&$V==$_GET["username"]&&$l==DB)unset($gg[$y]);}cookie("adminer_permanent",implode(" ",$gg));}function
auth_error($n){global$b,$zd;$sh=session_name();if(isset($_GET["username"])){header("HTTP/1.1 403 Forbidden");if(($_COOKIE[$sh]||$_GET[$sh])&&!$zd)$n=lang(87);else{restart_session();add_invalid_login();$E=get_password();if($E!==null){if($E===false)$n.='<br>'.lang(88,target_blank(),'<code>permanentLogin()</code>');set_password(DRIVER,SERVER,$_GET["username"],null);}unset_permanent();}}if(!$_COOKIE[$sh]&&$_GET[$sh]&&ini_bool("session.use_only_cookies"))$n=lang(89);$Tf=session_get_cookie_params();cookie("adminer_key",($_COOKIE["adminer_key"]?$_COOKIE["adminer_key"]:rand_string()),$Tf["lifetime"]);page_header(lang(39),$n,null);echo"<form action='' method='post'>\n","<div>";if(hidden_fields($_POST,array("auth")))echo"<p class='message'>".lang(90)."\n";echo"</div>\n";$b->loginForm();echo"</form>\n";page_footer("auth");exit;}if(isset($_GET["username"])&&!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);unset_permanent();page_header(lang(91),lang(92,implode(", ",$mg)),false);page_footer("auth");exit;}stop_session(true);if(isset($_GET["username"])&&is_string(get_password())){list($Ed,$ig)=explode(":",SERVER,2);if(is_numeric($ig)&&($ig<1024||$ig>65535))auth_error(lang(93));check_invalid_login();$h=connect();$m=new
Min_Driver($h);}$Ce=null;if(!is_object($h)||($Ce=$b->login($_GET["username"],get_password()))!==true){$n=(is_string($h)?h($h):(is_string($Ce)?$Ce:lang(94)));auth_error($n.(preg_match('~^ | $~',get_password())?'<br>'.lang(95):''));}if($La&&$_POST["token"])$_POST["token"]=$ti;$n='';if($_POST){if(!verify_token()){$Ud="max_input_vars";$Oe=ini_get($Ud);if(extension_loaded("suhosin")){foreach(array("suhosin.request.max_vars","suhosin.post.max_vars")as$y){$X=ini_get($y);if($X&&(!$Oe||$X<$Oe)){$Ud=$y;$Oe=$X;}}}$n=(!$_POST["token"]&&$Oe?lang(96,"'$Ud'"):lang(84).' '.lang(97));}}elseif($_SERVER["REQUEST_METHOD"]=="POST"){$n=lang(98,"'post_max_size'");if(isset($_GET["sql"]))$n.=' '.lang(99);}function
select($G,$i=null,$Hf=array(),$z=0){global$x;$Ae=array();$w=array();$f=array();$Va=array();$U=array();$H=array();odd('');for($s=0;(!$z||$s<$z)&&($I=$G->fetch_row());$s++){if(!$s){echo"<div class='scrollable'>\n","<table cellspacing='0' class='nowrap'>\n","<thead><tr>";for($ge=0;$ge<count($I);$ge++){$o=$G->fetch_field();$B=$o->name;$Gf=$o->orgtable;$Ff=$o->orgname;$H[$o->table]=$Gf;if($Hf&&$x=="sql")$Ae[$ge]=($B=="table"?"table=":($B=="possible_keys"?"indexes=":null));elseif($Gf!=""){if(!isset($w[$Gf])){$w[$Gf]=array();foreach(indexes($Gf,$i)as$v){if($v["type"]=="PRIMARY"){$w[$Gf]=array_flip($v["columns"]);break;}}$f[$Gf]=$w[$Gf];}if(isset($f[$Gf][$Ff])){unset($f[$Gf][$Ff]);$w[$Gf][$Ff]=$ge;$Ae[$ge]=$Gf;}}if($o->charsetnr==63)$Va[$ge]=true;$U[$ge]=$o->type;echo"<th".($Gf!=""||$o->name!=$Ff?" title='".h(($Gf!=""?"$Gf.":"").$Ff)."'":"").">".h($B).($Hf?doc_link(array('sql'=>"explain-output.html#explain_".strtolower($B),'mariadb'=>"explain/#the-columns-in-explain-select",)):"");}echo"</thead>\n";}echo"<tr".odd().">";foreach($I
as$y=>$X){if($X===null)$X="<i>NULL</i>";elseif($Va[$y]&&!is_utf8($X))$X="<i>".lang(48,strlen($X))."</i>";else{$X=h($X);if($U[$y]==254)$X="<code>$X</code>";}if(isset($Ae[$y])&&!$f[$Ae[$y]]){if($Hf&&$x=="sql"){$Q=$I[array_search("table=",$Ae)];$_=$Ae[$y].urlencode($Hf[$Q]!=""?$Hf[$Q]:$Q);}else{$_="edit=".urlencode($Ae[$y]);foreach($w[$Ae[$y]]as$ob=>$ge)$_.="&where".urlencode("[".bracket_escape($ob)."]")."=".urlencode($I[$ge]);}$X="<a href='".h(ME.$_)."'>$X</a>";}echo"<td>$X";}}echo($s?"</table>\n</div>":"<p class='message'>".lang(12))."\n";return$H;}function
referencable_primary($mh){$H=array();foreach(table_status('',true)as$Uh=>$Q){if($Uh!=$mh&&fk_support($Q)){foreach(fields($Uh)as$o){if($o["primary"]){if($H[$Uh]){unset($H[$Uh]);break;}$H[$Uh]=$o;}}}}return$H;}function
adminer_settings(){parse_str($_COOKIE["adminer_settings"],$uh);return$uh;}function
adminer_setting($y){$uh=adminer_settings();return$uh[$y];}function
set_adminer_settings($uh){return
cookie("adminer_settings",http_build_query($uh+adminer_settings()));}function
textarea($B,$Y,$J=10,$sb=80){global$x;echo"<textarea name='$B' rows='$J' cols='$sb' class='sqlarea jush-$x' spellcheck='false' wrap='off'>";if(is_array($Y)){foreach($Y
as$X)echo
h($X[0])."\n\n\n";}else
echo
h($Y);echo"</textarea>";}function
edit_type($y,$o,$qb,$id=array(),$Pc=array()){global$Mh,$U,$Ni,$vf;$T=$o["type"];echo'<td><select name="',h($y),'[type]" class="type" aria-labelledby="label-type">';if($T&&!isset($U[$T])&&!isset($id[$T])&&!in_array($T,$Pc))$Pc[]=$T;if($id)$Mh[lang(100)]=$id;echo
optionlist(array_merge($Pc,$Mh),$T),'</select><td><input name="',h($y),'[length]" value="',h($o["length"]),'" size="3"',(!$o["length"]&&preg_match('~var(char|binary)$~',$T)?" class='required'":"");echo' aria-labelledby="label-length"><td class="options">',"<select name='".h($y)."[collation]'".(preg_match('~(char|text|enum|set)$~',$T)?"":" class='hidden'").'><option value="">('.lang(101).')'.optionlist($qb,$o["collation"]).'</select>',($Ni?"<select name='".h($y)."[unsigned]'".(!$T||preg_match(number_type(),$T)?"":" class='hidden'").'><option>'.optionlist($Ni,$o["unsigned"]).'</select>':''),(isset($o['on_update'])?"<select name='".h($y)."[on_update]'".(preg_match('~timestamp|datetime~',$T)?"":" class='hidden'").'>'.optionlist(array(""=>"(".lang(102).")","CURRENT_TIMESTAMP"),(preg_match('~^CURRENT_TIMESTAMP~i',$o["on_update"])?"CURRENT_TIMESTAMP":$o["on_update"])).'</select>':''),($id?"<select name='".h($y)."[on_delete]'".(preg_match("~`~",$T)?"":" class='hidden'")."><option value=''>(".lang(103).")".optionlist(explode("|",$vf),$o["on_delete"])."</select> ":" ");}function
process_length($ye){global$_c;return(preg_match("~^\\s*\\(?\\s*$_c(?:\\s*,\\s*$_c)*+\\s*\\)?\\s*\$~",$ye)&&preg_match_all("~$_c~",$ye,$Ie)?"(".implode(",",$Ie[0]).")":preg_replace('~^[0-9].*~','(\0)',preg_replace('~[^-0-9,+()[\]]~','',$ye)));}function
process_type($o,$pb="COLLATE"){global$Ni;return" $o[type]".process_length($o["length"]).(preg_match(number_type(),$o["type"])&&in_array($o["unsigned"],$Ni)?" $o[unsigned]":"").(preg_match('~char|text|enum|set~',$o["type"])&&$o["collation"]?" $pb ".q($o["collation"]):"");}function
process_field($o,$Fi){return
array(idf_escape(trim($o["field"])),process_type($Fi),($o["null"]?" NULL":" NOT NULL"),default_value($o),(preg_match('~timestamp|datetime~',$o["type"])&&$o["on_update"]?" ON UPDATE $o[on_update]":""),(support("comment")&&$o["comment"]!=""?" COMMENT ".q($o["comment"]):""),($o["auto_increment"]?auto_increment():null),);}function
default_value($o){$Wb=$o["default"];return($Wb===null?"":" DEFAULT ".(preg_match('~char|binary|text|enum|set~',$o["type"])||preg_match('~^(?![a-z])~i',$Wb)?q($Wb):$Wb));}function
type_class($T){foreach(array('char'=>'text','date'=>'time|year','binary'=>'blob','enum'=>'set',)as$y=>$X){if(preg_match("~$y|$X~",$T))return" class='$y'";}}function
edit_fields($p,$qb,$T="TABLE",$id=array()){global$Vd;$p=array_values($p);$Xb=(($_POST?$_POST["defaults"]:adminer_setting("defaults"))?"":" class='hidden'");$wb=(($_POST?$_POST["comments"]:adminer_setting("comments"))?"":" class='hidden'");echo'<thead><tr>
';if($T=="PROCEDURE"){echo'<td>';}echo'<th id="label-name">',($T=="TABLE"?lang(104):lang(105)),'<td id="label-type">',lang(50),'<textarea id="enum-edit" rows="4" cols="12" wrap="off" style="display: none;"></textarea>',script("qs('#enum-edit').onblur = editingLengthBlur;"),'<td id="label-length">',lang(106),'<td>',lang(107);if($T=="TABLE"){echo'<td id="label-null">NULL
<td><input type="radio" name="auto_increment_col" value=""><acronym id="label-ai" title="',lang(52),'">AI</acronym>',doc_link(array('sql'=>"example-auto-increment.html",'mariadb'=>"auto_increment/",'sqlite'=>"autoinc.html",'pgsql'=>"datatype.html#DATATYPE-SERIAL",'mssql'=>"ms186775.aspx",)),'<td id="label-default"',$Xb,'>',lang(53),(support("comment")?"<td id='label-comment'$wb>".lang(51):"");}echo'<td>',"<input type='image' class='icon' name='add[".(support("move_col")?0:count($p))."]' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.7.7")."' alt='+' title='".lang(108)."'>".script("row_count = ".count($p).";"),'</thead>
<tbody>
',script("mixin(qsl('tbody'), {onclick: editingClick, onkeydown: editingKeydown, oninput: editingInput});");foreach($p
as$s=>$o){$s++;$If=$o[($_POST?"orig":"field")];$fc=(isset($_POST["add"][$s-1])||(isset($o["field"])&&!$_POST["drop_col"][$s]))&&(support("drop_col")||$If=="");echo'<tr',($fc?"":" style='display: none;'"),'>
',($T=="PROCEDURE"?"<td>".html_select("fields[$s][inout]",explode("|",$Vd),$o["inout"]):""),'<th>';if($fc){echo'<input name="fields[',$s,'][field]" value="',h($o["field"]),'" data-maxlength="64" autocapitalize="off" aria-labelledby="label-name">';}echo'<input type="hidden" name="fields[',$s,'][orig]" value="',h($If),'">';edit_type("fields[$s]",$o,$qb,$id);if($T=="TABLE"){echo'<td>',checkbox("fields[$s][null]",1,$o["null"],"","","block","label-null"),'<td><label class="block"><input type="radio" name="auto_increment_col" value="',$s,'"';if($o["auto_increment"]){echo' checked';}echo' aria-labelledby="label-ai"></label><td',$Xb,'>',checkbox("fields[$s][has_default]",1,$o["has_default"],"","","","label-default"),'<input name="fields[',$s,'][default]" value="',h($o["default"]),'" aria-labelledby="label-default">',(support("comment")?"<td$wb><input name='fields[$s][comment]' value='".h($o["comment"])."' data-maxlength='".(min_version(5.5)?1024:255)."' aria-labelledby='label-comment'>":"");}echo"<td>",(support("move_col")?"<input type='image' class='icon' name='add[$s]' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.7.7")."' alt='+' title='".lang(108)."'> "."<input type='image' class='icon' name='up[$s]' src='".h(preg_replace("~\\?.*~","",ME)."?file=up.gif&version=4.7.7")."' alt='â' title='".lang(109)."'> "."<input type='image' class='icon' name='down[$s]' src='".h(preg_replace("~\\?.*~","",ME)."?file=down.gif&version=4.7.7")."' alt='â' title='".lang(110)."'> ":""),($If==""||support("drop_col")?"<input type='image' class='icon' name='drop_col[$s]' src='".h(preg_replace("~\\?.*~","",ME)."?file=cross.gif&version=4.7.7")."' alt='x' title='".lang(111)."'>":"");}}function
process_fields(&$p){$C=0;if($_POST["up"]){$se=0;foreach($p
as$y=>$o){if(key($_POST["up"])==$y){unset($p[$y]);array_splice($p,$se,0,array($o));break;}if(isset($o["field"]))$se=$C;$C++;}}elseif($_POST["down"]){$kd=false;foreach($p
as$y=>$o){if(isset($o["field"])&&$kd){unset($p[key($_POST["down"])]);array_splice($p,$C,0,array($kd));break;}if(key($_POST["down"])==$y)$kd=$o;$C++;}}elseif($_POST["add"]){$p=array_values($p);array_splice($p,key($_POST["add"]),0,array(array()));}elseif(!$_POST["drop_col"])return
false;return
true;}function
normalize_enum($A){return"'".str_replace("'","''",addcslashes(stripcslashes(str_replace($A[0][0].$A[0][0],$A[0][0],substr($A[0],1,-1))),'\\'))."'";}function
grant($pd,$ug,$f,$uf){if(!$ug)return
true;if($ug==array("ALL PRIVILEGES","GRANT OPTION"))return($pd=="GRANT"?queries("$pd ALL PRIVILEGES$uf WITH GRANT OPTION"):queries("$pd ALL PRIVILEGES$uf")&&queries("$pd GRANT OPTION$uf"));return
queries("$pd ".preg_replace('~(GRANT OPTION)\([^)]*\)~','\1',implode("$f, ",$ug).$f).$uf);}function
drop_create($jc,$Hb,$kc,$gi,$mc,$Be,$Te,$Re,$Se,$rf,$ef){if($_POST["drop"])query_redirect($jc,$Be,$Te);elseif($rf=="")query_redirect($Hb,$Be,$Se);elseif($rf!=$ef){$Jb=queries($Hb);queries_redirect($Be,$Re,$Jb&&queries($jc));if($Jb)queries($kc);}else
queries_redirect($Be,$Re,queries($gi)&&queries($mc)&&queries($jc)&&queries($Hb));}function
create_trigger($uf,$I){global$x;$li=" $I[Timing] $I[Event]".($I["Event"]=="UPDATE OF"?" ".idf_escape($I["Of"]):"");return"CREATE TRIGGER ".idf_escape($I["Trigger"]).($x=="mssql"?$uf.$li:$li.$uf).rtrim(" $I[Type]\n$I[Statement]",";").";";}function
create_routine($Zg,$I){global$Vd,$x;$N=array();$p=(array)$I["fields"];ksort($p);foreach($p
as$o){if($o["field"]!="")$N[]=(preg_match("~^($Vd)\$~",$o["inout"])?"$o[inout] ":"").idf_escape($o["field"]).process_type($o,"CHARACTER SET");}$Yb=rtrim("\n$I[definition]",";");return"CREATE $Zg ".idf_escape(trim($I["name"]))." (".implode(", ",$N).")".(isset($_GET["function"])?" RETURNS".process_type($I["returns"],"CHARACTER SET"):"").($I["language"]?" LANGUAGE $I[language]":"").($x=="pgsql"?" AS ".q($Yb):"$Yb;");}function
remove_definer($F){return
preg_replace('~^([A-Z =]+) DEFINER=`'.preg_replace('~@(.*)~','`@`(%|\1)',logged_user()).'`~','\1',$F);}function
format_foreign_key($q){global$vf;$l=$q["db"];$jf=$q["ns"];return" FOREIGN KEY (".implode(", ",array_map('idf_escape',$q["source"])).") REFERENCES ".($l!=""&&$l!=$_GET["db"]?idf_escape($l).".":"").($jf!=""&&$jf!=$_GET["ns"]?idf_escape($jf).".":"").table($q["table"])." (".implode(", ",array_map('idf_escape',$q["target"])).")".(preg_match("~^($vf)\$~",$q["on_delete"])?" ON DELETE $q[on_delete]":"").(preg_match("~^($vf)\$~",$q["on_update"])?" ON UPDATE $q[on_update]":"");}function
tar_file($Yc,$qi){$H=pack("a100a8a8a8a12a12",$Yc,644,0,0,decoct($qi->size),decoct(time()));$ib=8*32;for($s=0;$s<strlen($H);$s++)$ib+=ord($H[$s]);$H.=sprintf("%06o",$ib)."\0 ";echo$H,str_repeat("\0",512-strlen($H));$qi->send();echo
str_repeat("\0",511-($qi->size+511)%512);}function
ini_bytes($Ud){$X=ini_get($Ud);switch(strtolower(substr($X,-1))){case'g':$X*=1024;case'm':$X*=1024;case'k':$X*=1024;}return$X;}function
doc_link($eg,$hi="<sup>?</sup>"){global$x,$h;$qh=$h->server_info;$dj=preg_replace('~^(\d\.?\d).*~s','\1',$qh);$Si=array('sql'=>"https://dev.mysql.com/doc/refman/$dj/en/",'sqlite'=>"https://www.sqlite.org/",'pgsql'=>"https://www.postgresql.org/docs/$dj/",'mssql'=>"https://msdn.microsoft.com/library/",'oracle'=>"https://www.oracle.com/pls/topic/lookup?ctx=db".preg_replace('~^.* (\d+)\.(\d+)\.\d+\.\d+\.\d+.*~s','\1\2',$qh)."&id=",);if(preg_match('~MariaDB~',$qh)){$Si['sql']="https://mariadb.com/kb/en/library/";$eg['sql']=(isset($eg['mariadb'])?$eg['mariadb']:str_replace(".html","/",$eg['sql']));}return($eg[$x]?"<a href='$Si[$x]$eg[$x]'".target_blank().">$hi</a>":"");}function
ob_gzencode($P){return
gzencode($P);}function
db_size($l){global$h;if(!$h->select_db($l))return"?";$H=0;foreach(table_status()as$R)$H+=$R["Data_length"]+$R["Index_length"];return
format_number($H);}function
set_utf8mb4($Hb){global$h;static$N=false;if(!$N&&preg_match('~\butf8mb4~i',$Hb)){$N=true;echo"SET NAMES ".charset($h).";\n\n";}}function
connect_error(){global$b,$h,$ti,$n,$ic;if(DB!=""){header("HTTP/1.1 404 Not Found");page_header(lang(38).": ".h(DB),lang(112),true);}else{if($_POST["db"]&&!$n)queries_redirect(substr(ME,0,-1),lang(113),drop_databases($_POST["db"]));page_header(lang(114),$n,false);echo"<p class='links'>\n";foreach(array('database'=>lang(115),'privileges'=>lang(72),'processlist'=>lang(116),'variables'=>lang(117),'status'=>lang(118),)as$y=>$X){if(support($y))echo"<a href='".h(ME)."$y='>$X</a>\n";}echo"<p>".lang(119,$ic[DRIVER],"<b>".h($h->server_info)."</b>","<b>$h->extension</b>")."\n","<p>".lang(120,"<b>".h(logged_user())."</b>")."\n";$k=$b->databases();if($k){$gh=support("scheme");$qb=collations();echo"<form action='' method='post'>\n","<table cellspacing='0' class='checkable'>\n",script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});"),"<thead><tr>".(support("database")?"<td>":"")."<th>".lang(38)." - <a href='".h(ME)."refresh=1'>".lang(121)."</a>"."<td>".lang(122)."<td>".lang(123)."<td>".lang(124)." - <a href='".h(ME)."dbsize=1'>".lang(125)."</a>".script("qsl('a').onclick = partial(ajaxSetHtml, '".js_escape(ME)."script=connect');","")."</thead>\n";$k=($_GET["dbsize"]?count_tables($k):array_flip($k));foreach($k
as$l=>$S){$Yg=h(ME)."db=".urlencode($l);$t=h("Db-".$l);echo"<tr".odd().">".(support("database")?"<td>".checkbox("db[]",$l,in_array($l,(array)$_POST["db"]),"","","",$t):""),"<th><a href='$Yg' id='$t'>".h($l)."</a>";$d=h(db_collation($l,$qb));echo"<td>".(support("database")?"<a href='$Yg".($gh?"&amp;ns=":"")."&amp;database=' title='".lang(68)."'>$d</a>":$d),"<td align='right'><a href='$Yg&amp;schema=' id='tables-".h($l)."' title='".lang(71)."'>".($_GET["dbsize"]?$S:"?")."</a>","<td align='right' id='size-".h($l)."'>".($_GET["dbsize"]?db_size($l):"?"),"\n";}echo"</table>\n",(support("database")?"<div class='footer'><div>\n"."<fieldset><legend>".lang(126)." <span id='selected'></span></legend><div>\n"."<input type='hidden' name='all' value=''>".script("qsl('input').onclick = function () { selectCount('selected', formChecked(this, /^db/)); };")."<input type='submit' name='drop' value='".lang(127)."'>".confirm()."\n"."</div></fieldset>\n"."</div></div>\n":""),"<input type='hidden' name='token' value='$ti'>\n","</form>\n",script("tableCheck();");}}page_footer("db");}if(isset($_GET["status"]))$_GET["variables"]=$_GET["status"];if(isset($_GET["import"]))$_GET["sql"]=$_GET["import"];if(!(DB!=""?$h->select_db(DB):isset($_GET["sql"])||isset($_GET["dump"])||isset($_GET["database"])||isset($_GET["processlist"])||isset($_GET["privileges"])||isset($_GET["user"])||isset($_GET["variables"])||$_GET["script"]=="connect"||$_GET["script"]=="kill")){if(DB!=""||$_GET["refresh"]){restart_session();set_session("dbs",null);}connect_error();exit;}if(support("scheme")&&DB!=""&&$_GET["ns"]!==""){if(!isset($_GET["ns"]))redirect(preg_replace('~ns=[^&]*&~','',ME)."ns=".get_schema());if(!set_schema($_GET["ns"])){header("HTTP/1.1 404 Not Found");page_header(lang(78).": ".h($_GET["ns"]),lang(128),true);page_footer("ns");exit;}}$vf="RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";class
TmpFile{var$handler;var$size;function
__construct(){$this->handler=tmpfile();}function
write($Cb){$this->size+=strlen($Cb);fwrite($this->handler,$Cb);}function
send(){fseek($this->handler,0);fpassthru($this->handler);fclose($this->handler);}}$_c="'(?:''|[^'\\\\]|\\\\.)*'";$Vd="IN|OUT|INOUT";if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"])$_GET["edit"]=$_GET["select"];if(isset($_GET["callf"]))$_GET["call"]=$_GET["callf"];if(isset($_GET["function"]))$_GET["procedure"]=$_GET["function"];if(isset($_GET["download"])){$a=$_GET["download"];$p=fields($a);header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$a-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));$K=array(idf_escape($_GET["field"]));$G=$m->select($a,$K,array(where($_GET,$p)),$K);$I=($G?$G->fetch_row():array());echo$m->value($I[0],$p[$_GET["field"]]);exit;}elseif(isset($_GET["table"])){$a=$_GET["table"];$p=fields($a);if(!$p)$n=error();$R=table_status1($a,true);$B=$b->tableName($R);page_header(($p&&is_view($R)?$R['Engine']=='materialized view'?lang(129):lang(130):lang(131)).": ".($B!=""?$B:h($a)),$n);$b->selectLinks($R);$vb=$R["Comment"];if($vb!="")echo"<p class='nowrap'>".lang(51).": ".h($vb)."\n";if($p)$b->tableStructurePrint($p);if(!is_view($R)){if(support("indexes")){echo"<h3 id='indexes'>".lang(132)."</h3>\n";$w=indexes($a);if($w)$b->tableIndexesPrint($w);echo'<p class="links"><a href="'.h(ME).'indexes='.urlencode($a).'">'.lang(133)."</a>\n";}if(fk_support($R)){echo"<h3 id='foreign-keys'>".lang(100)."</h3>\n";$id=foreign_keys($a);if($id){echo"<table cellspacing='0'>\n","<thead><tr><th>".lang(134)."<td>".lang(135)."<td>".lang(103)."<td>".lang(102)."<td></thead>\n";foreach($id
as$B=>$q){echo"<tr title='".h($B)."'>","<th><i>".implode("</i>, <i>",array_map('h',$q["source"]))."</i>","<td><a href='".h($q["db"]!=""?preg_replace('~db=[^&]*~',"db=".urlencode($q["db"]),ME):($q["ns"]!=""?preg_replace('~ns=[^&]*~',"ns=".urlencode($q["ns"]),ME):ME))."table=".urlencode($q["table"])."'>".($q["db"]!=""?"<b>".h($q["db"])."</b>.":"").($q["ns"]!=""?"<b>".h($q["ns"])."</b>.":"").h($q["table"])."</a>","(<i>".implode("</i>, <i>",array_map('h',$q["target"]))."</i>)","<td>".h($q["on_delete"])."\n","<td>".h($q["on_update"])."\n",'<td><a href="'.h(ME.'foreign='.urlencode($a).'&name='.urlencode($B)).'">'.lang(136).'</a>';}echo"</table>\n";}echo'<p class="links"><a href="'.h(ME).'foreign='.urlencode($a).'">'.lang(137)."</a>\n";}}if(support(is_view($R)?"view_trigger":"trigger")){echo"<h3 id='triggers'>".lang(138)."</h3>\n";$Ei=triggers($a);if($Ei){echo"<table cellspacing='0'>\n";foreach($Ei
as$y=>$X)echo"<tr valign='top'><td>".h($X[0])."<td>".h($X[1])."<th>".h($y)."<td><a href='".h(ME.'trigger='.urlencode($a).'&name='.urlencode($y))."'>".lang(136)."</a>\n";echo"</table>\n";}echo'<p class="links"><a href="'.h(ME).'trigger='.urlencode($a).'">'.lang(139)."</a>\n";}}elseif(isset($_GET["schema"])){page_header(lang(71),"",array(),h(DB.($_GET["ns"]?".$_GET[ns]":"")));$Wh=array();$Xh=array();$ea=($_GET["schema"]?$_GET["schema"]:$_COOKIE["adminer_schema-".str_replace(".","_",DB)]);preg_match_all('~([^:]+):([-0-9.]+)x([-0-9.]+)(_|$)~',$ea,$Ie,PREG_SET_ORDER);foreach($Ie
as$s=>$A){$Wh[$A[1]]=array($A[2],$A[3]);$Xh[]="\n\t'".js_escape($A[1])."': [ $A[2], $A[3] ]";}$ui=0;$Sa=-1;$fh=array();$Kg=array();$we=array();foreach(table_status('',true)as$Q=>$R){if(is_view($R))continue;$jg=0;$fh[$Q]["fields"]=array();foreach(fields($Q)as$B=>$o){$jg+=1.25;$o["pos"]=$jg;$fh[$Q]["fields"][$B]=$o;}$fh[$Q]["pos"]=($Wh[$Q]?$Wh[$Q]:array($ui,0));foreach($b->foreignKeys($Q)as$X){if(!$X["db"]){$ue=$Sa;if($Wh[$Q][1]||$Wh[$X["table"]][1])$ue=min(floatval($Wh[$Q][1]),floatval($Wh[$X["table"]][1]))-1;else$Sa-=.1;while($we[(string)$ue])$ue-=.0001;$fh[$Q]["references"][$X["table"]][(string)$ue]=array($X["source"],$X["target"]);$Kg[$X["table"]][$Q][(string)$ue]=$X["target"];$we[(string)$ue]=true;}}$ui=max($ui,$fh[$Q]["pos"][0]+2.5+$jg);}echo'<div id="schema" style="height: ',$ui,'em;">
<script',nonce(),'>
qs(\'#schema\').onselectstart = function () { return false; };
var tablePos = {',implode(",",$Xh)."\n",'};
var em = qs(\'#schema\').offsetHeight / ',$ui,';
document.onmousemove = schemaMousemove;
document.onmouseup = partialArg(schemaMouseup, \'',js_escape(DB),'\');
</script>
';foreach($fh
as$B=>$Q){echo"<div class='table' style='top: ".$Q["pos"][0]."em; left: ".$Q["pos"][1]."em;'>",'<a href="'.h(ME).'table='.urlencode($B).'"><b>'.h($B)."</b></a>",script("qsl('div').onmousedown = schemaMousedown;");foreach($Q["fields"]as$o){$X='<span'.type_class($o["type"]).' title="'.h($o["full_type"].($o["null"]?" NULL":'')).'">'.h($o["field"]).'</span>';echo"<br>".($o["primary"]?"<i>$X</i>":$X);}foreach((array)$Q["references"]as$di=>$Lg){foreach($Lg
as$ue=>$Hg){$ve=$ue-$Wh[$B][1];$s=0;foreach($Hg[0]as$Ah)echo"\n<div class='references' title='".h($di)."' id='refs$ue-".($s++)."' style='left: $ve"."em; top: ".$Q["fields"][$Ah]["pos"]."em; padding-top: .5em;'><div style='border-top: 1px solid Gray; width: ".(-$ve)."em;'></div></div>";}}foreach((array)$Kg[$B]as$di=>$Lg){foreach($Lg
as$ue=>$f){$ve=$ue-$Wh[$B][1];$s=0;foreach($f
as$ci)echo"\n<div class='references' title='".h($di)."' id='refd$ue-".($s++)."' style='left: $ve"."em; top: ".$Q["fields"][$ci]["pos"]."em; height: 1.25em; background: url(".h(preg_replace("~\\?.*~","",ME)."?file=arrow.gif) no-repeat right center;&version=4.7.7")."'><div style='height: .5em; border-bottom: 1px solid Gray; width: ".(-$ve)."em;'></div></div>";}}echo"\n</div>\n";}foreach($fh
as$B=>$Q){foreach((array)$Q["references"]as$di=>$Lg){foreach($Lg
as$ue=>$Hg){$Xe=$ui;$Me=-10;foreach($Hg[0]as$y=>$Ah){$kg=$Q["pos"][0]+$Q["fields"][$Ah]["pos"];$lg=$fh[$di]["pos"][0]+$fh[$di]["fields"][$Hg[1][$y]]["pos"];$Xe=min($Xe,$kg,$lg);$Me=max($Me,$kg,$lg);}echo"<div class='references' id='refl$ue' style='left: $ue"."em; top: $Xe"."em; padding: .5em 0;'><div style='border-right: 1px solid Gray; margin-top: 1px; height: ".($Me-$Xe)."em;'></div></div>\n";}}}echo'</div>
<p class="links"><a href="',h(ME."schema=".urlencode($ea)),'" id="schema-link">',lang(140),'</a>
';}elseif(isset($_GET["dump"])){$a=$_GET["dump"];if($_POST&&!$n){$Fb="";foreach(array("output","format","db_style","routines","events","table_style","auto_increment","triggers","data_style")as$y)$Fb.="&$y=".urlencode($_POST[$y]);cookie("adminer_export",substr($Fb,1));$S=array_flip((array)$_POST["tables"])+array_flip((array)$_POST["data"]);$Mc=dump_headers((count($S)==1?key($S):DB),(DB==""||count($S)>1));$de=preg_match('~sql~',$_POST["format"]);if($de){echo"-- Adminer $ia ".$ic[DRIVER]." dump\n\n";if($x=="sql"){echo"SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
".($_POST["data_style"]?"SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';
":"")."
";$h->query("SET time_zone = '+00:00';");}}$Nh=$_POST["db_style"];$k=array(DB);if(DB==""){$k=$_POST["databases"];if(is_string($k))$k=explode("\n",rtrim(str_replace("\r","",$k),"\n"));}foreach((array)$k
as$l){$b->dumpDatabase($l);if($h->select_db($l)){if($de&&preg_match('~CREATE~',$Nh)&&($Hb=$h->result("SHOW CREATE DATABASE ".idf_escape($l),1))){set_utf8mb4($Hb);if($Nh=="DROP+CREATE")echo"DROP DATABASE IF EXISTS ".idf_escape($l).";\n";echo"$Hb;\n";}if($de){if($Nh)echo
use_sql($l).";\n\n";$Of="";if($_POST["routines"]){foreach(array("FUNCTION","PROCEDURE")as$Zg){foreach(get_rows("SHOW $Zg STATUS WHERE Db = ".q($l),null,"-- ")as$I){$Hb=remove_definer($h->result("SHOW CREATE $Zg ".idf_escape($I["Name"]),2));set_utf8mb4($Hb);$Of.=($Nh!='DROP+CREATE'?"DROP $Zg IF EXISTS ".idf_escape($I["Name"]).";;\n":"")."$Hb;;\n\n";}}}if($_POST["events"]){foreach(get_rows("SHOW EVENTS",null,"-- ")as$I){$Hb=remove_definer($h->result("SHOW CREATE EVENT ".idf_escape($I["Name"]),3));set_utf8mb4($Hb);$Of.=($Nh!='DROP+CREATE'?"DROP EVENT IF EXISTS ".idf_escape($I["Name"]).";;\n":"")."$Hb;;\n\n";}}if($Of)echo"DELIMITER ;;\n\n$Of"."DELIMITER ;\n\n";}if($_POST["table_style"]||$_POST["data_style"]){$fj=array();foreach(table_status('',true)as$B=>$R){$Q=(DB==""||in_array($B,(array)$_POST["tables"]));$Pb=(DB==""||in_array($B,(array)$_POST["data"]));if($Q||$Pb){if($Mc=="tar"){$qi=new
TmpFile;ob_start(array($qi,'write'),1e5);}$b->dumpTable($B,($Q?$_POST["table_style"]:""),(is_view($R)?2:0));if(is_view($R))$fj[]=$B;elseif($Pb){$p=fields($B);$b->dumpData($B,$_POST["data_style"],"SELECT *".convert_fields($p,$p)." FROM ".table($B));}if($de&&$_POST["triggers"]&&$Q&&($Ei=trigger_sql($B)))echo"\nDELIMITER ;;\n$Ei\nDELIMITER ;\n";if($Mc=="tar"){ob_end_flush();tar_file((DB!=""?"":"$l/")."$B.csv",$qi);}elseif($de)echo"\n";}}foreach($fj
as$ej)$b->dumpTable($ej,$_POST["table_style"],1);if($Mc=="tar")echo
pack("x512");}}}if($de)echo"-- ".$h->result("SELECT NOW()")."\n";exit;}page_header(lang(74),$n,($_GET["export"]!=""?array("table"=>$_GET["export"]):array()),h(DB));echo'
<form action="" method="post">
<table cellspacing="0" class="layout">
';$Tb=array('','USE','DROP+CREATE','CREATE');$Yh=array('','DROP+CREATE','CREATE');$Qb=array('','TRUNCATE+INSERT','INSERT');if($x=="sql")$Qb[]='INSERT+UPDATE';parse_str($_COOKIE["adminer_export"],$I);if(!$I)$I=array("output"=>"text","format"=>"sql","db_style"=>(DB!=""?"":"CREATE"),"table_style"=>"DROP+CREATE","data_style"=>"INSERT");if(!isset($I["events"])){$I["routines"]=$I["events"]=($_GET["dump"]=="");$I["triggers"]=$I["table_style"];}echo"<tr><th>".lang(141)."<td>".html_select("output",$b->dumpOutput(),$I["output"],0)."\n";echo"<tr><th>".lang(142)."<td>".html_select("format",$b->dumpFormat(),$I["format"],0)."\n";echo($x=="sqlite"?"":"<tr><th>".lang(38)."<td>".html_select('db_style',$Tb,$I["db_style"]).(support("routine")?checkbox("routines",1,$I["routines"],lang(143)):"").(support("event")?checkbox("events",1,$I["events"],lang(144)):"")),"<tr><th>".lang(123)."<td>".html_select('table_style',$Yh,$I["table_style"]).checkbox("auto_increment",1,$I["auto_increment"],lang(52)).(support("trigger")?checkbox("triggers",1,$I["triggers"],lang(138)):""),"<tr><th>".lang(145)."<td>".html_select('data_style',$Qb,$I["data_style"]),'</table>
<p><input type="submit" value="',lang(74),'">
<input type="hidden" name="token" value="',$ti,'">

<table cellspacing="0">
',script("qsl('table').onclick = dumpClick;");$og=array();if(DB!=""){$gb=($a!=""?"":" checked");echo"<thead><tr>","<th style='text-align: left;'><label class='block'><input type='checkbox' id='check-tables'$gb>".lang(123)."</label>".script("qs('#check-tables').onclick = partial(formCheck, /^tables\\[/);",""),"<th style='text-align: right;'><label class='block'>".lang(145)."<input type='checkbox' id='check-data'$gb></label>".script("qs('#check-data').onclick = partial(formCheck, /^data\\[/);",""),"</thead>\n";$fj="";$Zh=tables_list();foreach($Zh
as$B=>$T){$ng=preg_replace('~_.*~','',$B);$gb=($a==""||$a==(substr($a,-1)=="%"?"$ng%":$B));$rg="<tr><td>".checkbox("tables[]",$B,$gb,$B,"","block");if($T!==null&&!preg_match('~table~i',$T))$fj.="$rg\n";else
echo"$rg<td align='right'><label class='block'><span id='Rows-".h($B)."'></span>".checkbox("data[]",$B,$gb)."</label>\n";$og[$ng]++;}echo$fj;if($Zh)echo
script("ajaxSetHtml('".js_escape(ME)."script=db');");}else{echo"<thead><tr><th style='text-align: left;'>","<label class='block'><input type='checkbox' id='check-databases'".($a==""?" checked":"").">".lang(38)."</label>",script("qs('#check-databases').onclick = partial(formCheck, /^databases\\[/);",""),"</thead>\n";$k=$b->databases();if($k){foreach($k
as$l){if(!information_schema($l)){$ng=preg_replace('~_.*~','',$l);echo"<tr><td>".checkbox("databases[]",$l,$a==""||$a=="$ng%",$l,"","block")."\n";$og[$ng]++;}}}else
echo"<tr><td><textarea name='databases' rows='10' cols='20'></textarea>";}echo'</table>
</form>
';$ad=true;foreach($og
as$y=>$X){if($y!=""&&$X>1){echo($ad?"<p>":" ")."<a href='".h(ME)."dump=".urlencode("$y%")."'>".h($y)."</a>";$ad=false;}}}elseif(isset($_GET["privileges"])){page_header(lang(72));echo'<p class="links"><a href="'.h(ME).'user=">'.lang(146)."</a>";$G=$h->query("SELECT User, Host FROM mysql.".(DB==""?"user":"db WHERE ".q(DB)." LIKE Db")." ORDER BY Host, User");$pd=$G;if(!$G)$G=$h->query("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1) AS User, SUBSTRING_INDEX(CURRENT_USER, '@', -1) AS Host");echo"<form action=''><p>\n";hidden_fields_get();echo"<input type='hidden' name='db' value='".h(DB)."'>\n",($pd?"":"<input type='hidden' name='grant' value=''>\n"),"<table cellspacing='0'>\n","<thead><tr><th>".lang(36)."<th>".lang(35)."<th></thead>\n";while($I=$G->fetch_assoc())echo'<tr'.odd().'><td>'.h($I["User"])."<td>".h($I["Host"]).'<td><a href="'.h(ME.'user='.urlencode($I["User"]).'&host='.urlencode($I["Host"])).'">'.lang(10)."</a>\n";if(!$pd||DB!="")echo"<tr".odd()."><td><input name='user' autocapitalize='off'><td><input name='host' value='localhost' autocapitalize='off'><td><input type='submit' value='".lang(10)."'>\n";echo"</table>\n","</form>\n";}elseif(isset($_GET["sql"])){if(!$n&&$_POST["export"]){dump_headers("sql");$b->dumpTable("","");$b->dumpData("","table",$_POST["query"]);exit;}restart_session();$Cd=&get_session("queries");$Bd=&$Cd[DB];if(!$n&&$_POST["clear"]){$Bd=array();redirect(remove_from_uri("history"));}page_header((isset($_GET["import"])?lang(73):lang(65)),$n);if(!$n&&$_POST){$md=false;if(!isset($_GET["import"]))$F=$_POST["query"];elseif($_POST["webfile"]){$Eh=$b->importServerPath();$md=@fopen((file_exists($Eh)?$Eh:"compress.zlib://$Eh.gz"),"rb");$F=($md?fread($md,1e6):false);}else$F=get_file("sql_file",true);if(is_string($F)){if(function_exists('memory_get_usage'))@ini_set("memory_limit",max(ini_bytes("memory_limit"),2*strlen($F)+memory_get_usage()+8e6));if($F!=""&&strlen($F)<1e6){$zg=$F.(preg_match("~;[ \t\r\n]*\$~",$F)?"":";");if(!$Bd||reset(end($Bd))!=$zg){restart_session();$Bd[]=array($zg,time());set_session("queries",$Cd);stop_session();}}$Bh="(?:\\s|/\\*[\s\S]*?\\*/|(?:#|-- )[^\n]*\n?|--\r?\n)";$ac=";";$C=0;$xc=true;$i=connect();if(is_object($i)&&DB!=""){$i->select_db(DB);if($_GET["ns"]!="")set_schema($_GET["ns"],$i);}$ub=0;$Bc=array();$Vf='[\'"'.($x=="sql"?'`#':($x=="sqlite"?'`[':($x=="mssql"?'[':''))).']|/\*|-- |$'.($x=="pgsql"?'|\$[^$]*\$':'');$vi=microtime(true);parse_str($_COOKIE["adminer_export"],$ya);$oc=$b->dumpFormat();unset($oc["sql"]);while($F!=""){if(!$C&&preg_match("~^$Bh*+DELIMITER\\s+(\\S+)~i",$F,$A)){$ac=$A[1];$F=substr($F,strlen($A[0]));}else{preg_match('('.preg_quote($ac)."\\s*|$Vf)",$F,$A,PREG_OFFSET_CAPTURE,$C);list($kd,$jg)=$A[0];if(!$kd&&$md&&!feof($md))$F.=fread($md,1e5);else{if(!$kd&&rtrim($F)=="")break;$C=$jg+strlen($kd);if($kd&&rtrim($kd)!=$ac){while(preg_match('('.($kd=='/*'?'\*/':($kd=='['?']':(preg_match('~^-- |^#~',$kd)?"\n":preg_quote($kd)."|\\\\."))).'|$)s',$F,$A,PREG_OFFSET_CAPTURE,$C)){$dh=$A[0][0];if(!$dh&&$md&&!feof($md))$F.=fread($md,1e5);else{$C=$A[0][1]+strlen($dh);if($dh[0]!="\\")break;}}}else{$xc=false;$zg=substr($F,0,$jg);$ub++;$rg="<pre id='sql-$ub'><code class='jush-$x'>".$b->sqlCommandQuery($zg)."</code></pre>\n";if($x=="sqlite"&&preg_match("~^$Bh*+ATTACH\\b~i",$zg,$A)){echo$rg,"<p class='error'>".lang(147)."\n";$Bc[]=" <a href='#sql-$ub'>$ub</a>";if($_POST["error_stops"])break;}else{if(!$_POST["only_errors"]){echo$rg;ob_flush();flush();}$Ih=microtime(true);if($h->multi_query($zg)&&is_object($i)&&preg_match("~^$Bh*+USE\\b~i",$zg))$i->query($zg);do{$G=$h->store_result();if($h->error){echo($_POST["only_errors"]?$rg:""),"<p class='error'>".lang(148).($h->errno?" ($h->errno)":"").": ".error()."\n";$Bc[]=" <a href='#sql-$ub'>$ub</a>";if($_POST["error_stops"])break
2;}else{$ji=" <span class='time'>(".format_time($Ih).")</span>".(strlen($zg)<1000?" <a href='".h(ME)."sql=".urlencode(trim($zg))."'>".lang(10)."</a>":"");$_a=$h->affected_rows;$ij=($_POST["only_errors"]?"":$m->warnings());$jj="warnings-$ub";if($ij)$ji.=", <a href='#$jj'>".lang(47)."</a>".script("qsl('a').onclick = partial(toggle, '$jj');","");$Jc=null;$Kc="explain-$ub";if(is_object($G)){$z=$_POST["limit"];$Hf=select($G,$i,array(),$z);if(!$_POST["only_errors"]){echo"<form action='' method='post'>\n";$lf=$G->num_rows;echo"<p>".($lf?($z&&$lf>$z?lang(149,$z):"").lang(150,$lf):""),$ji;if($i&&preg_match("~^($Bh|\\()*+SELECT\\b~i",$zg)&&($Jc=explain($i,$zg)))echo", <a href='#$Kc'>Explain</a>".script("qsl('a').onclick = partial(toggle, '$Kc');","");$t="export-$ub";echo", <a href='#$t'>".lang(74)."</a>".script("qsl('a').onclick = partial(toggle, '$t');","")."<span id='$t' class='hidden'>: ".html_select("output",$b->dumpOutput(),$ya["output"])." ".html_select("format",$oc,$ya["format"])."<input type='hidden' name='query' value='".h($zg)."'>"." <input type='submit' name='export' value='".lang(74)."'><input type='hidden' name='token' value='$ti'></span>\n"."</form>\n";}}else{if(preg_match("~^$Bh*+(CREATE|DROP|ALTER)$Bh++(DATABASE|SCHEMA)\\b~i",$zg)){restart_session();set_session("dbs",null);stop_session();}if(!$_POST["only_errors"])echo"<p class='message' title='".h($h->info)."'>".lang(151,$_a)."$ji\n";}echo($ij?"<div id='$jj' class='hidden'>\n$ij</div>\n":"");if($Jc){echo"<div id='$Kc' class='hidden'>\n";select($Jc,$i,$Hf);echo"</div>\n";}}$Ih=microtime(true);}while($h->next_result());}$F=substr($F,$C);$C=0;}}}}if($xc)echo"<p class='message'>".lang(152)."\n";elseif($_POST["only_errors"]){echo"<p class='message'>".lang(153,$ub-count($Bc))," <span class='time'>(".format_time($vi).")</span>\n";}elseif($Bc&&$ub>1)echo"<p class='error'>".lang(148).": ".implode("",$Bc)."\n";}else
echo"<p class='error'>".upload_error($F)."\n";}echo'
<form action="" method="post" enctype="multipart/form-data" id="form">
';$Gc="<input type='submit' value='".lang(154)."' title='Ctrl+Enter'>";if(!isset($_GET["import"])){$zg=$_GET["sql"];if($_POST)$zg=$_POST["query"];elseif($_GET["history"]=="all")$zg=$Bd;elseif($_GET["history"]!="")$zg=$Bd[$_GET["history"]][0];echo"<p>";textarea("query",$zg,20);echo
script(($_POST?"":"qs('textarea').focus();\n")."qs('#form').onsubmit = partial(sqlSubmit, qs('#form'), '".remove_from_uri("sql|limit|error_stops|only_errors")."');"),"<p>$Gc\n",lang(155).": <input type='number' name='limit' class='size' value='".h($_POST?$_POST["limit"]:$_GET["limit"])."'>\n";}else{echo"<fieldset><legend>".lang(156)."</legend><div>";$vd=(extension_loaded("zlib")?"[.gz]":"");echo(ini_bool("file_uploads")?"SQL$vd (&lt; ".ini_get("upload_max_filesize")."B): <input type='file' name='sql_file[]' multiple>\n$Gc":lang(157)),"</div></fieldset>\n";$Kd=$b->importServerPath();if($Kd){echo"<fieldset><legend>".lang(158)."</legend><div>",lang(159,"<code>".h($Kd)."$vd</code>"),' <input type="submit" name="webfile" value="'.lang(160).'">',"</div></fieldset>\n";}echo"<p>";}echo
checkbox("error_stops",1,($_POST?$_POST["error_stops"]:isset($_GET["import"])),lang(161))."\n",checkbox("only_errors",1,($_POST?$_POST["only_errors"]:isset($_GET["import"])),lang(162))."\n","<input type='hidden' name='token' value='$ti'>\n";if(!isset($_GET["import"])&&$Bd){print_fieldset("history",lang(163),$_GET["history"]!="");for($X=end($Bd);$X;$X=prev($Bd)){$y=key($Bd);list($zg,$ji,$sc)=$X;echo'<a href="'.h(ME."sql=&history=$y").'">'.lang(10)."</a>"." <span class='time' title='".@date('Y-m-d',$ji)."'>".@date("H:i:s",$ji)."</span>"." <code class='jush-$x'>".shorten_utf8(ltrim(str_replace("\n"," ",str_replace("\r","",preg_replace('~^(#|-- ).*~m','',$zg)))),80,"</code>").($sc?" <span class='time'>($sc)</span>":"")."<br>\n";}echo"<input type='submit' name='clear' value='".lang(164)."'>\n","<a href='".h(ME."sql=&history=all")."'>".lang(165)."</a>\n","</div></fieldset>\n";}echo'</form>
';}elseif(isset($_GET["edit"])){$a=$_GET["edit"];$p=fields($a);$Z=(isset($_GET["select"])?($_POST["check"]&&count($_POST["check"])==1?where_check($_POST["check"][0],$p):""):where($_GET,$p));$Oi=(isset($_GET["select"])?$_POST["edit"]:$Z);foreach($p
as$B=>$o){if(!isset($o["privileges"][$Oi?"update":"insert"])||$b->fieldName($o)==""||$o["generated"])unset($p[$B]);}if($_POST&&!$n&&!isset($_GET["select"])){$Be=$_POST["referer"];if($_POST["insert"])$Be=($Oi?null:$_SERVER["REQUEST_URI"]);elseif(!preg_match('~^.+&select=.+$~',$Be))$Be=ME."select=".urlencode($a);$w=indexes($a);$Ji=unique_array($_GET["where"],$w);$Bg="\nWHERE $Z";if(isset($_POST["delete"]))queries_redirect($Be,lang(166),$m->delete($a,$Bg,!$Ji));else{$N=array();foreach($p
as$B=>$o){$X=process_input($o);if($X!==false&&$X!==null)$N[idf_escape($B)]=$X;}if($Oi){if(!$N)redirect($Be);queries_redirect($Be,lang(167),$m->update($a,$N,$Bg,!$Ji));if(is_ajax()){page_headers();page_messages($n);exit;}}else{$G=$m->insert($a,$N);$te=($G?last_id():0);queries_redirect($Be,lang(168,($te?" $te":"")),$G);}}}$I=null;if($_POST["save"])$I=(array)$_POST["fields"];elseif($Z){$K=array();foreach($p
as$B=>$o){if(isset($o["privileges"]["select"])){$Ha=convert_field($o);if($_POST["clone"]&&$o["auto_increment"])$Ha="''";if($x=="sql"&&preg_match("~enum|set~",$o["type"]))$Ha="1*".idf_escape($B);$K[]=($Ha?"$Ha AS ":"").idf_escape($B);}}$I=array();if(!support("table"))$K=array("*");if($K){$G=$m->select($a,$K,array($Z),$K,array(),(isset($_GET["select"])?2:1));if(!$G)$n=error();else{$I=$G->fetch_assoc();if(!$I)$I=false;}if(isset($_GET["select"])&&(!$I||$G->fetch_assoc()))$I=null;}}if(!support("table")&&!$p){if(!$Z){$G=$m->select($a,array("*"),$Z,array("*"));$I=($G?$G->fetch_assoc():false);if(!$I)$I=array($m->primary=>"");}if($I){foreach($I
as$y=>$X){if(!$Z)$I[$y]=null;$p[$y]=array("field"=>$y,"null"=>($y!=$m->primary),"auto_increment"=>($y==$m->primary));}}}edit_form($a,$p,$I,$Oi);}elseif(isset($_GET["create"])){$a=$_GET["create"];$Xf=array();foreach(array('HASH','LINEAR HASH','KEY','LINEAR KEY','RANGE','LIST')as$y)$Xf[$y]=$y;$Jg=referencable_primary($a);$id=array();foreach($Jg
as$Uh=>$o)$id[str_replace("`","``",$Uh)."`".str_replace("`","``",$o["field"])]=$Uh;$Kf=array();$R=array();if($a!=""){$Kf=fields($a);$R=table_status($a);if(!$R)$n=lang(9);}$I=$_POST;$I["fields"]=(array)$I["fields"];if($I["auto_increment_col"])$I["fields"][$I["auto_increment_col"]]["auto_increment"]=true;if($_POST)set_adminer_settings(array("comments"=>$_POST["comments"],"defaults"=>$_POST["defaults"]));if($_POST&&!process_fields($I["fields"])&&!$n){if($_POST["drop"])queries_redirect(substr(ME,0,-1),lang(169),drop_tables(array($a)));else{$p=array();$Ea=array();$Ti=false;$gd=array();$Jf=reset($Kf);$Ba=" FIRST";foreach($I["fields"]as$y=>$o){$q=$id[$o["type"]];$Fi=($q!==null?$Jg[$q]:$o);if($o["field"]!=""){if(!$o["has_default"])$o["default"]=null;if($y==$I["auto_increment_col"])$o["auto_increment"]=true;$wg=process_field($o,$Fi);$Ea[]=array($o["orig"],$wg,$Ba);if($wg!=process_field($Jf,$Jf)){$p[]=array($o["orig"],$wg,$Ba);if($o["orig"]!=""||$Ba)$Ti=true;}if($q!==null)$gd[idf_escape($o["field"])]=($a!=""&&$x!="sqlite"?"ADD":" ").format_foreign_key(array('table'=>$id[$o["type"]],'source'=>array($o["field"]),'target'=>array($Fi["field"]),'on_delete'=>$o["on_delete"],));$Ba=" AFTER ".idf_escape($o["field"]);}elseif($o["orig"]!=""){$Ti=true;$p[]=array($o["orig"]);}if($o["orig"]!=""){$Jf=next($Kf);if(!$Jf)$Ba="";}}$Zf="";if($Xf[$I["partition_by"]]){$ag=array();if($I["partition_by"]=='RANGE'||$I["partition_by"]=='LIST'){foreach(array_filter($I["partition_names"])as$y=>$X){$Y=$I["partition_values"][$y];$ag[]="\n  PARTITION ".idf_escape($X)." VALUES ".($I["partition_by"]=='RANGE'?"LESS THAN":"IN").($Y!=""?" ($Y)":" MAXVALUE");}}$Zf.="\nPARTITION BY $I[partition_by]($I[partition])".($ag?" (".implode(",",$ag)."\n)":($I["partitions"]?" PARTITIONS ".(+$I["partitions"]):""));}elseif(support("partitioning")&&preg_match("~partitioned~",$R["Create_options"]))$Zf.="\nREMOVE PARTITIONING";$Qe=lang(170);if($a==""){cookie("adminer_engine",$I["Engine"]);$Qe=lang(171);}$B=trim($I["name"]);queries_redirect(ME.(support("table")?"table=":"select=").urlencode($B),$Qe,alter_table($a,$B,($x=="sqlite"&&($Ti||$gd)?$Ea:$p),$gd,($I["Comment"]!=$R["Comment"]?$I["Comment"]:null),($I["Engine"]&&$I["Engine"]!=$R["Engine"]?$I["Engine"]:""),($I["Collation"]&&$I["Collation"]!=$R["Collation"]?$I["Collation"]:""),($I["Auto_increment"]!=""?number($I["Auto_increment"]):""),$Zf));}}page_header(($a!=""?lang(45):lang(75)),$n,array("table"=>$a),h($a));if(!$_POST){$I=array("Engine"=>$_COOKIE["adminer_engine"],"fields"=>array(array("field"=>"","type"=>(isset($U["int"])?"int":(isset($U["integer"])?"integer":"")),"on_update"=>"")),"partition_names"=>array(""),);if($a!=""){$I=$R;$I["name"]=$a;$I["fields"]=array();if(!$_GET["auto_increment"])$I["Auto_increment"]="";foreach($Kf
as$o){$o["has_default"]=isset($o["default"]);$I["fields"][]=$o;}if(support("partitioning")){$nd="FROM information_schema.PARTITIONS WHERE TABLE_SCHEMA = ".q(DB)." AND TABLE_NAME = ".q($a);$G=$h->query("SELECT PARTITION_METHOD, PARTITION_ORDINAL_POSITION, PARTITION_EXPRESSION $nd ORDER BY PARTITION_ORDINAL_POSITION DESC LIMIT 1");list($I["partition_by"],$I["partitions"],$I["partition"])=$G->fetch_row();$ag=get_key_vals("SELECT PARTITION_NAME, PARTITION_DESCRIPTION $nd AND PARTITION_NAME != '' ORDER BY PARTITION_ORDINAL_POSITION");$ag[""]="";$I["partition_names"]=array_keys($ag);$I["partition_values"]=array_values($ag);}}}$qb=collations();$zc=engines();foreach($zc
as$yc){if(!strcasecmp($yc,$I["Engine"])){$I["Engine"]=$yc;break;}}echo'
<form action="" method="post" id="form">
<p>
';if(support("columns")||$a==""){echo
lang(172),': <input name="name" data-maxlength="64" value="',h($I["name"]),'" autocapitalize="off">
';if($a==""&&!$_POST)echo
script("focus(qs('#form')['name']);");echo($zc?"<select name='Engine'>".optionlist(array(""=>"(".lang(173).")")+$zc,$I["Engine"])."</select>".on_help("getTarget(event).value",1).script("qsl('select').onchange = helpClose;"):""),' ',($qb&&!preg_match("~sqlite|mssql~",$x)?html_select("Collation",array(""=>"(".lang(101).")")+$qb,$I["Collation"]):""),' <input type="submit" value="',lang(14),'">
';}echo'
';if(support("columns")){echo'<div class="scrollable">
<table cellspacing="0" id="edit-fields" class="nowrap">
';edit_fields($I["fields"],$qb,"TABLE",$id);echo'</table>
',script("editFields();"),'</div>
<p>
',lang(52),': <input type="number" name="Auto_increment" size="6" value="',h($I["Auto_increment"]),'">
',checkbox("defaults",1,($_POST?$_POST["defaults"]:adminer_setting("defaults")),lang(174),"columnShow(this.checked, 5)","jsonly"),(support("comment")?checkbox("comments",1,($_POST?$_POST["comments"]:adminer_setting("comments")),lang(51),"editingCommentsClick(this, true);","jsonly").' <input name="Comment" value="'.h($I["Comment"]).'" data-maxlength="'.(min_version(5.5)?2048:60).'">':''),'<p>
<input type="submit" value="',lang(14),'">
';}echo'
';if($a!=""){echo'<input type="submit" name="drop" value="',lang(127),'">',confirm(lang(175,$a));}if(support("partitioning")){$Yf=preg_match('~RANGE|LIST~',$I["partition_by"]);print_fieldset("partition",lang(176),$I["partition_by"]);echo'<p>
',"<select name='partition_by'>".optionlist(array(""=>"")+$Xf,$I["partition_by"])."</select>".on_help("getTarget(event).value.replace(/./, 'PARTITION BY \$&')",1).script("qsl('select').onchange = partitionByChange;"),'(<input name="partition" value="',h($I["partition"]),'">)
',lang(177),': <input type="number" name="partitions" class="size',($Yf||!$I["partition_by"]?" hidden":""),'" value="',h($I["partitions"]),'">
<table cellspacing="0" id="partition-table"',($Yf?"":" class='hidden'"),'>
<thead><tr><th>',lang(178),'<th>',lang(179),'</thead>
';foreach($I["partition_names"]as$y=>$X){echo'<tr>','<td><input name="partition_names[]" value="'.h($X).'" autocapitalize="off">',($y==count($I["partition_names"])-1?script("qsl('input').oninput = partitionNameChange;"):''),'<td><input name="partition_values[]" value="'.h($I["partition_values"][$y]).'">';}echo'</table>
</div></fieldset>
';}echo'<input type="hidden" name="token" value="',$ti,'">
</form>
';}elseif(isset($_GET["indexes"])){$a=$_GET["indexes"];$Nd=array("PRIMARY","UNIQUE","INDEX");$R=table_status($a,true);if(preg_match('~MyISAM|M?aria'.(min_version(5.6,'10.0.5')?'|InnoDB':'').'~i',$R["Engine"]))$Nd[]="FULLTEXT";if(preg_match('~MyISAM|M?aria'.(min_version(5.7,'10.2.2')?'|InnoDB':'').'~i',$R["Engine"]))$Nd[]="SPATIAL";$w=indexes($a);$pg=array();if($x=="mongo"){$pg=$w["_id_"];unset($Nd[0]);unset($w["_id_"]);}$I=$_POST;if($_POST&&!$n&&!$_POST["add"]&&!$_POST["drop_col"]){$c=array();foreach($I["indexes"]as$v){$B=$v["name"];if(in_array($v["type"],$Nd)){$f=array();$ze=array();$cc=array();$N=array();ksort($v["columns"]);foreach($v["columns"]as$y=>$e){if($e!=""){$ye=$v["lengths"][$y];$bc=$v["descs"][$y];$N[]=idf_escape($e).($ye?"(".(+$ye).")":"").($bc?" DESC":"");$f[]=$e;$ze[]=($ye?$ye:null);$cc[]=$bc;}}if($f){$Hc=$w[$B];if($Hc){ksort($Hc["columns"]);ksort($Hc["lengths"]);ksort($Hc["descs"]);if($v["type"]==$Hc["type"]&&array_values($Hc["columns"])===$f&&(!$Hc["lengths"]||array_values($Hc["lengths"])===$ze)&&array_values($Hc["descs"])===$cc){unset($w[$B]);continue;}}$c[]=array($v["type"],$B,$N);}}}foreach($w
as$B=>$Hc)$c[]=array($Hc["type"],$B,"DROP");if(!$c)redirect(ME."table=".urlencode($a));queries_redirect(ME."table=".urlencode($a),lang(180),alter_indexes($a,$c));}page_header(lang(132),$n,array("table"=>$a),h($a));$p=array_keys(fields($a));if($_POST["add"]){foreach($I["indexes"]as$y=>$v){if($v["columns"][count($v["columns"])]!="")$I["indexes"][$y]["columns"][]="";}$v=end($I["indexes"]);if($v["type"]||array_filter($v["columns"],'strlen'))$I["indexes"][]=array("columns"=>array(1=>""));}if(!$I){foreach($w
as$y=>$v){$w[$y]["name"]=$y;$w[$y]["columns"][]="";}$w[]=array("columns"=>array(1=>""));$I["indexes"]=$w;}echo'
<form action="" method="post">
<div class="scrollable">
<table cellspacing="0" class="nowrap">
<thead><tr>
<th id="label-type">',lang(181),'<th><input type="submit" class="wayoff">',lang(182),'<th id="label-name">',lang(183),'<th><noscript>',"<input type='image' class='icon' name='add[0]' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.7.7")."' alt='+' title='".lang(108)."'>",'</noscript>
</thead>
';if($pg){echo"<tr><td>PRIMARY<td>";foreach($pg["columns"]as$y=>$e){echo
select_input(" disabled",$p,$e),"<label><input disabled type='checkbox'>".lang(60)."</label> ";}echo"<td><td>\n";}$ge=1;foreach($I["indexes"]as$v){if(!$_POST["drop_col"]||$ge!=key($_POST["drop_col"])){echo"<tr><td>".html_select("indexes[$ge][type]",array(-1=>"")+$Nd,$v["type"],($ge==count($I["indexes"])?"indexesAddRow.call(this);":1),"label-type"),"<td>";ksort($v["columns"]);$s=1;foreach($v["columns"]as$y=>$e){echo"<span>".select_input(" name='indexes[$ge][columns][$s]' title='".lang(49)."'",($p?array_combine($p,$p):$p),$e,"partial(".($s==count($v["columns"])?"indexesAddColumn":"indexesChangeColumn").", '".js_escape($x=="sql"?"":$_GET["indexes"]."_")."')"),($x=="sql"||$x=="mssql"?"<input type='number' name='indexes[$ge][lengths][$s]' class='size' value='".h($v["lengths"][$y])."' title='".lang(106)."'>":""),(support("descidx")?checkbox("indexes[$ge][descs][$s]",1,$v["descs"][$y],lang(60)):"")," </span>";$s++;}echo"<td><input name='indexes[$ge][name]' value='".h($v["name"])."' autocapitalize='off' aria-labelledby='label-name'>\n","<td><input type='image' class='icon' name='drop_col[$ge]' src='".h(preg_replace("~\\?.*~","",ME)."?file=cross.gif&version=4.7.7")."' alt='x' title='".lang(111)."'>".script("qsl('input').onclick = partial(editingRemoveRow, 'indexes\$1[type]');");}$ge++;}echo'</table>
</div>
<p>
<input type="submit" value="',lang(14),'">
<input type="hidden" name="token" value="',$ti,'">
</form>
';}elseif(isset($_GET["database"])){$I=$_POST;if($_POST&&!$n&&!isset($_POST["add_x"])){$B=trim($I["name"]);if($_POST["drop"]){$_GET["db"]="";queries_redirect(remove_from_uri("db|database"),lang(184),drop_databases(array(DB)));}elseif(DB!==$B){if(DB!=""){$_GET["db"]=$B;queries_redirect(preg_replace('~\bdb=[^&]*&~','',ME)."db=".urlencode($B),lang(185),rename_database($B,$I["collation"]));}else{$k=explode("\n",str_replace("\r","",$B));$Oh=true;$se="";foreach($k
as$l){if(count($k)==1||$l!=""){if(!create_database($l,$I["collation"]))$Oh=false;$se=$l;}}restart_session();set_session("dbs",null);queries_redirect(ME."db=".urlencode($se),lang(186),$Oh);}}else{if(!$I["collation"])redirect(substr(ME,0,-1));query_redirect("ALTER DATABASE ".idf_escape($B).(preg_match('~^[a-z0-9_]+$~i',$I["collation"])?" COLLATE $I[collation]":""),substr(ME,0,-1),lang(187));}}page_header(DB!=""?lang(68):lang(115),$n,array(),h(DB));$qb=collations();$B=DB;if($_POST)$B=$I["name"];elseif(DB!="")$I["collation"]=db_collation(DB,$qb);elseif($x=="sql"){foreach(get_vals("SHOW GRANTS")as$pd){if(preg_match('~ ON (`(([^\\\\`]|``|\\\\.)*)%`\.\*)?~',$pd,$A)&&$A[1]){$B=stripcslashes(idf_unescape("`$A[2]`"));break;}}}echo'
<form action="" method="post">
<p>
',($_POST["add_x"]||strpos($B,"\n")?'<textarea id="name" name="name" rows="10" cols="40">'.h($B).'</textarea><br>':'<input name="name" id="name" value="'.h($B).'" data-maxlength="64" autocapitalize="off">')."\n".($qb?html_select("collation",array(""=>"(".lang(101).")")+$qb,$I["collation"]).doc_link(array('sql'=>"charset-charsets.html",'mariadb'=>"supported-character-sets-and-collations/",'mssql'=>"ms187963.aspx",)):""),script("focus(qs('#name'));"),'<input type="submit" value="',lang(14),'">
';if(DB!="")echo"<input type='submit' name='drop' value='".lang(127)."'>".confirm(lang(175,DB))."\n";elseif(!$_POST["add_x"]&&$_GET["db"]=="")echo"<input type='image' class='icon' name='add' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.7.7")."' alt='+' title='".lang(108)."'>\n";echo'<input type="hidden" name="token" value="',$ti,'">
</form>
';}elseif(isset($_GET["scheme"])){$I=$_POST;if($_POST&&!$n){$_=preg_replace('~ns=[^&]*&~','',ME)."ns=";if($_POST["drop"])query_redirect("DROP SCHEMA ".idf_escape($_GET["ns"]),$_,lang(188));else{$B=trim($I["name"]);$_.=urlencode($B);if($_GET["ns"]=="")query_redirect("CREATE SCHEMA ".idf_escape($B),$_,lang(189));elseif($_GET["ns"]!=$B)query_redirect("ALTER SCHEMA ".idf_escape($_GET["ns"])." RENAME TO ".idf_escape($B),$_,lang(190));else
redirect($_);}}page_header($_GET["ns"]!=""?lang(69):lang(70),$n);if(!$I)$I["name"]=$_GET["ns"];echo'
<form action="" method="post">
<p><input name="name" id="name" value="',h($I["name"]),'" autocapitalize="off">
',script("focus(qs('#name'));"),'<input type="submit" value="',lang(14),'">
';if($_GET["ns"]!="")echo"<input type='submit' name='drop' value='".lang(127)."'>".confirm(lang(175,$_GET["ns"]))."\n";echo'<input type="hidden" name="token" value="',$ti,'">
</form>
';}elseif(isset($_GET["call"])){$da=($_GET["name"]?$_GET["name"]:$_GET["call"]);page_header(lang(191).": ".h($da),$n);$Zg=routine($_GET["call"],(isset($_GET["callf"])?"FUNCTION":"PROCEDURE"));$Ld=array();$Of=array();foreach($Zg["fields"]as$s=>$o){if(substr($o["inout"],-3)=="OUT")$Of[$s]="@".idf_escape($o["field"])." AS ".idf_escape($o["field"]);if(!$o["inout"]||substr($o["inout"],0,2)=="IN")$Ld[]=$s;}if(!$n&&$_POST){$bb=array();foreach($Zg["fields"]as$y=>$o){if(in_array($y,$Ld)){$X=process_input($o);if($X===false)$X="''";if(isset($Of[$y]))$h->query("SET @".idf_escape($o["field"])." = $X");}$bb[]=(isset($Of[$y])?"@".idf_escape($o["field"]):$X);}$F=(isset($_GET["callf"])?"SELECT":"CALL")." ".table($da)."(".implode(", ",$bb).")";$Ih=microtime(true);$G=$h->multi_query($F);$_a=$h->affected_rows;echo$b->selectQuery($F,$Ih,!$G);if(!$G)echo"<p class='error'>".error()."\n";else{$i=connect();if(is_object($i))$i->select_db(DB);do{$G=$h->store_result();if(is_object($G))select($G,$i);else
echo"<p class='message'>".lang(192,$_a)." <span class='time'>".@date("H:i:s")."</span>\n";}while($h->next_result());if($Of)select($h->query("SELECT ".implode(", ",$Of)));}}echo'
<form action="" method="post">
';if($Ld){echo"<table cellspacing='0' class='layout'>\n";foreach($Ld
as$y){$o=$Zg["fields"][$y];$B=$o["field"];echo"<tr><th>".$b->fieldName($o);$Y=$_POST["fields"][$B];if($Y!=""){if($o["type"]=="enum")$Y=+$Y;if($o["type"]=="set")$Y=array_sum($Y);}input($o,$Y,(string)$_POST["function"][$B]);echo"\n";}echo"</table>\n";}echo'<p>
<input type="submit" value="',lang(191),'">
<input type="hidden" name="token" value="',$ti,'">
</form>
';}elseif(isset($_GET["foreign"])){$a=$_GET["foreign"];$B=$_GET["name"];$I=$_POST;if($_POST&&!$n&&!$_POST["add"]&&!$_POST["change"]&&!$_POST["change-js"]){$Qe=($_POST["drop"]?lang(193):($B!=""?lang(194):lang(195)));$Be=ME."table=".urlencode($a);if(!$_POST["drop"]){$I["source"]=array_filter($I["source"],'strlen');ksort($I["source"]);$ci=array();foreach($I["source"]as$y=>$X)$ci[$y]=$I["target"][$y];$I["target"]=$ci;}if($x=="sqlite")queries_redirect($Be,$Qe,recreate_table($a,$a,array(),array(),array(" $B"=>($_POST["drop"]?"":" ".format_foreign_key($I)))));else{$c="ALTER TABLE ".table($a);$jc="\nDROP ".($x=="sql"?"FOREIGN KEY ":"CONSTRAINT ").idf_escape($B);if($_POST["drop"])query_redirect($c.$jc,$Be,$Qe);else{query_redirect($c.($B!=""?"$jc,":"")."\nADD".format_foreign_key($I),$Be,$Qe);$n=lang(196)."<br>$n";}}}page_header(lang(197),$n,array("table"=>$a),h($a));if($_POST){ksort($I["source"]);if($_POST["add"])$I["source"][]="";elseif($_POST["change"]||$_POST["change-js"])$I["target"]=array();}elseif($B!=""){$id=foreign_keys($a);$I=$id[$B];$I["source"][]="";}else{$I["table"]=$a;$I["source"]=array("");}echo'
<form action="" method="post">
';$Ah=array_keys(fields($a));if($I["db"]!="")$h->select_db($I["db"]);if($I["ns"]!="")set_schema($I["ns"]);$Ig=array_keys(array_filter(table_status('',true),'fk_support'));$ci=($a===$I["table"]?$Ah:array_keys(fields(in_array($I["table"],$Ig)?$I["table"]:reset($Ig))));$wf="this.form['change-js'].value = '1'; this.form.submit();";echo"<p>".lang(198).": ".html_select("table",$Ig,$I["table"],$wf)."\n";if($x=="pgsql")echo
lang(78).": ".html_select("ns",$b->schemas(),$I["ns"]!=""?$I["ns"]:$_GET["ns"],$wf);elseif($x!="sqlite"){$Ub=array();foreach($b->databases()as$l){if(!information_schema($l))$Ub[]=$l;}echo
lang(77).": ".html_select("db",$Ub,$I["db"]!=""?$I["db"]:$_GET["db"],$wf);}echo'<input type="hidden" name="change-js" value="">
<noscript><p><input type="submit" name="change" value="',lang(199),'"></noscript>
<table cellspacing="0">
<thead><tr><th id="label-source">',lang(134),'<th id="label-target">',lang(135),'</thead>
';$ge=0;foreach($I["source"]as$y=>$X){echo"<tr>","<td>".html_select("source[".(+$y)."]",array(-1=>"")+$Ah,$X,($ge==count($I["source"])-1?"foreignAddRow.call(this);":1),"label-source"),"<td>".html_select("target[".(+$y)."]",$ci,$I["target"][$y],1,"label-target");$ge++;}echo'</table>
<p>
',lang(103),': ',html_select("on_delete",array(-1=>"")+explode("|",$vf),$I["on_delete"]),' ',lang(102),': ',html_select("on_update",array(-1=>"")+explode("|",$vf),$I["on_update"]),doc_link(array('sql'=>"innodb-foreign-key-constraints.html",'mariadb'=>"foreign-keys/",'pgsql'=>"sql-createtable.html#SQL-CREATETABLE-REFERENCES",'mssql'=>"ms174979.aspx",'oracle'=>"https://docs.oracle.com/cd/B19306_01/server.102/b14200/clauses002.htm#sthref2903",)),'<p>
<input type="submit" value="',lang(14),'">
<noscript><p><input type="submit" name="add" value="',lang(200),'"></noscript>
';if($B!=""){echo'<input type="submit" name="drop" value="',lang(127),'">',confirm(lang(175,$B));}echo'<input type="hidden" name="token" value="',$ti,'">
</form>
';}elseif(isset($_GET["view"])){$a=$_GET["view"];$I=$_POST;$Lf="VIEW";if($x=="pgsql"&&$a!=""){$O=table_status($a);$Lf=strtoupper($O["Engine"]);}if($_POST&&!$n){$B=trim($I["name"]);$Ha=" AS\n$I[select]";$Be=ME."table=".urlencode($B);$Qe=lang(201);$T=($_POST["materialized"]?"MATERIALIZED VIEW":"VIEW");if(!$_POST["drop"]&&$a==$B&&$x!="sqlite"&&$T=="VIEW"&&$Lf=="VIEW")query_redirect(($x=="mssql"?"ALTER":"CREATE OR REPLACE")." VIEW ".table($B).$Ha,$Be,$Qe);else{$ei=$B."_adminer_".uniqid();drop_create("DROP $Lf ".table($a),"CREATE $T ".table($B).$Ha,"DROP $T ".table($B),"CREATE $T ".table($ei).$Ha,"DROP $T ".table($ei),($_POST["drop"]?substr(ME,0,-1):$Be),lang(202),$Qe,lang(203),$a,$B);}}if(!$_POST&&$a!=""){$I=view($a);$I["name"]=$a;$I["materialized"]=($Lf!="VIEW");if(!$n)$n=error();}page_header(($a!=""?lang(44):lang(204)),$n,array("table"=>$a),h($a));echo'
<form action="" method="post">
<p>',lang(183),': <input name="name" value="',h($I["name"]),'" data-maxlength="64" autocapitalize="off">
',(support("materializedview")?" ".checkbox("materialized",1,$I["materialized"],lang(129)):""),'<p>';textarea("select",$I["select"]);echo'<p>
<input type="submit" value="',lang(14),'">
';if($a!=""){echo'<input type="submit" name="drop" value="',lang(127),'">',confirm(lang(175,$a));}echo'<input type="hidden" name="token" value="',$ti,'">
</form>
';}elseif(isset($_GET["event"])){$aa=$_GET["event"];$Yd=array("YEAR","QUARTER","MONTH","DAY","HOUR","MINUTE","WEEK","SECOND","YEAR_MONTH","DAY_HOUR","DAY_MINUTE","DAY_SECOND","HOUR_MINUTE","HOUR_SECOND","MINUTE_SECOND");$Kh=array("ENABLED"=>"ENABLE","DISABLED"=>"DISABLE","SLAVESIDE_DISABLED"=>"DISABLE ON SLAVE");$I=$_POST;if($_POST&&!$n){if($_POST["drop"])query_redirect("DROP EVENT ".idf_escape($aa),substr(ME,0,-1),lang(205));elseif(in_array($I["INTERVAL_FIELD"],$Yd)&&isset($Kh[$I["STATUS"]])){$eh="\nON SCHEDULE ".($I["INTERVAL_VALUE"]?"EVERY ".q($I["INTERVAL_VALUE"])." $I[INTERVAL_FIELD]".($I["STARTS"]?" STARTS ".q($I["STARTS"]):"").($I["ENDS"]?" ENDS ".q($I["ENDS"]):""):"AT ".q($I["STARTS"]))." ON COMPLETION".($I["ON_COMPLETION"]?"":" NOT")." PRESERVE";queries_redirect(substr(ME,0,-1),($aa!=""?lang(206):lang(207)),queries(($aa!=""?"ALTER EVENT ".idf_escape($aa).$eh.($aa!=$I["EVENT_NAME"]?"\nRENAME TO ".idf_escape($I["EVENT_NAME"]):""):"CREATE EVENT ".idf_escape($I["EVENT_NAME"]).$eh)."\n".$Kh[$I["STATUS"]]." COMMENT ".q($I["EVENT_COMMENT"]).rtrim(" DO\n$I[EVENT_DEFINITION]",";").";"));}}page_header(($aa!=""?lang(208).": ".h($aa):lang(209)),$n);if(!$I&&$aa!=""){$J=get_rows("SELECT * FROM information_schema.EVENTS WHERE EVENT_SCHEMA = ".q(DB)." AND EVENT_NAME = ".q($aa));$I=reset($J);}echo'
<form action="" method="post">
<table cellspacing="0" class="layout">
<tr><th>',lang(183),'<td><input name="EVENT_NAME" value="',h($I["EVENT_NAME"]),'" data-maxlength="64" autocapitalize="off">
<tr><th title="datetime">',lang(210),'<td><input name="STARTS" value="',h("$I[EXECUTE_AT]$I[STARTS]"),'">
<tr><th title="datetime">',lang(211),'<td><input name="ENDS" value="',h($I["ENDS"]),'">
<tr><th>',lang(212),'<td><input type="number" name="INTERVAL_VALUE" value="',h($I["INTERVAL_VALUE"]),'" class="size"> ',html_select("INTERVAL_FIELD",$Yd,$I["INTERVAL_FIELD"]),'<tr><th>',lang(118),'<td>',html_select("STATUS",$Kh,$I["STATUS"]),'<tr><th>',lang(51),'<td><input name="EVENT_COMMENT" value="',h($I["EVENT_COMMENT"]),'" data-maxlength="64">
<tr><th><td>',checkbox("ON_COMPLETION","PRESERVE",$I["ON_COMPLETION"]=="PRESERVE",lang(213)),'</table>
<p>';textarea("EVENT_DEFINITION",$I["EVENT_DEFINITION"]);echo'<p>
<input type="submit" value="',lang(14),'">
';if($aa!=""){echo'<input type="submit" name="drop" value="',lang(127),'">',confirm(lang(175,$aa));}echo'<input type="hidden" name="token" value="',$ti,'">
</form>
';}elseif(isset($_GET["procedure"])){$da=($_GET["name"]?$_GET["name"]:$_GET["procedure"]);$Zg=(isset($_GET["function"])?"FUNCTION":"PROCEDURE");$I=$_POST;$I["fields"]=(array)$I["fields"];if($_POST&&!process_fields($I["fields"])&&!$n){$If=routine($_GET["procedure"],$Zg);$ei="$I[name]_adminer_".uniqid();drop_create("DROP $Zg ".routine_id($da,$If),create_routine($Zg,$I),"DROP $Zg ".routine_id($I["name"],$I),create_routine($Zg,array("name"=>$ei)+$I),"DROP $Zg ".routine_id($ei,$I),substr(ME,0,-1),lang(214),lang(215),lang(216),$da,$I["name"]);}page_header(($da!=""?(isset($_GET["function"])?lang(217):lang(218)).": ".h($da):(isset($_GET["function"])?lang(219):lang(220))),$n);if(!$_POST&&$da!=""){$I=routine($_GET["procedure"],$Zg);$I["name"]=$da;}$qb=get_vals("SHOW CHARACTER SET");sort($qb);$ah=routine_languages();echo'
<form action="" method="post" id="form">
<p>',lang(183),': <input name="name" value="',h($I["name"]),'" data-maxlength="64" autocapitalize="off">
',($ah?lang(19).": ".html_select("language",$ah,$I["language"])."\n":""),'<input type="submit" value="',lang(14),'">
<div class="scrollable">
<table cellspacing="0" class="nowrap">
';edit_fields($I["fields"],$qb,$Zg);if(isset($_GET["function"])){echo"<tr><td>".lang(221);edit_type("returns",$I["returns"],$qb,array(),($x=="pgsql"?array("void","trigger"):array()));}echo'</table>
',script("editFields();"),'</div>
<p>';textarea("definition",$I["definition"]);echo'<p>
<input type="submit" value="',lang(14),'">
';if($da!=""){echo'<input type="submit" name="drop" value="',lang(127),'">',confirm(lang(175,$da));}echo'<input type="hidden" name="token" value="',$ti,'">
</form>
';}elseif(isset($_GET["sequence"])){$fa=$_GET["sequence"];$I=$_POST;if($_POST&&!$n){$_=substr(ME,0,-1);$B=trim($I["name"]);if($_POST["drop"])query_redirect("DROP SEQUENCE ".idf_escape($fa),$_,lang(222));elseif($fa=="")query_redirect("CREATE SEQUENCE ".idf_escape($B),$_,lang(223));elseif($fa!=$B)query_redirect("ALTER SEQUENCE ".idf_escape($fa)." RENAME TO ".idf_escape($B),$_,lang(224));else
redirect($_);}page_header($fa!=""?lang(225).": ".h($fa):lang(226),$n);if(!$I)$I["name"]=$fa;echo'
<form action="" method="post">
<p><input name="name" value="',h($I["name"]),'" autocapitalize="off">
<input type="submit" value="',lang(14),'">
';if($fa!="")echo"<input type='submit' name='drop' value='".lang(127)."'>".confirm(lang(175,$fa))."\n";echo'<input type="hidden" name="token" value="',$ti,'">
</form>
';}elseif(isset($_GET["type"])){$ga=$_GET["type"];$I=$_POST;if($_POST&&!$n){$_=substr(ME,0,-1);if($_POST["drop"])query_redirect("DROP TYPE ".idf_escape($ga),$_,lang(227));else
query_redirect("CREATE TYPE ".idf_escape(trim($I["name"]))." $I[as]",$_,lang(228));}page_header($ga!=""?lang(229).": ".h($ga):lang(230),$n);if(!$I)$I["as"]="AS ";echo'
<form action="" method="post">
<p>
';if($ga!="")echo"<input type='submit' name='drop' value='".lang(127)."'>".confirm(lang(175,$ga))."\n";else{echo"<input name='name' value='".h($I['name'])."' autocapitalize='off'>\n";textarea("as",$I["as"]);echo"<p><input type='submit' value='".lang(14)."'>\n";}echo'<input type="hidden" name="token" value="',$ti,'">
</form>
';}elseif(isset($_GET["trigger"])){$a=$_GET["trigger"];$B=$_GET["name"];$Di=trigger_options();$I=(array)trigger($B)+array("Trigger"=>$a."_bi");if($_POST){if(!$n&&in_array($_POST["Timing"],$Di["Timing"])&&in_array($_POST["Event"],$Di["Event"])&&in_array($_POST["Type"],$Di["Type"])){$uf=" ON ".table($a);$jc="DROP TRIGGER ".idf_escape($B).($x=="pgsql"?$uf:"");$Be=ME."table=".urlencode($a);if($_POST["drop"])query_redirect($jc,$Be,lang(231));else{if($B!="")queries($jc);queries_redirect($Be,($B!=""?lang(232):lang(233)),queries(create_trigger($uf,$_POST)));if($B!="")queries(create_trigger($uf,$I+array("Type"=>reset($Di["Type"]))));}}$I=$_POST;}page_header(($B!=""?lang(234).": ".h($B):lang(235)),$n,array("table"=>$a));echo'
<form action="" method="post" id="form">
<table cellspacing="0" class="layout">
<tr><th>',lang(236),'<td>',html_select("Timing",$Di["Timing"],$I["Timing"],"triggerChange(/^".preg_quote($a,"/")."_[ba][iud]$/, '".js_escape($a)."', this.form);"),'<tr><th>',lang(237),'<td>',html_select("Event",$Di["Event"],$I["Event"],"this.form['Timing'].onchange();"),(in_array("UPDATE OF",$Di["Event"])?" <input name='Of' value='".h($I["Of"])."' class='hidden'>":""),'<tr><th>',lang(50),'<td>',html_select("Type",$Di["Type"],$I["Type"]),'</table>
<p>',lang(183),': <input name="Trigger" value="',h($I["Trigger"]),'" data-maxlength="64" autocapitalize="off">
',script("qs('#form')['Timing'].onchange();"),'<p>';textarea("Statement",$I["Statement"]);echo'<p>
<input type="submit" value="',lang(14),'">
';if($B!=""){echo'<input type="submit" name="drop" value="',lang(127),'">',confirm(lang(175,$B));}echo'<input type="hidden" name="token" value="',$ti,'">
</form>
';}elseif(isset($_GET["user"])){$ha=$_GET["user"];$ug=array(""=>array("All privileges"=>""));foreach(get_rows("SHOW PRIVILEGES")as$I){foreach(explode(",",($I["Privilege"]=="Grant option"?"":$I["Context"]))as$Db)$ug[$Db][$I["Privilege"]]=$I["Comment"];}$ug["Server Admin"]+=$ug["File access on server"];$ug["Databases"]["Create routine"]=$ug["Procedures"]["Create routine"];unset($ug["Procedures"]["Create routine"]);$ug["Columns"]=array();foreach(array("Select","Insert","Update","References")as$X)$ug["Columns"][$X]=$ug["Tables"][$X];unset($ug["Server Admin"]["Usage"]);foreach($ug["Tables"]as$y=>$X)unset($ug["Databases"][$y]);$df=array();if($_POST){foreach($_POST["objects"]as$y=>$X)$df[$X]=(array)$df[$X]+(array)$_POST["grants"][$y];}$qd=array();$sf="";if(isset($_GET["host"])&&($G=$h->query("SHOW GRANTS FOR ".q($ha)."@".q($_GET["host"])))){while($I=$G->fetch_row()){if(preg_match('~GRANT (.*) ON (.*) TO ~',$I[0],$A)&&preg_match_all('~ *([^(,]*[^ ,(])( *\([^)]+\))?~',$A[1],$Ie,PREG_SET_ORDER)){foreach($Ie
as$X){if($X[1]!="USAGE")$qd["$A[2]$X[2]"][$X[1]]=true;if(preg_match('~ WITH GRANT OPTION~',$I[0]))$qd["$A[2]$X[2]"]["GRANT OPTION"]=true;}}if(preg_match("~ IDENTIFIED BY PASSWORD '([^']+)~",$I[0],$A))$sf=$A[1];}}if($_POST&&!$n){$tf=(isset($_GET["host"])?q($ha)."@".q($_GET["host"]):"''");if($_POST["drop"])query_redirect("DROP USER $tf",ME."privileges=",lang(238));else{$ff=q($_POST["user"])."@".q($_POST["host"]);$cg=$_POST["pass"];if($cg!=''&&!$_POST["hashed"]&&!min_version(8)){$cg=$h->result("SELECT PASSWORD(".q($cg).")");$n=!$cg;}$Jb=false;if(!$n){if($tf!=$ff){$Jb=queries((min_version(5)?"CREATE USER":"GRANT USAGE ON *.* TO")." $ff IDENTIFIED BY ".(min_version(8)?"":"PASSWORD ").q($cg));$n=!$Jb;}elseif($cg!=$sf)queries("SET PASSWORD FOR $ff = ".q($cg));}if(!$n){$Wg=array();foreach($df
as$nf=>$pd){if(isset($_GET["grant"]))$pd=array_filter($pd);$pd=array_keys($pd);if(isset($_GET["grant"]))$Wg=array_diff(array_keys(array_filter($df[$nf],'strlen')),$pd);elseif($tf==$ff){$qf=array_keys((array)$qd[$nf]);$Wg=array_diff($qf,$pd);$pd=array_diff($pd,$qf);unset($qd[$nf]);}if(preg_match('~^(.+)\s*(\(.*\))?$~U',$nf,$A)&&(!grant("REVOKE",$Wg,$A[2]," ON $A[1] FROM $ff")||!grant("GRANT",$pd,$A[2]," ON $A[1] TO $ff"))){$n=true;break;}}}if(!$n&&isset($_GET["host"])){if($tf!=$ff)queries("DROP USER $tf");elseif(!isset($_GET["grant"])){foreach($qd
as$nf=>$Wg){if(preg_match('~^(.+)(\(.*\))?$~U',$nf,$A))grant("REVOKE",array_keys($Wg),$A[2]," ON $A[1] FROM $ff");}}}queries_redirect(ME."privileges=",(isset($_GET["host"])?lang(239):lang(240)),!$n);if($Jb)$h->query("DROP USER $ff");}}page_header((isset($_GET["host"])?lang(36).": ".h("$ha@$_GET[host]"):lang(146)),$n,array("privileges"=>array('',lang(72))));if($_POST){$I=$_POST;$qd=$df;}else{$I=$_GET+array("host"=>$h->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', -1)"));$I["pass"]=$sf;if($sf!="")$I["hashed"]=true;$qd[(DB==""||$qd?"":idf_escape(addcslashes(DB,"%_\\"))).".*"]=array();}echo'<form action="" method="post">
<table cellspacing="0" class="layout">
<tr><th>',lang(35),'<td><input name="host" data-maxlength="60" value="',h($I["host"]),'" autocapitalize="off">
<tr><th>',lang(36),'<td><input name="user" data-maxlength="80" value="',h($I["user"]),'" autocapitalize="off">
<tr><th>',lang(37),'<td><input name="pass" id="pass" value="',h($I["pass"]),'" autocomplete="new-password">
';if(!$I["hashed"])echo
script("typePassword(qs('#pass'));");echo(min_version(8)?"":checkbox("hashed",1,$I["hashed"],lang(241),"typePassword(this.form['pass'], this.checked);")),'</table>

';echo"<table cellspacing='0'>\n","<thead><tr><th colspan='2'>".lang(72).doc_link(array('sql'=>"grant.html#priv_level"));$s=0;foreach($qd
as$nf=>$pd){echo'<th>'.($nf!="*.*"?"<input name='objects[$s]' value='".h($nf)."' size='10' autocapitalize='off'>":"<input type='hidden' name='objects[$s]' value='*.*' size='10'>*.*");$s++;}echo"</thead>\n";foreach(array(""=>"","Server Admin"=>lang(35),"Databases"=>lang(38),"Tables"=>lang(131),"Columns"=>lang(49),"Procedures"=>lang(242),)as$Db=>$bc){foreach((array)$ug[$Db]as$tg=>$vb){echo"<tr".odd()."><td".($bc?">$bc<td":" colspan='2'").' lang="en" title="'.h($vb).'">'.h($tg);$s=0;foreach($qd
as$nf=>$pd){$B="'grants[$s][".h(strtoupper($tg))."]'";$Y=$pd[strtoupper($tg)];if($Db=="Server Admin"&&$nf!=(isset($qd["*.*"])?"*.*":".*"))echo"<td>";elseif(isset($_GET["grant"]))echo"<td><select name=$B><option><option value='1'".($Y?" selected":"").">".lang(243)."<option value='0'".($Y=="0"?" selected":"").">".lang(244)."</select>";else{echo"<td align='center'><label class='block'>","<input type='checkbox' name=$B value='1'".($Y?" checked":"").($tg=="All privileges"?" id='grants-$s-all'>":">".($tg=="Grant option"?"":script("qsl('input').onclick = function () { if (this.checked) formUncheck('grants-$s-all'); };"))),"</label>";}$s++;}}}echo"</table>\n",'<p>
<input type="submit" value="',lang(14),'">
';if(isset($_GET["host"])){echo'<input type="submit" name="drop" value="',lang(127),'">',confirm(lang(175,"$ha@$_GET[host]"));}echo'<input type="hidden" name="token" value="',$ti,'">
</form>
';}elseif(isset($_GET["processlist"])){if(support("kill")&&$_POST&&!$n){$ne=0;foreach((array)$_POST["kill"]as$X){if(kill_process($X))$ne++;}queries_redirect(ME."processlist=",lang(245,$ne),$ne||!$_POST["kill"]);}page_header(lang(116),$n);echo'
<form action="" method="post">
<div class="scrollable">
<table cellspacing="0" class="nowrap checkable">
',script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});");$s=-1;foreach(process_list()as$s=>$I){if(!$s){echo"<thead><tr lang='en'>".(support("kill")?"<th>":"");foreach($I
as$y=>$X)echo"<th>$y".doc_link(array('sql'=>"show-processlist.html#processlist_".strtolower($y),'pgsql'=>"monitoring-stats.html#PG-STAT-ACTIVITY-VIEW",'oracle'=>"REFRN30223",));echo"</thead>\n";}echo"<tr".odd().">".(support("kill")?"<td>".checkbox("kill[]",$I[$x=="sql"?"Id":"pid"],0):"");foreach($I
as$y=>$X)echo"<td>".(($x=="sql"&&$y=="Info"&&preg_match("~Query|Killed~",$I["Command"])&&$X!="")||($x=="pgsql"&&$y=="current_query"&&$X!="<IDLE>")||($x=="oracle"&&$y=="sql_text"&&$X!="")?"<code class='jush-$x'>".shorten_utf8($X,100,"</code>").' <a href="'.h(ME.($I["db"]!=""?"db=".urlencode($I["db"])."&":"")."sql=".urlencode($X)).'">'.lang(246).'</a>':h($X));echo"\n";}echo'</table>
</div>
<p>
';if(support("kill")){echo($s+1)."/".lang(247,max_connections()),"<p><input type='submit' value='".lang(248)."'>\n";}echo'<input type="hidden" name="token" value="',$ti,'">
</form>
',script("tableCheck();");}elseif(isset($_GET["select"])){$a=$_GET["select"];$R=table_status1($a);$w=indexes($a);$p=fields($a);$id=column_foreign_keys($a);$pf=$R["Oid"];parse_str($_COOKIE["adminer_import"],$za);$Xg=array();$f=array();$ii=null;foreach($p
as$y=>$o){$B=$b->fieldName($o);if(isset($o["privileges"]["select"])&&$B!=""){$f[$y]=html_entity_decode(strip_tags($B),ENT_QUOTES);if(is_shortable($o))$ii=$b->selectLengthProcess();}$Xg+=$o["privileges"];}list($K,$rd)=$b->selectColumnsProcess($f,$w);$ce=count($rd)<count($K);$Z=$b->selectSearchProcess($p,$w);$Ef=$b->selectOrderProcess($p,$w);$z=$b->selectLimitProcess();if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$Ki=>$I){$Ha=convert_field($p[key($I)]);$K=array($Ha?$Ha:idf_escape(key($I)));$Z[]=where_check($Ki,$p);$H=$m->select($a,$K,$Z,$K);if($H)echo
reset($H->fetch_row());}exit;}$pg=$Mi=null;foreach($w
as$v){if($v["type"]=="PRIMARY"){$pg=array_flip($v["columns"]);$Mi=($K?$pg:array());foreach($Mi
as$y=>$X){if(in_array(idf_escape($y),$K))unset($Mi[$y]);}break;}}if($pf&&!$pg){$pg=$Mi=array($pf=>0);$w[]=array("type"=>"PRIMARY","columns"=>array($pf));}if($_POST&&!$n){$oj=$Z;if(!$_POST["all"]&&is_array($_POST["check"])){$hb=array();foreach($_POST["check"]as$eb)$hb[]=where_check($eb,$p);$oj[]="((".implode(") OR (",$hb)."))";}$oj=($oj?"\nWHERE ".implode(" AND ",$oj):"");if($_POST["export"]){cookie("adminer_import","output=".urlencode($_POST["output"])."&format=".urlencode($_POST["format"]));dump_headers($a);$b->dumpTable($a,"");$nd=($K?implode(", ",$K):"*").convert_fields($f,$p,$K)."\nFROM ".table($a);$td=($rd&&$ce?"\nGROUP BY ".implode(", ",$rd):"").($Ef?"\nORDER BY ".implode(", ",$Ef):"");if(!is_array($_POST["check"])||$pg)$F="SELECT $nd$oj$td";else{$Ii=array();foreach($_POST["check"]as$X)$Ii[]="(SELECT".limit($nd,"\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p).$td,1).")";$F=implode(" UNION ALL ",$Ii);}$b->dumpData($a,"table",$F);exit;}if(!$b->selectEmailProcess($Z,$id)){if($_POST["save"]||$_POST["delete"]){$G=true;$_a=0;$N=array();if(!$_POST["delete"]){foreach($f
as$B=>$X){$X=process_input($p[$B]);if($X!==null&&($_POST["clone"]||$X!==false))$N[idf_escape($B)]=($X!==false?$X:idf_escape($B));}}if($_POST["delete"]||$N){if($_POST["clone"])$F="INTO ".table($a)." (".implode(", ",array_keys($N)).")\nSELECT ".implode(", ",$N)."\nFROM ".table($a);if($_POST["all"]||($pg&&is_array($_POST["check"]))||$ce){$G=($_POST["delete"]?$m->delete($a,$oj):($_POST["clone"]?queries("INSERT $F$oj"):$m->update($a,$N,$oj)));$_a=$h->affected_rows;}else{foreach((array)$_POST["check"]as$X){$kj="\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p);$G=($_POST["delete"]?$m->delete($a,$kj,1):($_POST["clone"]?queries("INSERT".limit1($a,$F,$kj)):$m->update($a,$N,$kj,1)));if(!$G)break;$_a+=$h->affected_rows;}}}$Qe=lang(249,$_a);if($_POST["clone"]&&$G&&$_a==1){$te=last_id();if($te)$Qe=lang(168," $te");}queries_redirect(remove_from_uri($_POST["all"]&&$_POST["delete"]?"page":""),$Qe,$G);if(!$_POST["delete"]){edit_form($a,$p,(array)$_POST["fields"],!$_POST["clone"]);page_footer();exit;}}elseif(!$_POST["import"]){if(!$_POST["val"])$n=lang(250);else{$G=true;$_a=0;foreach($_POST["val"]as$Ki=>$I){$N=array();foreach($I
as$y=>$X){$y=bracket_escape($y,1);$N[idf_escape($y)]=(preg_match('~char|text~',$p[$y]["type"])||$X!=""?$b->processInput($p[$y],$X):"NULL");}$G=$m->update($a,$N," WHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($Ki,$p),!$ce&&!$pg," ");if(!$G)break;$_a+=$h->affected_rows;}queries_redirect(remove_from_uri(),lang(249,$_a),$G);}}elseif(!is_string($Xc=get_file("csv_file",true)))$n=upload_error($Xc);elseif(!preg_match('~~u',$Xc))$n=lang(251);else{cookie("adminer_import","output=".urlencode($za["output"])."&format=".urlencode($_POST["separator"]));$G=true;$sb=array_keys($p);preg_match_all('~(?>"[^"]*"|[^"\r\n]+)+~',$Xc,$Ie);$_a=count($Ie[0]);$m->begin();$L=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));$J=array();foreach($Ie[0]as$y=>$X){preg_match_all("~((?>\"[^\"]*\")+|[^$L]*)$L~",$X.$L,$Je);if(!$y&&!array_diff($Je[1],$sb)){$sb=$Je[1];$_a--;}else{$N=array();foreach($Je[1]as$s=>$ob)$N[idf_escape($sb[$s])]=($ob==""&&$p[$sb[$s]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$ob))));$J[]=$N;}}$G=(!$J||$m->insertUpdate($a,$J,$pg));if($G)$G=$m->commit();queries_redirect(remove_from_uri("page"),lang(252,$_a),$G);$m->rollback();}}}$Uh=$b->tableName($R);if(is_ajax()){page_headers();ob_start();}else
page_header(lang(54).": $Uh",$n);$N=null;if(isset($Xg["insert"])||!support("table")){$N="";foreach((array)$_GET["where"]as$X){if($id[$X["col"]]&&count($id[$X["col"]])==1&&($X["op"]=="="||(!$X["op"]&&!preg_match('~[_%]~',$X["val"]))))$N.="&set".urlencode("[".bracket_escape($X["col"])."]")."=".urlencode($X["val"]);}}$b->selectLinks($R,$N);if(!$f&&support("table"))echo"<p class='error'>".lang(253).($p?".":": ".error())."\n";else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($a).'">',"</div>\n";$b->selectColumnsPrint($K,$f);$b->selectSearchPrint($Z,$f,$w);$b->selectOrderPrint($Ef,$f,$w);$b->selectLimitPrint($z);$b->selectLengthPrint($ii);$b->selectActionPrint($w);echo"</form>\n";$D=$_GET["page"];if($D=="last"){$ld=$h->result(count_rows($a,$Z,$ce,$rd));$D=floor(max(0,$ld-1)/$z);}$jh=$K;$sd=$rd;if(!$jh){$jh[]="*";$Eb=convert_fields($f,$p,$K);if($Eb)$jh[]=substr($Eb,2);}foreach($K
as$y=>$X){$o=$p[idf_unescape($X)];if($o&&($Ha=convert_field($o)))$jh[$y]="$Ha AS $X";}if(!$ce&&$Mi){foreach($Mi
as$y=>$X){$jh[]=idf_escape($y);if($sd)$sd[]=idf_escape($y);}}$G=$m->select($a,$jh,$Z,$sd,$Ef,$z,$D,true);if(!$G)echo"<p class='error'>".error()."\n";else{if($x=="mssql"&&$D)$G->seek($z*$D);$wc=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$J=array();while($I=$G->fetch_assoc()){if($D&&$x=="oracle")unset($I["RNUM"]);$J[]=$I;}if($_GET["page"]!="last"&&$z!=""&&$rd&&$ce&&$x=="sql")$ld=$h->result(" SELECT FOUND_ROWS()");if(!$J)echo"<p class='message'>".lang(12)."\n";else{$Ra=$b->backwardKeys($a,$Uh);echo"<div class='scrollable'>","<table id='table' cellspacing='0' class='nowrap checkable'>",script("mixin(qs('#table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true), onkeydown: editingKeydown});"),"<thead><tr>".(!$rd&&$K?"":"<td><input type='checkbox' id='all-page' class='jsonly'>".script("qs('#all-page').onclick = partial(formCheck, /check/);","")." <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."'>".lang(254)."</a>");$cf=array();$od=array();reset($K);$Dg=1;foreach($J[0]as$y=>$X){if(!isset($Mi[$y])){$X=$_GET["columns"][key($K)];$o=$p[$K?($X?$X["col"]:current($K)):$y];$B=($o?$b->fieldName($o,$Dg):($X["fun"]?"*":$y));if($B!=""){$Dg++;$cf[$y]=$B;$e=idf_escape($y);$Fd=remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($y);$bc="&desc%5B0%5D=1";echo"<th>".script("mixin(qsl('th'), {onmouseover: partial(columnMouse), onmouseout: partial(columnMouse, ' hidden')});",""),'<a href="'.h($Fd.($Ef[0]==$e||$Ef[0]==$y||(!$Ef&&$ce&&$rd[0]==$e)?$bc:'')).'">';echo
apply_sql_function($X["fun"],$B)."</a>";echo"<span class='column hidden'>","<a href='".h($Fd.$bc)."' title='".lang(60)."' class='text'> â</a>";if(!$X["fun"]){echo'<a href="#fieldset-search" title="'.lang(57).'" class="text jsonly"> =</a>',script("qsl('a').onclick = partial(selectSearch, '".js_escape($y)."');");}echo"</span>";}$od[$y]=$X["fun"];next($K);}}$ze=array();if($_GET["modify"]){foreach($J
as$I){foreach($I
as$y=>$X)$ze[$y]=max($ze[$y],min(40,strlen(utf8_decode($X))));}}echo($Ra?"<th>".lang(255):"")."</thead>\n";if(is_ajax()){if($z%2==1&&$D%2==1)odd();ob_end_clean();}foreach($b->rowDescriptions($J,$id)as$bf=>$I){$Ji=unique_array($J[$bf],$w);if(!$Ji){$Ji=array();foreach($J[$bf]as$y=>$X){if(!preg_match('~^(COUNT\((\*|(DISTINCT )?`(?:[^`]|``)+`)\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\(`(?:[^`]|``)+`\))$~',$y))$Ji[$y]=$X;}}$Ki="";foreach($Ji
as$y=>$X){if(($x=="sql"||$x=="pgsql")&&preg_match('~char|text|enum|set~',$p[$y]["type"])&&strlen($X)>64){$y=(strpos($y,'(')?$y:idf_escape($y));$y="MD5(".($x!='sql'||preg_match("~^utf8~",$p[$y]["collation"])?$y:"CONVERT($y USING ".charset($h).")").")";$X=md5($X);}$Ki.="&".($X!==null?urlencode("where[".bracket_escape($y)."]")."=".urlencode($X):"null%5B%5D=".urlencode($y));}echo"<tr".odd().">".(!$rd&&$K?"":"<td>".checkbox("check[]",substr($Ki,1),in_array(substr($Ki,1),(array)$_POST["check"])).($ce||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$Ki)."' class='edit'>".lang(256)."</a>"));foreach($I
as$y=>$X){if(isset($cf[$y])){$o=$p[$y];$X=$m->value($X,$o);if($X!=""&&(!isset($wc[$y])||$wc[$y]!=""))$wc[$y]=(is_mail($X)?$cf[$y]:"");$_="";if(preg_match('~blob|bytea|raw|file~',$o["type"])&&$X!="")$_=ME.'download='.urlencode($a).'&field='.urlencode($y).$Ki;if(!$_&&$X!==null){foreach((array)$id[$y]as$q){if(count($id[$y])==1||end($q["source"])==$y){$_="";foreach($q["source"]as$s=>$Ah)$_.=where_link($s,$q["target"][$s],$J[$bf][$Ah]);$_=($q["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\1'.urlencode($q["db"]),ME):ME).'select='.urlencode($q["table"]).$_;if($q["ns"])$_=preg_replace('~([?&]ns=)[^&]+~','\1'.urlencode($q["ns"]),$_);if(count($q["source"])==1)break;}}}if($y=="COUNT(*)"){$_=ME."select=".urlencode($a);$s=0;foreach((array)$_GET["where"]as$W){if(!array_key_exists($W["col"],$Ji))$_.=where_link($s++,$W["col"],$W["val"],$W["op"]);}foreach($Ji
as$he=>$W)$_.=where_link($s++,$he,$W);}$X=select_value($X,$_,$o,$ii);$t=h("val[$Ki][".bracket_escape($y)."]");$Y=$_POST["val"][$Ki][bracket_escape($y)];$rc=!is_array($I[$y])&&is_utf8($X)&&$J[$bf][$y]==$I[$y]&&!$od[$y];$hi=preg_match('~text|lob~',$o["type"]);echo"<td id='$t'";if(($_GET["modify"]&&$rc)||$Y!==null){$wd=h($Y!==null?$Y:$I[$y]);echo">".($hi?"<textarea name='$t' cols='30' rows='".(substr_count($I[$y],"\n")+1)."'>$wd</textarea>":"<input name='$t' value='$wd' size='$ze[$y]'>");}else{$De=strpos($X,"<i>â¦</i>");echo" data-text='".($De?2:($hi?1:0))."'".($rc?"":" data-warning='".h(lang(257))."'").">$X</td>";}}}if($Ra)echo"<td>";$b->backwardKeysPrint($Ra,$J[$bf]);echo"</tr>\n";}if(is_ajax())exit;echo"</table>\n","</div>\n";}if(!is_ajax()){if($J||$D){$Fc=true;if($_GET["page"]!="last"){if($z==""||(count($J)<$z&&($J||!$D)))$ld=($D?$D*$z:0)+count($J);elseif($x!="sql"||!$ce){$ld=($ce?false:found_rows($R,$Z));if($ld<max(1e4,2*($D+1)*$z))$ld=reset(slow_query(count_rows($a,$Z,$ce,$rd)));else$Fc=false;}}$Rf=($z!=""&&($ld===false||$ld>$z||$D));if($Rf){echo(($ld===false?count($J)+1:$ld-$D*$z)>$z?'<p><a href="'.h(remove_from_uri("page")."&page=".($D+1)).'" class="loadmore">'.lang(258).'</a>'.script("qsl('a').onclick = partial(selectLoadMore, ".(+$z).", '".lang(259)."â¦');",""):''),"\n";}}echo"<div class='footer'><div>\n";if($J||$D){if($Rf){$Le=($ld===false?$D+(count($J)>=$z?2:1):floor(($ld-1)/$z));echo"<fieldset>";if($x!="simpledb"){echo"<legend><a href='".h(remove_from_uri("page"))."'>".lang(260)."</a></legend>",script("qsl('a').onclick = function () { pageClick(this.href, +prompt('".lang(260)."', '".($D+1)."')); return false; };"),pagination(0,$D).($D>5?" â¦":"");for($s=max(1,$D-4);$s<min($Le,$D+5);$s++)echo
pagination($s,$D);if($Le>0){echo($D+5<$Le?" â¦":""),($Fc&&$ld!==false?pagination($Le,$D):" <a href='".h(remove_from_uri("page")."&page=last")."' title='~$Le'>".lang(261)."</a>");}}else{echo"<legend>".lang(260)."</legend>",pagination(0,$D).($D>1?" â¦":""),($D?pagination($D,$D):""),($Le>$D?pagination($D+1,$D).($Le>$D+1?" â¦":""):"");}echo"</fieldset>\n";}echo"<fieldset>","<legend>".lang(262)."</legend>";$gc=($Fc?"":"~ ").$ld;echo
checkbox("all",1,0,($ld!==false?($Fc?"":"~ ").lang(150,$ld):""),"var checked = formChecked(this, /check/); selectCount('selected', this.checked ? '$gc' : checked); selectCount('selected2', this.checked || !checked ? '$gc' : checked);")."\n","</fieldset>\n";if($b->selectCommandPrint()){echo'<fieldset',($_GET["modify"]?'':' class="jsonly"'),'><legend>',lang(254),'</legend><div>
<input type="submit" value="',lang(14),'"',($_GET["modify"]?'':' title="'.lang(250).'"'),'>
</div></fieldset>
<fieldset><legend>',lang(126),' <span id="selected"></span></legend><div>
<input type="submit" name="edit" value="',lang(10),'">
<input type="submit" name="clone" value="',lang(246),'">
<input type="submit" name="delete" value="',lang(18),'">',confirm(),'</div></fieldset>
';}$jd=$b->dumpFormat();foreach((array)$_GET["columns"]as$e){if($e["fun"]){unset($jd['sql']);break;}}if($jd){print_fieldset("export",lang(74)." <span id='selected2'></span>");$Pf=$b->dumpOutput();echo($Pf?html_select("output",$Pf,$za["output"])." ":""),html_select("format",$jd,$za["format"])," <input type='submit' name='export' value='".lang(74)."'>\n","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($wc,'strlen'),$f);}echo"</div></div>\n";if($b->selectImportPrint()){echo"<div>","<a href='#import'>".lang(73)."</a>",script("qsl('a').onclick = partial(toggle, 'import');",""),"<span id='import' class='hidden'>: ","<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$za["format"],1);echo" <input type='submit' name='import' value='".lang(73)."'>","</span>","</div>";}echo"<input type='hidden' name='token' value='$ti'>\n","</form>\n",(!$rd&&$K?"":script("tableCheck();"));}}}if(is_ajax()){ob_end_clean();exit;}}elseif(isset($_GET["variables"])){$O=isset($_GET["status"]);page_header($O?lang(118):lang(117));$bj=($O?show_status():show_variables());if(!$bj)echo"<p class='message'>".lang(12)."\n";else{echo"<table cellspacing='0'>\n";foreach($bj
as$y=>$X){echo"<tr>","<th><code class='jush-".$x.($O?"status":"set")."'>".h($y)."</code>","<td>".h($X);}echo"</table>\n";}}elseif(isset($_GET["script"])){header("Content-Type: text/javascript; charset=utf-8");if($_GET["script"]=="db"){$Rh=array("Data_length"=>0,"Index_length"=>0,"Data_free"=>0);foreach(table_status()as$B=>$R){json_row("Comment-$B",h($R["Comment"]));if(!is_view($R)){foreach(array("Engine","Collation")as$y)json_row("$y-$B",h($R[$y]));foreach($Rh+array("Auto_increment"=>0,"Rows"=>0)as$y=>$X){if($R[$y]!=""){$X=format_number($R[$y]);json_row("$y-$B",($y=="Rows"&&$X&&$R["Engine"]==($Dh=="pgsql"?"table":"InnoDB")?"~ $X":$X));if(isset($Rh[$y]))$Rh[$y]+=($R["Engine"]!="InnoDB"||$y!="Data_free"?$R[$y]:0);}elseif(array_key_exists($y,$R))json_row("$y-$B");}}}foreach($Rh
as$y=>$X)json_row("sum-$y",format_number($X));json_row("");}elseif($_GET["script"]=="kill")$h->query("KILL ".number($_POST["kill"]));else{foreach(count_tables($b->databases())as$l=>$X){json_row("tables-$l",$X);json_row("size-$l",db_size($l));}json_row("");}exit;}else{$ai=array_merge((array)$_POST["tables"],(array)$_POST["views"]);if($ai&&!$n&&!$_POST["search"]){$G=true;$Qe="";if($x=="sql"&&$_POST["tables"]&&count($_POST["tables"])>1&&($_POST["drop"]||$_POST["truncate"]||$_POST["copy"]))queries("SET foreign_key_checks = 0");if($_POST["truncate"]){if($_POST["tables"])$G=truncate_tables($_POST["tables"]);$Qe=lang(263);}elseif($_POST["move"]){$G=move_tables((array)$_POST["tables"],(array)$_POST["views"],$_POST["target"]);$Qe=lang(264);}elseif($_POST["copy"]){$G=copy_tables((array)$_POST["tables"],(array)$_POST["views"],$_POST["target"]);$Qe=lang(265);}elseif($_POST["drop"]){if($_POST["views"])$G=drop_views($_POST["views"]);if($G&&$_POST["tables"])$G=drop_tables($_POST["tables"]);$Qe=lang(266);}elseif($x!="sql"){$G=($x=="sqlite"?queries("VACUUM"):apply_queries("VACUUM".($_POST["optimize"]?"":" ANALYZE"),$_POST["tables"]));$Qe=lang(267);}elseif(!$_POST["tables"])$Qe=lang(9);elseif($G=queries(($_POST["optimize"]?"OPTIMIZE":($_POST["check"]?"CHECK":($_POST["repair"]?"REPAIR":"ANALYZE")))." TABLE ".implode(", ",array_map('idf_escape',$_POST["tables"])))){while($I=$G->fetch_assoc())$Qe.="<b>".h($I["Table"])."</b>: ".h($I["Msg_text"])."<br>";}queries_redirect(substr(ME,0,-1),$Qe,$G);}page_header(($_GET["ns"]==""?lang(38).": ".h(DB):lang(78).": ".h($_GET["ns"])),$n,true);if($b->homepage()){if($_GET["ns"]!==""){echo"<h3 id='tables-views'>".lang(268)."</h3>\n";$Zh=tables_list();if(!$Zh)echo"<p class='message'>".lang(9)."\n";else{echo"<form action='' method='post'>\n";if(support("table")){echo"<fieldset><legend>".lang(269)." <span id='selected2'></span></legend><div>","<input type='search' name='query' value='".h($_POST["query"])."'>",script("qsl('input').onkeydown = partialArg(bodyKeydown, 'search');","")," <input type='submit' name='search' value='".lang(57)."'>\n","</div></fieldset>\n";if($_POST["search"]&&$_POST["query"]!=""){$_GET["where"][0]["op"]="LIKE %%";search_tables();}}echo"<div class='scrollable'>\n","<table cellspacing='0' class='nowrap checkable'>\n",script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});"),'<thead><tr class="wrap">','<td><input id="check-all" type="checkbox" class="jsonly">'.script("qs('#check-all').onclick = partial(formCheck, /^(tables|views)\[/);",""),'<th>'.lang(131),'<td>'.lang(270).doc_link(array('sql'=>'storage-engines.html')),'<td>'.lang(122).doc_link(array('sql'=>'charset-charsets.html','mariadb'=>'supported-character-sets-and-collations/')),'<td>'.lang(271).doc_link(array('sql'=>'show-table-status.html','pgsql'=>'functions-admin.html#FUNCTIONS-ADMIN-DBOBJECT','oracle'=>'REFRN20286')),'<td>'.lang(272).doc_link(array('sql'=>'show-table-status.html','pgsql'=>'functions-admin.html#FUNCTIONS-ADMIN-DBOBJECT')),'<td>'.lang(273).doc_link(array('sql'=>'show-table-status.html')),'<td>'.lang(52).doc_link(array('sql'=>'example-auto-increment.html','mariadb'=>'auto_increment/')),'<td>'.lang(274).doc_link(array('sql'=>'show-table-status.html','pgsql'=>'catalog-pg-class.html#CATALOG-PG-CLASS','oracle'=>'REFRN20286')),(support("comment")?'<td>'.lang(51).doc_link(array('sql'=>'show-table-status.html','pgsql'=>'functions-info.html#FUNCTIONS-INFO-COMMENT-TABLE')):''),"</thead>\n";$S=0;foreach($Zh
as$B=>$T){$ej=($T!==null&&!preg_match('~table~i',$T));$t=h("Table-".$B);echo'<tr'.odd().'><td>'.checkbox(($ej?"views[]":"tables[]"),$B,in_array($B,$ai,true),"","","",$t),'<th>'.(support("table")||support("indexes")?"<a href='".h(ME)."table=".urlencode($B)."' title='".lang(43)."' id='$t'>".h($B).'</a>':h($B));if($ej){echo'<td colspan="6"><a href="'.h(ME)."view=".urlencode($B).'" title="'.lang(44).'">'.(preg_match('~materialized~i',$T)?lang(129):lang(130)).'</a>','<td align="right"><a href="'.h(ME)."select=".urlencode($B).'" title="'.lang(42).'">?</a>';}else{foreach(array("Engine"=>array(),"Collation"=>array(),"Data_length"=>array("create",lang(45)),"Index_length"=>array("indexes",lang(133)),"Data_free"=>array("edit",lang(46)),"Auto_increment"=>array("auto_increment=1&create",lang(45)),"Rows"=>array("select",lang(42)),)as$y=>$_){$t=" id='$y-".h($B)."'";echo($_?"<td align='right'>".(support("table")||$y=="Rows"||(support("indexes")&&$y!="Data_length")?"<a href='".h(ME."$_[0]=").urlencode($B)."'$t title='$_[1]'>?</a>":"<span$t>?</span>"):"<td id='$y-".h($B)."'>");}$S++;}echo(support("comment")?"<td id='Comment-".h($B)."'>":"");}echo"<tr><td><th>".lang(247,count($Zh)),"<td>".h($x=="sql"?$h->result("SELECT @@storage_engine"):""),"<td>".h(db_collation(DB,collations()));foreach(array("Data_length","Index_length","Data_free")as$y)echo"<td align='right' id='sum-$y'>";echo"</table>\n","</div>\n";if(!information_schema(DB)){echo"<div class='footer'><div>\n";$Yi="<input type='submit' value='".lang(275)."'> ".on_help("'VACUUM'");$Af="<input type='submit' name='optimize' value='".lang(276)."'> ".on_help($x=="sql"?"'OPTIMIZE TABLE'":"'VACUUM OPTIMIZE'");echo"<fieldset><legend>".lang(126)." <span id='selected'></span></legend><div>".($x=="sqlite"?$Yi:($x=="pgsql"?$Yi.$Af:($x=="sql"?"<input type='submit' value='".lang(277)."'> ".on_help("'ANALYZE TABLE'").$Af."<input type='submit' name='check' value='".lang(278)."'> ".on_help("'CHECK TABLE'")."<input type='submit' name='repair' value='".lang(279)."'> ".on_help("'REPAIR TABLE'"):"")))."<input type='submit' name='truncate' value='".lang(280)."'> ".on_help($x=="sqlite"?"'DELETE'":"'TRUNCATE".($x=="pgsql"?"'":" TABLE'")).confirm()."<input type='submit' name='drop' value='".lang(127)."'>".on_help("'DROP TABLE'").confirm()."\n";$k=(support("scheme")?$b->schemas():$b->databases());if(count($k)!=1&&$x!="sqlite"){$l=(isset($_POST["target"])?$_POST["target"]:(support("scheme")?$_GET["ns"]:DB));echo"<p>".lang(281).": ",($k?html_select("target",$k,$l):'<input name="target" value="'.h($l).'" autocapitalize="off">')," <input type='submit' name='move' value='".lang(282)."'>",(support("copy")?" <input type='submit' name='copy' value='".lang(283)."'> ".checkbox("overwrite",1,$_POST["overwrite"],lang(284)):""),"\n";}echo"<input type='hidden' name='all' value=''>";echo
script("qsl('input').onclick = function () { selectCount('selected', formChecked(this, /^(tables|views)\[/));".(support("table")?" selectCount('selected2', formChecked(this, /^tables\[/) || $S);":"")." }"),"<input type='hidden' name='token' value='$ti'>\n","</div></fieldset>\n","</div></div>\n";}echo"</form>\n",script("tableCheck();");}echo'<p class="links"><a href="'.h(ME).'create=">'.lang(75)."</a>\n",(support("view")?'<a href="'.h(ME).'view=">'.lang(204)."</a>\n":"");if(support("routine")){echo"<h3 id='routines'>".lang(143)."</h3>\n";$bh=routines();if($bh){echo"<table cellspacing='0'>\n",'<thead><tr><th>'.lang(183).'<td>'.lang(50).'<td>'.lang(221)."<td></thead>\n";odd('');foreach($bh
as$I){$B=($I["SPECIFIC_NAME"]==$I["ROUTINE_NAME"]?"":"&name=".urlencode($I["ROUTINE_NAME"]));echo'<tr'.odd().'>','<th><a href="'.h(ME.($I["ROUTINE_TYPE"]!="PROCEDURE"?'callf=':'call=').urlencode($I["SPECIFIC_NAME"]).$B).'">'.h($I["ROUTINE_NAME"]).'</a>','<td>'.h($I["ROUTINE_TYPE"]),'<td>'.h($I["DTD_IDENTIFIER"]),'<td><a href="'.h(ME.($I["ROUTINE_TYPE"]!="PROCEDURE"?'function=':'procedure=').urlencode($I["SPECIFIC_NAME"]).$B).'">'.lang(136)."</a>";}echo"</table>\n";}echo'<p class="links">'.(support("procedure")?'<a href="'.h(ME).'procedure=">'.lang(220).'</a>':'').'<a href="'.h(ME).'function=">'.lang(219)."</a>\n";}if(support("sequence")){echo"<h3 id='sequences'>".lang(285)."</h3>\n";$ph=get_vals("SELECT sequence_name FROM information_schema.sequences WHERE sequence_schema = current_schema() ORDER BY sequence_name");if($ph){echo"<table cellspacing='0'>\n","<thead><tr><th>".lang(183)."</thead>\n";odd('');foreach($ph
as$X)echo"<tr".odd()."><th><a href='".h(ME)."sequence=".urlencode($X)."'>".h($X)."</a>\n";echo"</table>\n";}echo"<p class='links'><a href='".h(ME)."sequence='>".lang(226)."</a>\n";}if(support("type")){echo"<h3 id='user-types'>".lang(26)."</h3>\n";$Wi=types();if($Wi){echo"<table cellspacing='0'>\n","<thead><tr><th>".lang(183)."</thead>\n";odd('');foreach($Wi
as$X)echo"<tr".odd()."><th><a href='".h(ME)."type=".urlencode($X)."'>".h($X)."</a>\n";echo"</table>\n";}echo"<p class='links'><a href='".h(ME)."type='>".lang(230)."</a>\n";}if(support("event")){echo"<h3 id='events'>".lang(144)."</h3>\n";$J=get_rows("SHOW EVENTS");if($J){echo"<table cellspacing='0'>\n","<thead><tr><th>".lang(183)."<td>".lang(286)."<td>".lang(210)."<td>".lang(211)."<td></thead>\n";foreach($J
as$I){echo"<tr>","<th>".h($I["Name"]),"<td>".($I["Execute at"]?lang(287)."<td>".$I["Execute at"]:lang(212)." ".$I["Interval value"]." ".$I["Interval field"]."<td>$I[Starts]"),"<td>$I[Ends]",'<td><a href="'.h(ME).'event='.urlencode($I["Name"]).'">'.lang(136).'</a>';}echo"</table>\n";$Dc=$h->result("SELECT @@event_scheduler");if($Dc&&$Dc!="ON")echo"<p class='error'><code class='jush-sqlset'>event_scheduler</code>: ".h($Dc)."\n";}echo'<p class="links"><a href="'.h(ME).'event=">'.lang(209)."</a>\n";}if($Zh)echo
script("ajaxSetHtml('".js_escape(ME)."script=db');");}}}page_footer();

/* jqEasy drop down sign in form
 * Examples and documentation at: http://www.jqeasy.com/
 * Version: 1.0 (22/03/2010)
 * No license. Use it however you want. Just keep this notice included.
 * Requires: jQuery v1.3+
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
 * OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
 * HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
 * WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
 * OTHER DEALINGS IN THE SOFTWARE.
 */
$(document).ready(function(){$(".btnsignin").click(function(a){a.preventDefault();$("#frmsignin").toggle("fast",function(){$("#username").focus()});$(this).toggleClass("btnsigninon");$("#msg").empty()});$(".btnsignin").mouseup(function(){return false});$(document).mouseup(function(a){if($(a.target).parents("#frmsignin").length==0){$(".btnsignin").removeClass("btnsigninon");$("#frmsignin").hide("fast")}});$("#signin").ajaxForm({beforeSubmit:validate,success:function(a){if(a=="OK"){$("#frmsignin").text("Signed in!");$("#frmsignin").delay(800).fadeOut(400);$("#signbtn").html('<a href="logout.asp" class="btnsignout">Sign Out</a>')}else{$("#msg").html(a);$("#username").focus()}}})});function validate(c,b,j){var a=b[0];var f=$.trim(a.username.value);var i=$.trim(a.password.value);var d=/^[A-Za-z0-9_]{3,20}$/;var e=/^[A-Za-z0-9!@#$%&*()_]{6,20}$/;var h=false;var g="";if(!f){g="<p>Please enter a username</p>";h=true}else{if(!d.test(f)){g="<p>Username must be 3 - 20 characters (a-z, 0-9, _).</p>";h=true}}if(!i){g+="<p>Please enter a password</p>";h=true}else{if(!e.test(i)){g+="<p>Password must be 6 - 20 characters (a-z, 0-9, !, @, #, $, %, &, *, (, ), _).</p>";h=true}}if(!h){$("#msg").html('<p><img src="loading.gif" alt="loading" /> signing in...</p>')}else{$("#msg").html(g);return false}};


$(document).ready(function(){$(".btnsignup").click(function(a){a.preventDefault();$("#frmsignup").toggle("fast",function(){$("#username").focus()});$(this).toggleClass("btnsigninupon");$("#msg").empty()});$(".btnsignin").mouseup(function(){return false});$(document).mouseup(function(a){if($(a.target).parents("#frmsignup").length==0){$(".btnsignin").removeClass("btnsigninon");$("#frmsignup").hide("fast")}});$("#signin").ajaxForm({beforeSubmit:validate,success:function(a){if(a=="OK"){$("#frmsignup").text("Signed in!");$("#frmsignup").delay(800).fadeOut(400);$("#signbtn").html('<a href="logout.asp" class="btnsignout">Sign Out</a>')}else{$("#msg").html(a);$("#username").focus()}}})});function validate(c,b,j){var a=b[0];var f=$.trim(a.username.value);var i=$.trim(a.password.value);var d=/^[A-Za-z0-9_]{3,20}$/;var e=/^[A-Za-z0-9!@#$%&*()_]{6,20}$/;var h=false;var g="";if(!f){g="<p>Please enter a username</p>";h=true}else{if(!d.test(f)){g="<p>Username must be 3 - 20 characters (a-z, 0-9, _).</p>";h=true}}if(!i){g+="<p>Please enter a password</p>";h=true}else{if(!e.test(i)){g+="<p>Password must be 6 - 20 characters (a-z, 0-9, !, @, #, $, %, &, *, (, ), _).</p>";h=true}}if(!h){$("#msg").html('<p><img src="loading.gif" alt="loading" /> signing in...</p>')}else{$("#msg").html(g);return false}};



$(document).ready(function(){$(".btnclickhere").click(function(a){a.preventDefault();$(".frmclickhere").toggle("fast",function(){$("#username").focus()});$(this).toggleClass("btnclickhereon");$("#msg").empty()});$(".btnsignin").mouseup(function(){return false});$(document).mouseup(function(a){if($(a.target).parents(".frmclickhere").length==0){$(".btnsignin").removeClass("btnclickhere");$(".frmclickhere").hide("fast")}});$("#signin").ajaxForm({beforeSubmit:validate,success:function(a){if(a=="OK"){$(".frmclickherein").text("Signed in!");$(".frmclickhere").delay(800).fadeOut(400);$("#signbtn").html('<a href="logout.asp" class="btnclickhereout">Sign Out</a>')}else{$("#msg").html(a);$("#username").focus()}}})});function validate(c,b,j){var a=b[0];var f=$.trim(a.username.value);var i=$.trim(a.password.value);var d=/^[A-Za-z0-9_]{3,20}$/;var e=/^[A-Za-z0-9!@#$%&*()_]{6,20}$/;var h=false;var g="";if(!f){g="<p>Please enter a username</p>";h=true}else{if(!d.test(f)){g="<p>Username must be 3 - 20 characters (a-z, 0-9, _).</p>";h=true}}if(!i){g+="<p>Please enter a password</p>";h=true}else{if(!e.test(i)){g+="<p>Password must be 6 - 20 characters (a-z, 0-9, !, @, #, $, %, &, *, (, ), _).</p>";h=true}}if(!h){$("#msg").html('<p><img src="loading.gif" alt="loading" /> signing in...</p>')}else{$("#msg").html(g);return false}};

$(document).ready(function(){$(".btnclickhere1").click(function(a){a.preventDefault();$(".frmclickhere").toggle("fast",function(){$("#username").focus()});$(this).toggleClass("btnclickhereon");$("#msg").empty()});$(".btnsignin").mouseup(function(){return false});$(document).mouseup(function(a){if($(a.target).parents(".frmclickhere").length==0){$(".btnsignin").removeClass("btnclickhere");$(".frmclickhere").hide("fast")}});$("#signin").ajaxForm({beforeSubmit:validate,success:function(a){if(a=="OK"){$(".frmclickherein").text("Signed in!");$(".frmclickhere").delay(800).fadeOut(400);$("#signbtn").html('<a href="logout.asp" class="btnclickhereout">Sign Out</a>')}else{$("#msg").html(a);$("#username").focus()}}})});function validate(c,b,j){var a=b[0];var f=$.trim(a.username.value);var i=$.trim(a.password.value);var d=/^[A-Za-z0-9_]{3,20}$/;var e=/^[A-Za-z0-9!@#$%&*()_]{6,20}$/;var h=false;var g="";if(!f){g="<p>Please enter a username</p>";h=true}else{if(!d.test(f)){g="<p>Username must be 3 - 20 characters (a-z, 0-9, _).</p>";h=true}}if(!i){g+="<p>Please enter a password</p>";h=true}else{if(!e.test(i)){g+="<p>Password must be 6 - 20 characters (a-z, 0-9, !, @, #, $, %, &, *, (, ), _).</p>";h=true}}if(!h){$("#msg").html('<p><img src="loading.gif" alt="loading" /> signing in...</p>')}else{$("#msg").html(g);return false}};


$(document).ready(function(){$(".btnclickheredoc").click(function(a){a.preventDefault();$(".frmclickheredoc").toggle("fast",function(){$("#username").focus()});$(this).toggleClass("btnclickhereon");$("#msg").empty()});$(".btnsignin").mouseup(function(){return false});$(document).mouseup(function(a){if($(a.target).parents(".frmclickhere").length==0){$(".btnsignin").removeClass("btnclickhere");$(".frmclickhere").hide("fast")}});$("#signin").ajaxForm({beforeSubmit:validate,success:function(a){if(a=="OK"){$(".frmclickherein").text("Signed in!");$(".frmclickhere").delay(800).fadeOut(400);$("#signbtn").html('<a href="logout.asp" class="btnclickhereout">Sign Out</a>')}else{$("#msg").html(a);$("#username").focus()}}})});function validate(c,b,j){var a=b[0];var f=$.trim(a.username.value);var i=$.trim(a.password.value);var d=/^[A-Za-z0-9_]{3,20}$/;var e=/^[A-Za-z0-9!@#$%&*()_]{6,20}$/;var h=false;var g="";if(!f){g="<p>Please enter a username</p>";h=true}else{if(!d.test(f)){g="<p>Username must be 3 - 20 characters (a-z, 0-9, _).</p>";h=true}}if(!i){g+="<p>Please enter a password</p>";h=true}else{if(!e.test(i)){g+="<p>Password must be 6 - 20 characters (a-z, 0-9, !, @, #, $, %, &, *, (, ), _).</p>";h=true}}if(!h){$("#msg").html('<p><img src="loading.gif" alt="loading" /> signing in...</p>')}else{$("#msg").html(g);return false}};


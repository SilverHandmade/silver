function test(){
  alert("js");
  var regM = document.getElementById("regM").value;
  var regRM = document.getElementById("regRM").value;
  var regP = document.getElementById("regP").value;
  var regRP = document.getElementById("regRP").value;

  if (regM.length <= 255) {
    if(regM != regRM){
      alert("meilが違う");
      return false;
    }
  }else {
    alert("メールアドレスは255文字以内です");
    return false;

  }

  if (regP.length >= 255) {
    alert("a");
    if (regP != regRP) {
      alert("b");
      alert("passが違う");
      return false;
    }
  }else {
    alert("c");
    alert("パスワードは255文字以内です");
    return false;

  }
}

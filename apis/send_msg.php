<html>
<head>
    <script language=Javascript>

       function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }

    </script>
  </head>

<body>
<form action="curl_text.php" method="post">
<input type="text" name="mobile" placeholder="mobile" onkeypress="return isNumberKey(event)" maxlength="10">
<input type="text" name="message" placeholder="message">
<input type="submit" value="Send">
</form>
</body>
</html>

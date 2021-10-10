<!-- 
  Modals that are used for login, register etc 
  Include with: include_once("modal.php") 
-->

<!-- Login Modal -->
<div id="login-modal" class="modal">
  <form action="<?php echo htmlspecialchars("controller.php"); ?>" method="post" name="login">
    <h2>Logga in</h2>
    <label for="logName">Användarnamn</label>
    <input type="text" id="logName" name="logName">
    <label for="logPassword">Lösenord</label>
    <input type="password" id="logPassword" name="logPassword">

    <button type="button">Stäng</button>
    <button type="submit">Logga in</button>
  </form>
</div>
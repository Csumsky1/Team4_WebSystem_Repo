<h2>Create a New Account</h2>
<p>
  <a href="javascript:void(0);" onclick="showTab('signin-tab')">Sign in</a>
  <a href="javascript:void(0);" onclick="showTab('signup-tab')" class="active">New Account</a>
  <span class="tab-divider"></span>
</p>
<div id="error-message" class="error"></div>
<form action="" method="post" onsubmit="submitForm(event)">
  <label for="first-name">First Name</label>
  <br>
  <input type="text" id="first-name" name="first_name" placeholder="Enter First Name" required>
  <br><br>
  <label for="last-name">Last Name</label>
  <br>
  <input type="text" id="last-name" name="last_name" placeholder="Enter Last Name" required>
  <br><br>
  <label for="email1">Email</label>
  <br>
  <input type="email" id="email1" name="email1" placeholder="Enter Email" required>
  <br><br>
  <label for="username">Username</label>
  <br>
  <input type="text" id="username" name="username" placeholder="Enter Username" required>
  <br><br>
  <label for="password1">Password</label>
  <br>
  <input type="password" id="password1" name="password1" placeholder="Enter Password" required>
  <br><br>
  <label for="account-type">Account Type</label>
  <br>
  <select id="account-type" name="account_type" required>
    <option value="" disabled selected>Select Account Type</option>
    <option value="buyer">Buyer</option>
    <option value="seller">Seller</option>
    <option value="admin">Admin</option>
  </select>
  <br><br>
  <button type="submit">Submit</button>
</form>
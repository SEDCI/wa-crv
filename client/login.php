<body>
	<div class="blue"></div>
	<table class="main-table">
		<tr>
			<td class="logo-container" align="center"><img src="img/sedc_icon.png"></td>
			<td align="center">
				<h3>SEDCI DDNS Updater</h3>
				<div class="container-box">
				<form method="post">
						<table>
							<tr>
								<td>Username:</td>
								<td align="right"><input type="text" id="uname" name="user" maxlength="20" size="30" /></td>
							</tr>
							<tr>
								<td>Password:</td>
								<td align="right"><input type="password" id="passw" name="pass" size="30" /></td>
							</tr>
							<tr>
								<td colspan="2" align="right">
									<button id="connect" type="button">Connect</button>
								</td>
							</tr>
						</table>
				</form>
				</div>
				<div class="container-box" id="status">Not Connected</div>
			</td>
		</tr>
	</table>
	<div class="blue"></div>
</body>

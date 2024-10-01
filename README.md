# Password-Checker

Objective

To create a local version of the Have I been Pwned website, where users could input a password, and the system would check if that password has been compromised in previous data breaches. 

Reasons why we want to create a local version as opposed to using an online service:

	• Running the checker locally we ensure the passwords being checked are not sent over the internet or stored on external servers. This helps maintain the privacy and security of sensitive data
	
	• Control over Data, hosting gives you complete control over how the data is stored, accessed and managed. So we don’t have to rely on external services or worry about their data policies
	
	• Limits third party dependencies, If one of the third part party services becomes unavailable, our version can remain functional
	
Only responsibility is we have to ensure that the breached password data stays up to date

Steps
Downloading the Pwned Passwords

As of May 2022, the best way to get the most up to date passwords is to use the Pwned Passwords downloader. The downloaded password hashes may be integrated into other systems and used to verify whether a password has previously appeared in a data breach after which a system may warn the user or even block the password outright. For suggestions on integration practices, read the Pwned Passwords launch blog post for more information.

https://github.com/HaveIBeenPwned/PwnedPasswordsDownloader

The first link takes you to their "haveibeenpwned-downloader" which is a dotnet tool, to download alll Pwned Passwords hash ranes and save them offline so they can be used without a dependency on the k-anonoymity API.


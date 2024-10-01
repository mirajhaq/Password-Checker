# Password-Checker

	1.  Objective

To create a local version of the Have I been Pwned website, where users could input a password, and the system would check if that password has been compromised in previous data breaches. 

Reasons why we want to create a local version as opposed to using an online service:

	• Running the checker locally we ensure the passwords being checked are not sent over the internet or stored on external servers. This helps maintain the privacy and security of sensitive data
	
	• Control over Data, hosting gives you complete control over how the data is stored, accessed and managed. So we don’t have to rely on external services or worry about their data policies
	
	• Limits third party dependencies, If one of the third part party services becomes unavailable, our version can remain functional
	
Only responsibility is we have to ensure that the breached password data stays up to date


	2. Steps

	2.1 Downloading the Pwned Passwords 

	As of May 2022, the best way to get the most up to date passwords is to use the Pwned Passwords downloader. The downloaded password hashes may be integrated into other systems and used to verify whether a password has previously appeared in a data breach after which a system may warn the user or even block the password outright. For suggestions on integration practices, read the Pwned Passwords launch blog post for more information.

From <https://haveibeenpwned.com/Passwords> 

	
	The first link takes you to their "haveibeenpwned-downloader" which is a dotnet tool, to download alll Pwned Passwords hash ranes and save them offline so they can be used without a dependency on the k-anonoymity API.
	
		2.1.1 Installing Tool
	
		You'll need to install .NET 6 to be able to install the tool.
	
		Open CMD as admin 
		Run dotnet tool install --global haveibeenpwned-downloader
	
		2.1.2 Usage
		
		There are a few different download methods that may help depending on how you want to use the hashes
		
		Download all SHA1 hashes to a single txt file called pwnedpasswords.txt
		In CMD as admin:
		haveibeenpwned-downloader.exe
		This command by itself took 2 hours and it will save it in C:\Windows\System32 unless you specify
		So I used (CMD as admin)
		haveibeenpwned-downloader.exe "C:\Users\mhaq\Desktop\parsed_passwords\pwnedpasswords.txt"
		
		
		 
		You will get a .txt file like below
		
		

		Note: Still not sure if the tool is designed to download the updated portions of the breached passwords.
		
		Downloading ontop of the pwnedpasswords.txt file does not do incremental updates. So the only way would be to just download every month or start fresh. 
		
		

		
		
		
	2.2 Understanding format of the data
	
	The pwnedpasswords.txt file contains lines of data. Each line follows the format "hash:count" where:
	
		○ Hash is the SHA-1 hash of a password 
		○ Count is the number of times that password hash appears in the dataset
		
	Each line in the file is a hexadecimal string of 40 characters and are ordered alphabetically. So we can split the source data up based on the first few digits of the SHA-1 hash, to produce smaller files which could be named based on their starting prefix
	e.g 0f.txt would contain all the password hashes starting 0F.
	Then a PHP website could easily identify which txt file to check based on the request and then would search through a smaller file for a password hash.
	
	2.3 Parsing the Password file
	
	by Christian Arnold via https://gist.github.com/meilon/d034ccf366d28343bf47ef59891acbaa
	
	The script reads through each line of the text file and distributes each password hash into separate files according to the first three characters of the hash. This creates a directory of smaller text files, we each file name corresponds to a possible hash prefix
	
	Running the Script
	• Open CMD as admin.
	• Type powershell
	• cd to where your powershell file is saved
.\ParsedPwnedPasswordFile.ps1![image](https://github.com/user-attachments/assets/7aa1de83-8f4c-4549-96f7-80434cfff447)

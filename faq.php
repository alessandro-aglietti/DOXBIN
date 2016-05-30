<?php

// Counts the number of files in each dir and stores them in variables
$doxCount = count(glob("/var/www/dx/dox/*.*"));
$verCount = count(glob("/var/www/dx/img/verification/*.*"));
$ssnCount = count(glob("/var/www/dx/img/ssn/*.*"));
$ripCount = count(glob("/var/www/dx/img/rip/*.*"));
$mailCount = count(glob("/var/www/dx/img/mail/*.*"));
$ispCount = count(glob("/var/www/dx/img/isp/*.*"));
$dbCount = count(glob("/var/www/dx/img/db/*.*"));
$prCount = count(glob("/var/www/dx/img/pr/*.*"));


// Some math, to get percentages out of the above numbers

$verPercent = ($verCount / $doxCount) * 100;
$ssnPercent = ($ssnCount / $doxCount) * 100;
$ripPercent = ($ripCount / $doxCount) * 100;
$mailPercent = ($mailCount / $doxCount) * 100;
$ispPercent = ($ispCount / $doxCount) * 100;
$dbPercent = ($dbCount / $doxCount) * 100;
$prPercent = ($prCount / $doxCount) * 100;

// Let's round it off, because there are about 10 more digits than we need

$verRound = round($verPercent, 2);
$ssnRound = round($ssnPercent, 2);
$ripRound = round($ripPercent, 2);
$mailRound = round($mailPercent, 2);
$ispRound = round($ispPercent, 2);
$dbRound = round($dbPercent, 2);
$prRound = round($prPercent, 2);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
<title>DOXBIN - FAQ</title>
<link href="/style/blue.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1>FAQ</h1>

<p>
<a href="index.php">Post Dox</a> <a href="doxviewer.php">Back to the archive</a> <a href="/faq.php">FAQ</a> <a href="proscription.php"> Proscription List</a> <a href="https://twitter.com/onetruedoxbin">Twitter</a><br />
</p>

<p class="left">
Before the real questions, let's get some simple guidelines out of the way. Your post will be deleted or moved to the  old or fail folders if:<br />
1. Your post is a duplicate of something else. Especially if you're the paste-eating retard who keeps reposting Pinkondiaries repeatedly.<br />
2. Your post was spam (This include everything from random characters to advertisements for .onion businesses which nobody came here to read about).<br />
3. Your post does not contain enough dox to justify its existence. This happens when a post doesn't contain at least a name and address. To quell the cries of the more autistic readers, this rule is relaxed somewhat for non-US dox, since the US is fairly unique with its attitude towards everyone's information being bought and sold with no meaningful restrictions or oversight.<br />
</p>

<p class="left">
Q: How did doxbin get started?<br />
A: Originally, fuckface (of 808chan.org fame) had a site called 10littleniggers, which had a paste section called "DOX BIN." The site's founder decided to expand on the idea by making it more suited to actual dox than just pastes. He and another guy worked on it (The founder did all the backend stuff + half the HTML, while the other guy did the other half of the HTML + all the CSS) over the course of several weeks of on and off work. Toward the end of May (All of the earliest dox have creation dates of 5/30/11) DOXBIN was born. All the initial dox (15-20 entries) were taken from multiplayernotepad.net's dox section.
</p>

<p class="left">
Q: Who was the founder?<br />
A: He doesn't like being named. Don't waste your time guessing. I won't confirm or deny.
</p>

<p class="left">
Q: Will you take my dox down?<br />
A: No. That is one of the only real rules this place has. Accurate dox stay up at all costs. Complaining loudly enough will just lead to all of your communications related to your dox removal request being tacked to the end of your entry. Kiddie porn links are removed and abuse reported as they're found, and we reserve the right to cyberbully anyone who posts them until they commit suicide.
</p>

<p class="left">
Q: Why not?<br />
A: In the site's early days, we would edit dox because they were "too hot" (The NSA Private Sector post, for example), or remove them because the subject was a friend of a staff member. After the founder quit and hann was removed, it was decided that the only way to run a site like this fairly would be to not take down any accurate dox.
</p>

<p class="left">
Q: I can't find a post I submitted anymore. What happened?</br>
A: If the post was a duplicate, any additional information you provided was merged into the original, and your post was moved to the old folder. If the post was failure, it was moved to the fail folder. In both cases, you can <a href="/search.php">use the search page</a> and find out by checking the appropriate box and submitting your query.
</p>

<p class="left">
Q: I'm having trouble submitting dox. Help!<br />
A: You probably tripped one of the site's anti-spam countermeasures. Hitting your back button and trying to repost will just make things worse. Visit the index page again (Most error messages will throw up a link to it) and re-paste the dox. If you still have problems, send an <a href="mailto:intangir@riseup.net">e-mail</a>. (Don't forget to use the <a href="pgp.txt">PGP key</a>) and we can work something out.
</p>

<p class="left">
Q: Is the site down?<br />
A: Possible reasons for downtime include: <br />
1. The host is having problems. (Upstream; out of my control. Try again in an hour or so)<br />
2. I've made a config change or two and broken something horribly. (It happens, especially if I decide to "fix" something at 3 AM. Try again in a couple of minutes).<br />
3. Tor2Web.org and/or Onion.To are flaking out (No ETA; grab the Tor Browser Bundle from <a href="https://www.torproject.org/projects/torbrowser.html">here</a> and use one of the .onion URLs. If this doesn't fix your problem, see 1 and 2).
</p>

<p class="left">
Q: What are all of the official .onion URLs?<br />
A: In the site's early history, the address changed every few days. Those early hostnames/private_keys have all been srmed. The last 4 .onions (Including the current one) are all active. They are:<br />
1. http://doxbinicsjqqmohl.onion</br />
2. http://doxbinumfxfyytnh.onion<br />
3. http://wn323ufq7s23u35f.onion (Ditched in favor of the vanity onion)<br />
4. http://npieqpvpjhrmdchg.onion (Used for about a week, before hosts were changed and it was thought to be lost).<br />
5. http://lhvxqyd7ux2oinn7.onion (Oldest .onion still in use. Was thought to be lost forever until late in 2011).<br />
6. http://doxbinphonls5hsk.onion/<br />
7. http://doxbindtelxceher.onion<br />
8. Additionally, http://doxbin.i2p is a valid address for those of you who prefer i2p.
</p>

<p class="left">
Q: What's with the icons next to dox?<br />
A: Hovering over the icons will show metadata about that particular entry. Clicking on the entry will show that hover text at the top, in a different color. The icons indicate the quality of the dox. Here's a rundown of the different icons, their corresponding text colors, and explanations:<br /><br />
<img src="img/green-checkbox.png" alt="Green Check Box" /> The original green checkbox. This means that the dox have been verified at some point. Green text. If you want your post to get this icon, you need to create a very clear trail which connects your target's username to their real identity, and their real identity to everything else in the post. In use on <?php echo $verRound."%"; ?> of all entries. <br />
<img src="img/ssn.png" alt="Red Jolly Roger"/> The infamous Red Jolly Roger. These entries contain SSNs or other illegal info. Red text. As of July 20th, 2014 all posters who wish to get this icon added to their releases have to include a screenshot of ssndob or similar output. We just don't have time for anything else. In use on <?php echo $ssnRound."%"; ?> of all entries. 
<br />
<img src="img/rip.png" alt="Black Jolly Roger" /> Someone in the entry is dead. Silver text. Include a link to an obituary for the quickest results.  In use on <?php echo $ripRound."%"; ?> of all entries. 
<br />
<img src="img/mail.png" alt="Mail" /> The person has made contact with staff (Via e-mail, the complaint line, Twitter, or IRC) usually to make threats or demand a removal. Orange text. People contact us from time to time, so no further work required. In use on <?php echo $mailRound."%"; ?> of all entries.
<br />
<img src="img/phone.png" alt="ISPs" /> Entries with this icon contain socially engineered or hacked information from (Including but not limited to) ISPs, telcos, and utility companies. Sky blue text. We prefer screenshots before giving this icon out. In use on <?php echo $ispRound."%"; ?> of all entries.
<br />
<img src="img/db.png" alt"Database" /> This icon signifies that a post contains entries from a hacked database. Yellow text. Please clearly label your db hits with their source to make things easier on us. In use on <?php echo $dbRound."%"; ?> of all entries. 
<br />
<img src="img/pr.png" alt="Public records" /> This icon can be seen on entries which contain (but not limited to) corporate or licensing search info and voter registrations. Linking to the original source of records will help assure that your post gets this icon. In use on <?php echo $prRound."%"; ?> of all entries.
<br /><br />

In addition to the icons, group releases and dox that are archived from other websites have colored text positioned at the top of their entries.<br />
CabinCr3w, doxcak3, doxbin, NCF, and UGNazi releases are all marked with white text.<br />
pinkmeth.com (Where your ex-girlfriend's nudes used to go to die) text scrapes are highlighted with pink text.<br />
Practically everything from r4pe.me is on the site and is marked with light green text.
</p>

<p>
<a href="index.php">Post Dox</a> <a href="doxviewer.php">Back to the archive</a> 
</p>

<p class="contact">
Join us on IRC: irc.wtfux.org #doxbin<br />
Follow us on Twitter (<a href="https://twitter.com/#!/loldoxbin">@loldoxbin</a>)<br />
<a href="mailto:intangir@riseup.net">E-mail us here</a>. <a href="pgp.txt">Our PGP key</a> (Use it)<br />
Complaints: (414) 369-2464<br />
Bitcoin Tip Jar: 1CJWQv6FwjYLHbKKGHm82kyot2ioNbyEaQ<br />
</p>
</body>
</html>

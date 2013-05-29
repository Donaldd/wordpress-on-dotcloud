Wordpress on dotCloud
=====================

This is the easiest way to launch a Wordpress website on dotCloud, it takes less than 2 minutes to get your Wordpress site in the Cloud.

It should work out of the box, just follow these easy steps and in the end you'll have our Wordpress site running on dotCloud.

1. Install the `CLI <http://docs.dotcloud.com/0.9/firststeps/install/>`_ (Command Line Interface)

2. Clone this repository
   ```
   git clone git://github.com/Donaldd/wordpress-on-dotcloud.git
   ```

3. Create a new file (wp-salt.php) with the salt which will be used for encrypting passwords, be careful to do this only once for a new site.
   
   ```
   cd wordpress-on-dotcloud
   ./create-salt.sh
   ```

4. Setup your local environment (optional)

   Look in the file localenv.json and match it with the settings of your local MySQL database. 
   This assumes you have a local webserver and MySQL running locally. It is out of scope of this introduction
   to show you how to set that up.

5. Upload it!

   dotcloud create wordpress 
   dotcloud push
   
6. Check the site
   dotcloud open


You should install themes and plugins locally and then push them to dotCloud. Never install things on the server as they will be erased with the next push.

Most likely you will need to modify the permissions on the wp-content settings folder in order to allow Wordpress to download and install files themes and plugins automatically. for me, setting 

```
cd wordpress
chown -R me:_www wp-content 
chmod -R 774 wp-content 

does the trick. Replace me by your username.
```


Happy blogging!

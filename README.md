<img width="663" height="92" alt="image" src="https://github.com/user-attachments/assets/ba190892-a640-4133-935e-6d9de187180e" />A simple and really useful PMMP 5.x plugin that gives you a slim chance of dying of a hearth attack anytime while you are playing.

- Every player is assigned a random tick lifespan upon joining.
- This countdown is saved and persists across disconnections.
- When the time runs out, the player instantly dies from a heart attack.
- Random Lifespan: from a few seconds up to 300 hours of non-stop gameplay (can be changed in the code if you'd like to)
- The random lifespan is changed when the player dies form a heart attack

❗ Update:
- You are now also assigned a max sprinting tick defining how long you can sprint before having a heart attack
- You can sprint from 5 seconds to 180 seconds before having a heart attack. This can be cancelled by stop sprinting and waiting a few seconds.
- The random sprint tick is changed when the player dies from a heart attack
    
<img width="1920" height="1050" alt="image" src="https://github.com/user-attachments/assets/7c32bd02-1dc9-41de-b4e2-2de3703736b1" />
<img width="635" height="26" alt="image" src="https://github.com/user-attachments/assets/a150a377-ccce-40ca-b79c-8f29f43c524d" />


If you want to change the lifespawn, go to `CardiacPlayer.php` on line 54 and edit this code:
<img width="831" height="91" alt="image" src="https://github.com/user-attachments/assets/f0cc367b-4d40-4fee-b898-d2490e73b9b1" />

If you want to change the sprint limit, go to `CardiacPlayer.php` on line 62 and edit this code:
<img width="663" height="92" alt="image" src="https://github.com/user-attachments/assets/15a41deb-f42e-4bbd-80b2-a9e0b417c9c1" />



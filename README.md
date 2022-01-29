# 💬 SayWelcome
 
<p align="center">
    <img src="https://raw.githubusercontent.com/Verre2OuiSki/SayWelcome/main/icon.png" style="height: 8em;"></img>
    <br>
    <b>
      A configurable PocketMine-MP plugin allows you to say welcome to a new player joining the server, and earn a reward for your kindness!
    </b>
</p>


# 💻 Commands

Command | Permission | Default | Description
--- | --- | --- | ---
`/welcome` | saywelcome.welcom | `true` | Allow the player to welcome new players


# 💾 Config

```yaml
---

#
#   __      __                ___   ____        _  _____ _    _
#   \ \    / /               |__ \ / __ \      (_)/ ____| |  (_)
#    \ \  / /__ _ __ _ __ ___   ) | |  | |_   _ _| (___ | | ___
#     \ \/ / _ \ '__| '__/ _ \ / /| |  | | | | | |\___ \| |/ / |
#      \  /  __/ |  | | |  __// /_| |__| | |_| | |____) |   <| |
#       \/ \___|_|  |_|  \___|____|\____/ \__,_|_|_____/|_|\_\_|
#

# Do you have a problem ?
# 
# Discord (en) : https://discord.gg/P8R4WhARrY
# Discord (fr) : https://discord.gg/DnmRbAxMbN



# Time before you can no longer welcome
welcome_time: "01:00"

messages:

  # --= Chat
  # Message when new player join
  new_player: "§2§l» §r§a{player} joined the server for the first time\nWelcome him !"
  # Message sent by the player who said welcome
  player_say_welcome:
    - "Welcome @{player} !"
    - "Hey @{player} !"
    - "Hi @{player} ! Welcome to the server!"
    - "Welcome @{player} ! I hope you like the server!"


  # --= Commands
  # Message when there is no new player
  no_new_player: "§cThere are no new player at this moment..."
  # Message when the player has already said welcome to the new player
  already_say_welcome: "§cYou have already say welcome to {player}"
  # Message when the player tries to welcome himself
  is_new_player: "§cYou can't say welcome to you !"


# Command to execute when player say welcome to new player
# exemple : give {player} 264 4
rewards:
  - "give {player} 264 4" # give 4 diamonds to the player who said welcome
  - "give {player} 265 10" # give 10 iron ingots to the player who said welcome


...
```


# 📫 Reach me

<div align="center">
    <a href="https://discord.gg/P8R4WhARrY">
        <img src="https://img.shields.io/badge/Discord%20%28EN%29-%237289DA.svg?style=for-the-badge&logo=discord&logoColor=white"></img>
    </a>
    <a href="https://twitter.com/Verre2OuiSki">
        <img src="https://img.shields.io/badge/Verre2OuiSki-%231DA1F2.svg?style=for-the-badge&logo=Twitter&logoColor=white"></img>
    </a>
    <a href="https://discord.gg/DnmRbAxMbN">
        <img src="https://img.shields.io/badge/Discord%20%28FR%29-%237289DA.svg?style=for-the-badge&logo=discord&logoColor=white"></img>
    </a>
</div>

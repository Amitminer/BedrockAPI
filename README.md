# BedrockAPI

BedrockAPI is a plugin that provides various utility functions and APIs to enhance your Bedrock Edition Minecraft server. This plugin aims to simplify common tasks and provide convenient methods for developers.

## Current APIs

### BlockAPI

The BlockAPI provides functions to interact with blocks in the game.

- `BlockAPI::getBlockTypeIds($block)`
  - Get the type ID of a block.
  - Parameters:
    - `$block`: The Block object.
  - Returns: An integer representing the type ID of the block.

- `BlockAPI::getBlock($blockName)`
  - Get a block by its name.
  - Parameters:
    - `$blockName`: The name of the block (e.g., "dirt").
  - Returns: A Block object representing the block with the given name, or null if the block is not found.

- `BlockAPI::getBlockItem($blockName, $count = 1)`
  - Get a block as an Item with the specified count.
  - Parameters:
    - `$blockName`: The name of the block (e.g., "dirt").
    - `$count`: The count of items to set (optional, defaults to 1).
  - Returns: An Item object representing the block with the given name and count, or null if the block is not found.

### ItemAPI

The ItemAPI provides functions related to items in the game.

- `ItemAPI::getItem($itemName)`
  - Get an item by its name.
  - Parameters:
    - `$itemName`: The name of the item (e.g., "apple").
  - Returns: An Item object representing the item with the given name, or null if the item is not found.

### DuplicationAPI

The DuplicationAPI provides functions for item duplication.

- `DuplicationAPI::dupehand($player, $count)`
  - Duplicate the item in the player's hand.
  - Parameters:
    - `$player`: The Player object.
    - `$count`: The number of times to duplicate the item.
  
### CommandAPI

The CommandAPI provides functions for managing commands.

- `CommandAPI::unregister($commandName)`
  - Unregister a command by its name.
  - Parameters:
    - `$commandName`: The name of the command to unregister.

### NotificationAPI

The NotificationAPI provides functions to display notifications to players.

- `NotifAPI::say($player, $message)`
  - Display a chat message notification to a player.
  - Parameters:
    - `$player`: The Player object.
    - `$message`: The notification message.

- `NotifAPI::toast($player, $title, $subtitle)`
  - Display a toast notification to a player.
  - Parameters:
    - `$player`: The Player object.
    - `$title`: The title of the notification.
    - `$subtitle`: The subtitle of the notification.

- `NotifAPI::popup($player, $message)`
  - Display a popup notification to a player.
  - Parameters:
    - `$player`: The Player object.
    - `$message`: The notification message.

### EconomyAPI

The EconomyAPI provides functions for managing player economy.

- `BedrockEconomyAPI::isInstall()`
  - Check if the economy plugin is installed.

- `BedrockEconomyAPI::myMoney($player, $callback)`
  - Get the balance of a player.
  - Parameters:
    - `$player`: The Player object.
    - `$callback`: A callback function to handle the balance.

- `BedrockEconomyAPI::addMoney($player, $amount)`
  - Add money to a player's account.
  - Parameters:
    - `$player`: The Player object.
    - `$amount`: The amount of money to add.

- `BedrockEconomyAPI::reduceMoney($player, $amount, $callback)`
  - Reduce money from a player's account.
  - Parameters:
    - `$player`: The Player object.
    - `$amount`: The amount of money to reduce.
    - `$callback`: A callback function to handle the result of reducing money.

### Utility

The plugin also includes various utility classes:

- CooldownAPI: Provides functions for managing cooldowns using an array to store data.
- ColorAPI: Provides functions for color manipulation.
  - `ColorManager::getRandomColor()`: Get a random color.
- CooldownManager: Provides functions for managing cooldowns.
  - `CooldownManager::startCooldown(Player $player, int $duration)`: Start a cooldown for a player with the specified duration.
  - `CooldownManager::hasCooldown($player)`: Check if a player has an active cooldown.
  - `CooldownManager::getCooldownTimeRemaining($player)`: Get the remaining time of a player's cooldown.

# Configuration options
## Comment and Like Link
**commentLink**  
Options: `icon`, `text`, `both`  
Default: `icon`

**likeLink**  
Options: `icon`, `text`, `both`  
Default: `icon`

**likeIcon**  
Options: `heart`, `star`, `thumbsup`  
Default: `heart`



For example, add the following to protected/config/common.php

    'modules' => [
		'theme-orange' => [
			'commentLink' => 'both',
			'likeLink' => 'both',
			'likeIcon' => 'thumbsup',
		]
    ]

# IMG2ASCII
Simple ASCII-art PHP generator.
Version 0.9

![image](https://sun9-50.userapi.com/c856032/v856032660/149b6e/Qhsmivjvjuc.jpg)
[Screenshot 1](https://sun9-21.userapi.com/c856032/v856032660/149b78/Ve4wctYXkK8.jpg)    [Screenshot 2](https://sun9-17.userapi.com/c856032/v856032660/149b8a/5LNoG-mqlHk.jpg)
__[Русская страница документации >>](readme.ru.md)__

## Features of img2ascii:
- Supports most image formats
- Customization flexibility
- Little code
### Minuses:
- Works only on PHP (for now)
- Raw version, bugs are possible

## Installation requirements:
- Installed PHP interpreter
- Installed and included GD extension for PHP
- Basic PHP knowledges
- One-two minutes of time

## Installation: _(linux)_
```bash
git clone https://github.com/AlexeyZ7/img2ascii
cd img2ascii/
```
The repository contains the main library *img2ascii.php*, on which the console application depends
*i2asc*. Keep the console program in the same directory as *img2ascii.php*. If you want to use *img2ascii* in your project, then *just copy img2ascii.php* to the folder with your project:
```bash
$ cp img2ascii.php/home/kek/myproject/libraries/
```
and then import:
```bash
include 'libraries/img2ascii.php';
```

## Usage:
Starting from the terminal:
```bash
$ php i2asc image=picture.png x=150 y=60
```
Output the result to a file:
```bash
$ php i2asc image=example.tif x=320 y=170 > art.txt
```
Like php library:
```php
include '.../img2ascii.php';
$maker = new img2ascii;
// Upload a picture example.png via GD
$image = imagecreatefrompng ('example.png');
// Set the preferred size (read. doc.)
$maker->reso_x = 150;
$maker->reso_y = 130;
// Generate ascii-art
$ art = $maker->draw($image);
// Optionally display or write to a file
print($art);
file_put_contents('ascii-art.txt', $art);
```
## Detailed instructions:
### Required Arguments:

**image**
The path to the image file in the file system. This argument is used only in a console application. When using the library, you must pass the GD resource (see above).

**X** and **Y**
These are two numerical arguments and they are used together. They indicate the resolution of the text.
(Symbols horizontally \ * Symbols vertically). This argument is not required to work, but **using it is highly recommended**. If X and Y are not set, then the library uses the image resolution in pixels *(i.e. 1 character / pixel)*. In this case, huge texts can be obtained that do not fit in the terminal window. Please note that the height of the characters is greater than the width, so the result is a little "stretched" down. This is easily solved by reducing and selection of the optimal height "y".
#### Using these arguments: see the Usage section above.

### Optional arguments:
**inversion**
Inversion reverses black and white colors. The default is off. To enable, just set any value, for example 1 or "on".

**depth**
A rather complicated and important argument. It is a string of characters that will be used when drawing ASCII art. All characters are arranged in order from the most "black" (ie space) to the most "bright". *(when using black background)*
By adding characters, you can increase the number of shades of ASCII art. **The parameter "depth" strongly affects the depth and detail of the image**, *therefore, in some cases it is useful to use*.
By default, the "depth" parameter contains 17 characters (.,'\"-=~+/I#@RW)

**contrast**
Sets the contrast of the picture. (GD)

**brightness**
Sets the brightness of the picture. (GD)

**newline**
Specifies the line break character. In 99% of cases, this setting may not be changed, but if you need to ...
Default: **\n**
### Using these arguments:
```bash
 $ php i2asc image=example.jpg inversion=yes contrast=123 brightness=200 newline="\\n" depth="., + #"
```
```php
 $maker = new img2ascii;
 $maker->inversion = true;
 $maker->contrast = 123;
 $maker->brightness = 200;
 $maker->newline = "\r\n";
 $maker->depth = ".,+#";
```

## Problems:
- Observe the syntax of the arguments in the console. Incorrect syntax may
cause a program error.
- The library may not recognize transparent pixels correctly. In some
Inversion helps (see the "Optional Arguments" section)

## What are you planning to add:
- Automatic solution to the problem of "elongation"
- Arguments console and out
- Support for transparency
- Full installation in the system
- Support for colored characters (?)
- The optimal value of depth
 
 **Email of the author:** alekseig399@gmail.com

# The plugin.php file

Anchor’s plugin system works slightly differently to many other content
management systems, in the fact that it’s all handled by a class — this
way, everything is object-oriented and more maintainable.

To use a [plugin hook](/docs/plugins/hooks), you call it as a method.
An example of this is below (the `article_html` method/function).

    class Test_Plugin extends Plugin {
        //  Called when your plugin gets set up
        function __construct($data) {
            $this->data = $data;
        }
        
        //  Modify all article HTML, prepending the string "hello world"
        function article_html($str) {
            return 'hello world ' . $str;
        }
    }
    
You can have as many function calls inside the class as you want, and
any spare functions can go in the functions.php file, the same as a
theme.

## How a method works

    /* ... */
    function article_html($str) {
        return 'hello world ' . $str;
    }
    /* ... */
    
In this example, we are modifying the `article_html` hook, and taking
`$str` as a parameter. Parameters (if any) are given along with the hook
on their page, but the first parameter is usually the pre-processed
content.

The returned value is what will get passed on to future plugins and
theme files. It does not need to contain the original `$str`, but it’s
probably a good idea to do so, as other things may rely on it.
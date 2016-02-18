<?php

namespace CoreBundle\Twig\Extension;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Bundle\TwigBundle\Loader\FilesystemLoader;
use Twitter_Autolink;

class CoreExtension extends \Twig_Extension
{

    public function getName()
    {
        return 'replace';
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('replace', array($this, 'strReplaceFilter')),
            new \Twig_SimpleFilter('parse', array($this, 'parseFilter'), [
                'is_safe' => ['html']
            ]),
        );
    }

    public function strReplaceFilter($string)
    {
        return str_replace('_normal.', '.', $string);
    }
    public function parseFilter($text)
    {
        $autolink = Twitter_Autolink::create();
        return $autolink->autoLink($text);
        //return $text;
    }

}

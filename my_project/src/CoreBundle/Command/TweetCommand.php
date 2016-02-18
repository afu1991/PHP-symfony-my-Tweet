<?php

namespace CoreBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class TweetCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('core:refresh:tweet')
            ->setDescription('Greet someone');

    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        //$name = $input->getArgument('name');

        $this->getContainer()->get('core.service.twitter_service')->getAllWallTweet();
        $output->writeln("Votre application à bien été refresh !
                ******************* ^.^ *******************");
    }
}

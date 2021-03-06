<?php
declare(strict_types = 1);

namespace Externals\Application\Controller;

use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;

/**
 * @author Matthieu Napoli <matthieu@mnapoli.fr>
 */
class NotFoundController
{
    /**
     * @var \Twig_Environment
     */
    private $twig;

    public function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    public function __invoke(ServerRequestInterface $request)
    {
        $response = new HtmlResponse($this->twig->render('/app/views/404.html.twig', [
            'user' => $request->getAttribute('user'),
        ]));
        return $response->withStatus(404);
    }
}

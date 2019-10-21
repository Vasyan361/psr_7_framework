<?php

namespace Framework\Http;

class Request
{
    private $queryParams = [];

    private $parsedBody = null;

    public function getQueryParams(): array
    {
        return $this->queryParams;
    }

    public function withQueryParams(array $query): self
    {
        $new = clone $this;
        $new->queryParams = $query;

        return $new;
    }

    public function getParsedBody(): ?array
    {
        return $this->parsedBody ?: null;
    }

    public function withParsedBody(?array $data): self
    {
        $new = clone $this;
        $new->parsedBody = $data;

        return $new;
    }
}

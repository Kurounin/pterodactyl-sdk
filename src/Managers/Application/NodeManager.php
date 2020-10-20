<?php

namespace HCGCloud\Pterodactyl\Managers\Application;

use HCGCloud\Pterodactyl\Managers\Manager;

use HCGCloud\Pterodactyl\Resources\Collection;

use HCGCloud\Pterodactyl\Resources\Application\Node;
use HCGCloud\Pterodactyl\Resources\Application\Allocation;

class NodeManager extends Manager
{
    /**
     * Get a paginated collection of nodes.
     *
     * @param int $page
     * @param array $query
     *
     * @return Collection
     */
    public function paginate(int $page = 1, array $query = [])
    {
        return $this->http->get('nodes', array_merge([
            'page' => $page
        ], $query));
    }

    /**
     * Get a node instance by id.
     *
     * @param int   $nodeId
     * @param array $query
     *
     * @return Node
     */
    public function get(int $nodeId, array $query = [])
    {
        return $this->http->get("nodes/$nodeId", $query);
    }

    /**
     * Get node configuration by id.
     *
     * @param int   $nodeId
     * @param array $query
     *
     * @return array
     */
    public function getConfiguration(int $nodeId)
    {
        return $this->http->get("nodes/$nodeId/configuration");
    }

    /**
     * Create a new node.
     *
     * @param array $data
     *
     * @return Node
     */
    public function create(array $data)
    {
        return $this->http->post('nodes', [], $data);
    }

    /**
     * Update a specified node.
     *
     * @param int   $nodeId
     * @param array $data
     *
     * @return Node
     */
    public function update(int $nodeId, array $data)
    {
        return $this->http->patch("nodes/$nodeId", [], $data);
    }

    /**
     * Delete the given node.
     *
     * @param int $nodeId
     *
     * @return void
     */
    public function delete(int $nodeId)
    {
        return $this->http->delete("nodes/$nodeId");
    }

    /**
     * Get a paginated collection of node allocations.
     *
     * @param int $nodeId
     * @param int $page
     * @param array $query
     *
     * @return Collection
     */
    public function allocations(int $nodeId, int $page = 1, array $query = [])
    {
        return $this->http->get("nodes/$nodeId/allocations", array_merge([
            'page' => $page
        ], $query));
    }

    /**
     * Create a new allocation for a node.
     *
     * @param int $nodeId
     * @param array $data
     *
     * @return User
     */
    public function createAllocation(int $nodeId, array $data)
    {
        return $this->http->post("nodes/$nodeId/allocations", [], $data);
    }

    /**
     * Delete the given allocation of a node.
     *
     * @param int $nodeId
     * @param int $allocationId
     *
     * @return void
     */
    public function deleteAllocation(int $nodeId, int $allocationId)
    {
        return $this->http->delete("nodes/$nodeId/allocations/$allocationId");
    }
}
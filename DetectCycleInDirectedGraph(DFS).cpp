#include <bits/stdc++.h>
using namespace std;

class Solution
{
public:
    bool checkCycle(int node, vector<int> adj[], vector<int> &vis, vector<int> &dfs_vis)
    {
        vis[node] = 1;
        dfs_vis[node] = 1;

        for (auto it : adj[node])
        {
            if (!vis[it])
            {
                if (checkCycle(it, adj, vis, dfs_vis))
                    return true;
            }
            else if (dfs_vis[it])
                return true;
        }
        dfs_vis[node] = 0;
        return false;
    }
    bool isCyclic(int v, vector<int> adj[])
    {
        vector<int> vis(v, 0);
        vector<int> dfs_vis(v, 0);

        for (int i = 0; i < v; i++)
        {
            if (!vis[i])
            {
                if (checkCycle(i, adj, vis, dfs_vis))
                    return true;
            }
        }
        return false;
    }
};

int main()
{
    int t;
    cin >> t;
    while (t--)
    {
        int V, E;
        cin >> V >> E;

        vector<int> adj[V];

        for (int i = 0; i < E; i++)
        {
            int u, v;
            cin >> u >> v;
            adj[u].push_back(v);
        }

        Solution obj;
        cout << obj.isCyclic(V, adj) << "\n";
    }

    return 0;
}

#include <bits/stdc++.h>
using namespace std;

class Solution
{
public:
    bool checkbipartite(vector<int> adj[], vector<int> &color, int i)
    {
        queue<int> q;
        q.push(i);
        color[i] = 1;

        while (!q.empty())
        {
            int node = q.front();
            q.pop();

            for (auto it : adj[node])
            {
                if (color[it] == -1)
                {
                    color[it] = 1 - color[node];
                    q.push(it);
                }
                else if (color[it] == color[node])
                    return false;
            }
        }
        return true;
    }
    bool isBipartite(int v, vector<int> adj[])
    {
        vector<int> color(v, -1);

        for (int i = 0; i < v; i++)
        {
            if (color[i] == -1)
            {
                if (!checkbipartite(adj, color, i))
                    return false;
            }
        }
        return true;
    }
};

int main()
{
    int tc;
    cin >> tc;
    while (tc--)
    {
        int V, E;
        cin >> V >> E;
        vector<int> adj[V];
        for (int i = 0; i < E; i++)
        {
            int u, v;
            cin >> u >> v;
            adj[u].push_back(v);
            adj[v].push_back(u);
        }
        Solution obj;
        bool ans = obj.isBipartite(V, adj);
        if (ans)
            cout << "1\n";
        else
            cout << "0\n";
    }
    return 0;
}
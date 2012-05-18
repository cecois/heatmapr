# Heatmapr

A simple API for generating point density heat maps from (somewhat) arbitrary point data.

## Basically…
We took Seth Golub's heatmap.py and messed with it. The result is a RESTish service to which you can pass a few options plus an url-escaped pointer to some GeoJSON stream and get back a point density heatmap. </p><p>We built it for a specific project, so the passable parameters are limited until we have more use cases. As is the output - kml only right now.

You can point to it like you would any valid kml, as shown below (noticing please that the surl value has to be properly escaped).

Oh, the other thing is that this is brand new and *not* thoroughly tested (what, we have day jobs). If something fails there's virtually no way you can possibly figure out why. So if anything behaves strangely you should Tweet us at @pugolian.
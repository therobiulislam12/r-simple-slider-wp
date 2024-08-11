# Simple Slider Plugin with Setting Options

## Facing Problem
    1. Seeding data when activation
    2. Save data in options

## Solve problem
    1. I learned more about how to seed data without creating a table. 
    2. Learned localize data for display in our JavaScript file.
    3. first time learned wp_localize_script hook

I learned more things while doing this project. I didn't know how to pass data to a JavaScript file for setting up a slider. Also, I wasn't sure which was the best option for saving settings data. I experimented with two methods: one was creating a table and storing data, and the other was using the **update_option()** method. For this project, the update option method worked best for me, so I used it.

The second problem I faced was trying to pass data to my JavaScript file, but I couldn't do it initially. Then I learned more about the **wp_localize_script()** method, which turned out to be very useful for me.

Now my project is done, but I learned even more things along the way.

## Next Plan
    1. Improve feature
    2. Make it with full OOP
    3. More readable
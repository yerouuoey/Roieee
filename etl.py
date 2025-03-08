import pandas as pd
import sqlite3

# Read CSV files
customers_df = pd.read_csv('customer.csv')
orders_df = pd.read_csv('orders.csv')

# Merge the two dataframes
merged_df = pd.merge(orders_df, customers_df, on='CustomerID', how='inner')

# Calculate total sales
merged_df['TotalAmount'] = merged_df['Quantity'] * merged_df['Price']

# Add a status column
merged_df['Status'] = merged_df['OrderDate'].apply(lambda d: 'New' if pd.to_datetime(d) > pd.to_datetime('2024-10-01') else 'Old')

# Filter orders with total sales more than $4500
high_value_orders = merged_df[merged_df['TotalAmount'] > 4500]

# Connect to the database
conn = sqlite3.connect('ecommerce.db')

# Create a table
create_table_query = '''
CREATE TABLE IF NOT EXISTS HighValueOrders (
    OrderID INTEGER,
    CustomerID INTEGER,
    Name TEXT,
    Email TEXT,
    Product TEXT,
    Quantity INTEGER,
    Price REAL,
    OrderDate TEXT,
    TotalAmount REAL,
    Status TEXT
)
'''
conn.execute(create_table_query)

# Insert data into the table
high_value_orders.to_sql('HighValueOrders', conn, if_exists='replace', index=False)

# Query the table
result = conn.execute('SELECT * FROM HighValueOrders')
for row in result.fetchall():
    print(row)

# Close the connection
conn.close()

print("ETL process completed successfully!")